import express from 'express';
import path from 'path';
import fs from 'fs';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const app = express();
const PORT = 3000;
const HOST = '0.0.0.0';

// Register custom view engine for .php files in the Node preview.
app.engine('php', (filePath, options, callback) => {
  fs.readFile(filePath, 'utf8', (err, content) => {
    if (err) return callback(err);

    let rendered = content;

    const resolveIncludes = (code) => {
      return code.replace(/<\?php\s*include\(?['"]([^'"]+)['"]\)?;?\s*\?>/gi, (match, includePath) => {
        let targetPath = path.join(__dirname, includePath);
        if (!fs.existsSync(targetPath)) {
          targetPath = path.join(__dirname, 'views', includePath);
        }
        if (fs.existsSync(targetPath)) {
          let childContent = fs.readFileSync(targetPath, 'utf8');
          return resolveIncludes(childContent);
        }
        return '';
      }).replace(/include\(?['"]([^'"]+)['"]\)?;?/gi, (match, includePath) => {
        let targetPath = path.join(__dirname, includePath);
        if (!fs.existsSync(targetPath)) {
          targetPath = path.join(__dirname, 'views', includePath);
        }
        if (fs.existsSync(targetPath)) {
          let childContent = fs.readFileSync(targetPath, 'utf8');
          return resolveIncludes(childContent);
        }
        return '';
      });
    };

    rendered = resolveIncludes(rendered);

    const pageTitle = options.title || 'Tacit Enterprise';
    rendered = rendered.replace(
      /<\?php\s+echo\s+isset\(\$title\)[\s\S]*?\?>/gi,
      `${pageTitle} - Tacit Enterprise`
    );

    rendered = rendered.replace(/<\?php\s+echo\s+date\("Y"\);\s*\?>/gi, new Date().getFullYear().toString());

    if (options.formMessage) {
      const alertHtml = `
        <div class="alert ${options.formSuccess ? 'alert-success' : 'alert-danger'} alert-dismissible fade show d-flex align-items-center" role="alert">
          <i class="fa ${options.formSuccess ? 'fa-check-circle' : 'fa-exclamation-triangle'} fa-2x mr-3"></i>
          <div>
            <strong>${options.formSuccess ? 'Enquiry Submitted!' : 'Error'}</strong>
            <p class="mb-0">${options.formMessage}</p>
          </div>
          <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      `;
      rendered = rendered.replace(/<\?php if \(isset\(\$formMessage\)[\s\S]*?<\?php endif; \?>/gi, alertHtml);
    } else {
      rendered = rendered.replace(/<\?php if \(isset\(\$formMessage\)[\s\S]*?<\?php endif; \?>/gi, '');
    }

    // Remove PHP tags that cannot be executed by the Node preview renderer.
    rendered = rendered.replace(/<\?php[\s\S]*?\?>/gi, '');

    return callback(null, rendered);
  });
});

app.set('views', [__dirname, path.join(__dirname, 'views')]);
app.set('view engine', 'php');

app.use(express.urlencoded({ extended: true }));
app.use(express.json());

// Serve static assets. Enquiry data is deliberately NOT served publicly.
app.use('/css', express.static(path.join(__dirname, 'css')));
app.use('/js', express.static(path.join(__dirname, 'js')));
app.use('/images', express.static(path.join(__dirname, 'images')));
app.use('/downloads', express.static(path.join(__dirname, 'downloads')));
app.use('/data', (req, res) => res.status(404).send('Not Found'));

// Skip static file serving for .php requests so Express routes can render them.
app.use((req, res, next) => {
  if (req.path.endsWith('.php')) {
    return next();
  }
  express.static(__dirname, { index: false })(req, res, next);
});

const pageTitles = {
  'index': 'Industrial Cleaning Solutions',
  'company-overview': 'Company Overview',
  'our-history': 'Our History',
  'vision-and-mission': 'Vision & Mission',
  'sustainability': 'Sustainability',
  'why-us': 'Why Choose Us',
  'facility': 'Facility',
  'quality-assurance': 'Quality Assurance',
  'hemtop-degreasing-solution': 'Hemtop Industrial Cleaner',
  'hemtop-plus': 'Hemtop Plus',
  'hemec-4': 'Hemec-4',
  'industrial-cleaning-chemicals': 'Industrial Cleaning Chemicals',
  'surface-treatment-chemicals': 'Surface Treatment Chemicals',
  'food-industry-chemicals': 'Food Industry Chemicals',
  'automobile-industry-chemicals': 'Automobile Industry Chemicals',
  'pharmaceutical-industry-chemicals': 'Pharmaceutical Industry Chemicals',
  'customized-chemical-formulation': 'Customized Chemical Formulations',
  'eco-friendly-chemical-solutions': 'Eco-Friendly Chemical Solutions',
  'automotive-industry': 'Automotive Industry',
  'food-processing-industry': 'Food Processing Industry',
  'pharmaceutical-industry': 'Pharmaceutical Industry',
  'metal-industry': 'Metal Industry',
  'textile-industry': 'Textile Industry',
  'dairy-industry': 'Dairy Industry',
  'manufacturing-units': 'Manufacturing Units',
  'clients': 'Our Clients',
  'blog': 'Blog',
  'blog-details': 'Blog Details',
  'contact-us': 'Contact Us'
};

const dataDir = path.join(__dirname, 'data');
const enquiriesFile = path.join(dataDir, 'enquiries.json');

function saveEnquiry(enquiryData) {
  try {
    if (!fs.existsSync(dataDir)) {
      fs.mkdirSync(dataDir, { recursive: true });
    }

    let enquiries = [];
    if (fs.existsSync(enquiriesFile)) {
      const content = fs.readFileSync(enquiriesFile, 'utf8');
      enquiries = JSON.parse(content || '[]');
    }

    const newEnquiry = {
      id: `ENQ-${Date.now().toString(36).toUpperCase()}`,
      ...enquiryData,
      createdAt: new Date().toISOString()
    };

    enquiries.unshift(newEnquiry);
    fs.writeFileSync(enquiriesFile, JSON.stringify(enquiries, null, 2), 'utf8');
    return newEnquiry;
  } catch (err) {
    console.error('Error saving enquiry:', err);
    return null;
  }
}

app.get(['/contact-us', '/contact-us.php'], (req, res) => {
  res.render('contact-us.php', {
    title: pageTitles['contact-us'],
    query: req.query || {}
  });
});

// Enquiry records are private. Do not expose them through a public API.
app.all('/api/enquiries', (req, res) => {
  res.status(404).json({ success: false, message: 'Not Found' });
});

app.post(['/contact-us', '/contact-us.php', '/api/enquiry'], (req, res) => {
  const {
    name = '',
    email = '',
    phone = '',
    subject = 'General Enquiry',
    message = ''
  } = req.body || {};

  let formMessage = '';
  let formSuccess = false;
  let savedRecord = null;

  const cleanName = String(name).trim();
  const cleanEmail = String(email).trim();
  const cleanPhone = String(phone).trim();
  const cleanSubject = String(subject).trim() || 'General Enquiry';
  const cleanMessage = String(message).trim();

  if (!cleanName) {
    formMessage = 'Please enter your full name.';
  } else if (!cleanPhone) {
    formMessage = 'Please enter your contact phone number.';
  } else if (cleanEmail && !/^\S+@\S+\.\S+$/.test(cleanEmail)) {
    formMessage = 'Please enter a valid email address.';
  } else {
    savedRecord = saveEnquiry({
      name: cleanName.slice(0, 150),
      email: cleanEmail.slice(0, 190),
      phone: cleanPhone.slice(0, 50),
      subject: cleanSubject.slice(0, 200),
      message: cleanMessage.slice(0, 5000),
      ip: req.ip || req.headers['x-forwarded-for'] || ''
    });

    if (savedRecord) {
      formSuccess = true;
      formMessage = 'Thank you! Your enquiry has been received successfully. Our team will contact you shortly.';
    } else {
      formMessage = 'We could not save your enquiry on the server. Please try again or contact us directly by email.';
    }
  }

  const isJsonRequest = req.path === '/api/enquiry' ||
                        req.xhr ||
                        (req.headers.accept && req.headers.accept.includes('application/json')) ||
                        (req.headers['content-type'] && req.headers['content-type'].includes('application/json'));

  if (isJsonRequest) {
    return res.status(formSuccess ? 200 : 400).json({
      success: formSuccess,
      message: formMessage,
      enquiryId: savedRecord ? savedRecord.id : null
    });
  }

  res.render('contact-us.php', {
    title: 'Contact Us',
    formMessage,
    formSuccess,
    enquiryId: savedRecord ? savedRecord.id : null,
    query: req.query || {}
  });
});

app.get(['/', '/index', '/index.php'], (req, res) => {
  res.render('index.php', { title: pageTitles['index'] });
});

app.get('*', (req, res, next) => {
  let urlPath = req.path.replace(/^\//, '').replace(/\.php$/, '');
  if (!urlPath) urlPath = 'index';

  const viewFileName = `${urlPath}.php`;
  const rootPath = path.join(__dirname, viewFileName);
  const viewsPath = path.join(__dirname, 'views', viewFileName);

  if (fs.existsSync(rootPath) || fs.existsSync(viewsPath)) {
    const title = pageTitles[urlPath] || urlPath.split('-').map(w => w.charAt(0).toUpperCase() + w.slice(1)).join(' ');
    return res.render(viewFileName, { title });
  }

  next();
});

app.use((req, res) => {
  res.status(404).send('<h1>404 - Page Not Found</h1><p><a href="/index.php">Return to Home</a></p>');
});

app.listen(PORT, HOST, () => {
  console.log(`Server is running on http://${HOST}:${PORT}`);
});
