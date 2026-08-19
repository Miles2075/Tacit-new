import express from 'express';
import path from 'path';
import fs from 'fs';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const app = express();
const PORT = 3000;
const HOST = '0.0.0.0';

// Register custom view engine for .php files in Node
app.engine('php', (filePath, options, callback) => {
  fs.readFile(filePath, 'utf8', (err, content) => {
    if (err) return callback(err);

    let rendered = content;

    // 1. Resolve includes: <?php include('partials/header.php'); ?> or include 'partials/footer.php';
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

    // 2. Replace PHP page title variables if present
    const pageTitle = options.title || 'Tacit Enterprise';
    rendered = rendered.replace(
      /<\?php\s+echo\s+isset\(\$title\)[\s\S]*?\?>/gi,
      `${pageTitle} - Tacit Enterprise`
    );

    // 3. Replace PHP date
    rendered = rendered.replace(/<\?php\s+echo\s+date\("Y"\);\s*\?>/gi, new Date().getFullYear().toString());

    // 4. Replace PHP alert blocks for preview if form variables passed
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

    // 5. Clean up any remaining unrendered <?php ... ?> tags in Node preview environment
    rendered = rendered.replace(/<\?php[\s\S]*?\?>/gi, '');

    return callback(null, rendered);
  });
});

app.set('views', [__dirname, path.join(__dirname, 'views')]);
app.set('view engine', 'php');

app.use(express.urlencoded({ extended: true }));
app.use(express.json());

// Serve static assets (CSS, JS, images, downloads, etc.)
app.use('/css', express.static(path.join(__dirname, 'css')));
app.use('/js', express.static(path.join(__dirname, 'js')));
app.use('/images', express.static(path.join(__dirname, 'images')));
app.use('/downloads', express.static(path.join(__dirname, 'downloads')));

// Skip static file serving for .php requests so Express routes can render them
app.use((req, res, next) => {
  if (req.path.endsWith('.php')) {
    return next();
  }
  express.static(__dirname, { index: false })(req, res, next);
});

// Route mapping helper
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
  // 'cip-alkaline-detergent': 'CIP Alkaline Detergent',
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

// Handle Contact Us & Enquiry POST & GET
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

app.get('/api/enquiries', (req, res) => {
  try {
    if (fs.existsSync(enquiriesFile)) {
      const content = fs.readFileSync(enquiriesFile, 'utf8');
      const enquiries = JSON.parse(content || '[]');
      return res.json({ success: true, count: enquiries.length, enquiries });
    }
    return res.json({ success: true, count: 0, enquiries: [] });
  } catch (err) {
    return res.status(500).json({ success: false, error: err.message });
  }
});

app.post(['/contact-us', '/contact-us.php', '/api/enquiry'], (req, res) => {
  const { name = '', email = '', phone = '', subject = '', message = '' } = req.body;
  let formMessage = '';
  let formSuccess = false;
  let savedRecord = null;

  if (!name.trim()) {
    formMessage = 'Please enter your full name.';
  } else if (!phone.trim()) {
    formMessage = 'Please enter your contact phone number.';
  } else if (email.trim() && !/\S+@\S+\.\S+/.test(email.trim())) {
    formMessage = 'Please enter a valid email address.';
  } else {
    savedRecord = saveEnquiry({
      name: name.trim(),
      email: email.trim(),
      phone: phone.trim(),
      subject: subject.trim(),
      message: message.trim(),
      ip: req.ip || req.headers['x-forwarded-for'] || ''
    });

    formSuccess = true;
    formMessage = 'Thank you! Your enquiry has been received successfully. Our team will contact you shortly.';
  }

  const isJsonRequest = req.path === '/api/enquiry' ||
                        req.xhr ||
                        (req.headers['accept'] && req.headers['accept'].includes('application/json')) ||
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
    query: req.query || {}
  });
});

// Home page routes
app.get(['/', '/index', '/index.php'], (req, res) => {
  res.render('index.php', { title: pageTitles['index'] });
});

// Generic route handler for all pages (.php and clean URLs)
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

// 404 Handler
app.use((req, res) => {
  res.status(404).send('<h1>404 - Page Not Found</h1><p><a href="/index.php">Return to Home</a></p>');
});

app.listen(PORT, HOST, () => {
  console.log(`Server is running on http://${HOST}:${PORT}`);
});
