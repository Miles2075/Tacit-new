<?php
$formMessage = '';
$formSuccess = false;
$enquiryId = null;

/**
 * Return a JSON response for AJAX submissions.
 */
function enquiry_json_response($success, $message, $enquiryId = null, $statusCode = 200) {
    http_response_code($statusCode);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
        'success' => (bool) $success,
        'message' => $message,
        'enquiryId' => $enquiryId
    ]);
    exit;
}

/**
 * Save an enquiry locally so submissions are not lost when the hosting
 * provider disables PHP mail(). The file is also used by the Node preview.
 */
function save_enquiry($data) {
    $dataDir = __DIR__ . DIRECTORY_SEPARATOR . 'data';
    $dataFile = $dataDir . DIRECTORY_SEPARATOR . 'enquiries.json';

    try {
        if (!is_dir($dataDir) && !@mkdir($dataDir, 0755, true)) {
            return false;
        }

        $enquiries = [];
        if (is_file($dataFile)) {
            $raw = @file_get_contents($dataFile);
            if ($raw !== false && trim($raw) !== '') {
                $decoded = json_decode($raw, true);
                if (is_array($decoded)) {
                    $enquiries = $decoded;
                }
            }
        }

        $record = [
            'id' => 'ENQ-' . strtoupper(substr(bin2hex(random_bytes(6)), 0, 10)),
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'subject' => $data['subject'],
            'message' => $data['message'],
            'ip' => isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '',
            'createdAt' => gmdate('c')
        ];

        array_unshift($enquiries, $record);
        $json = json_encode($enquiries, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        if ($json === false) {
            return false;
        }

        return @file_put_contents($dataFile, $json, LOCK_EX) !== false ? $record : false;
    } catch (Throwable $e) {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Read POST values safely. These names exactly match the form fields below.
    $name = isset($_POST['name']) && is_string($_POST['name']) ? trim($_POST['name']) : '';
    $phone = isset($_POST['phone']) && is_string($_POST['phone']) ? trim($_POST['phone']) : '';
    $email = isset($_POST['email']) && is_string($_POST['email']) ? trim($_POST['email']) : '';
    $subject = isset($_POST['subject']) && is_string($_POST['subject']) ? trim($_POST['subject']) : 'General Enquiry';
    $message = isset($_POST['message']) && is_string($_POST['message']) ? trim($_POST['message']) : '';

    $isAjax = (
        !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'
    ) || (
        isset($_SERVER['HTTP_ACCEPT']) &&
        stripos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false
    );

    // Server-side validation. Do not rely only on HTML required attributes.
    if ($name === '' || $phone === '') {
        $formMessage = 'Please fill in your name and phone number.';
        if ($isAjax) {
            enquiry_json_response(false, $formMessage, null, 400);
        }
    } elseif ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $formMessage = 'Please enter a valid email address.';
        if ($isAjax) {
            enquiry_json_response(false, $formMessage, null, 400);
        }
    } else {
        // Limit excessively large input without changing normal form use.
        $name = substr($name, 0, 150);
        $phone = substr($phone, 0, 50);
        $email = substr($email, 0, 190);
        $subject = substr($subject, 0, 200);
        $message = substr($message, 0, 5000);

        $record = save_enquiry([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'subject' => $subject,
            'message' => $message
        ]);

        if ($record !== false) {
            $enquiryId = $record['id'];
        }

        // Attempt email delivery when PHP mail() is available.
        // The enquiry is still considered received when local storage succeeds,
        // so a hosting provider's mail configuration cannot make the form appear broken.
        $mailSent = false;
        $to = 'tacitenterprise@hotmail.com, info@tacitenterprise.com';
        $emailSubject = 'New Website Enquiry: ' . ($subject !== '' ? $subject : 'General Enquiry');
        $emailBody = "You have received a new enquiry from the Tacit Enterprise website.\n\n" .
            "Name: " . $name . "\n" .
            "Phone: " . $phone . "\n" .
            "Email: " . ($email !== '' ? $email : 'Not provided') . "\n" .
            "Subject: " . ($subject !== '' ? $subject : 'General Enquiry') . "\n" .
            "Message:\n" . ($message !== '' ? $message : 'No message provided') . "\n\n" .
            "Reference: " . ($enquiryId ? $enquiryId : 'Not generated') . "\n";

        $headers = [
            'MIME-Version: 1.0',
            'Content-Type: text/plain; charset=UTF-8',
            'From: Tacit Enterprise <info@tacitenterprise.com>',
            'Reply-To: ' . ($email !== '' ? $email : 'info@tacitenterprise.com'),
            'X-Mailer: PHP/' . PHP_VERSION
        ];

        if (function_exists('mail')) {
            $mailSent = @mail($to, $emailSubject, $emailBody, implode("\r\n", $headers));
        }

        if ($record !== false) {
            $formSuccess = true;
            $formMessage = 'Thank you! Your enquiry has been received. Our team will contact you shortly.';
        } else {
            $formSuccess = false;
            $formMessage = 'We could not save your enquiry on the server. Please try again or contact us directly by email.';
        }

        if ($isAjax) {
            enquiry_json_response($formSuccess, $formMessage, $enquiryId, $formSuccess ? 200 : 500);
        }
    }
}
?>
<?php include __DIR__ . '/partials/header.php'; ?>

<!-- Banner Start -->
<section class="internal-page-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="bannertitle">
                    <h1>Contact Us</h1>
                </div>
            </div>
            <div class="col-md-12">
                <div class="breadcrumb">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#!">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contactus py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="getintouch">
                    <div class="sec-title-four text-left mb-4"><h2 class="sec-title">Get in Touch</h2></div>
                    <ul class="list-unstyled contact-details__info">
                        <li>
                            <div class="icon"><span class="fa fa-phone"></span></div>
                            <div class="text">
                                <h6>Call Us</h6>
                                <a href="tel:+919898028467">Mr. Samir V Parikh :- +91 98980 28467</a>
                                <a href="tel:+919409025703">Mr. Devansh Parikh :- +91 94090 25703</a>
                            </div>
                        </li>
                        <li>
                            <div class="icon"><span class="fa fa-envelope"></span></div>
                            <div class="text">
                                <h6>Mail Us</h6>
                                <a href="mailto:tacitenterprise@hotmail.com">tacitenterprise@hotmail.com</a>
                                <a href="mailto:info@tacitenterprise.com">info@tacitenterprise.com</a>
                            </div>
                        </li>
                        <li>
                            <div class="icon"><span class="fa fa-map-marker"></span></div>
                            <div class="text">
                                <h6>Registered Office</h6>
                                <a href="https://maps.app.goo.gl/f2YKqggacwhsatk16" target="_blank" rel="noopener noreferrer">
                                    13, Vasundhara Park Society, Opposite Delux Colony,<br>
                                    Nizampura, Vadodara – 390002, Gujarat, India
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="icon"><span class="fa fa-industry"></span></div>
                            <div class="text">
                                <h6>Godown Address</h6>
                                <a href="https://www.google.com/maps/search/?api=1&query=Survery+No.+503%2F3%2C+Omakarpura%2C+Sokhda+Road%2C+Beside+Amar+Car+Godown%2C+Opposite+GSFC+Company+Gate%2C+Dashrath%2C+Vadodara-+391740%2C+Gujarat%2C+India" target="_blank" rel="noopener noreferrer">
                                    Survery No. 503/3, Omakarpura, Sokhda Road, Beside Amar Car Godown, Opposite GSFC Company Gate, Dashrath, Vadodara- 391740, Gujarat, India
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-6 mb-4 mb-lg-0 d-flex flex-column justify-content-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.480356167801!2d73.1797113!3d22.335484200000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fc93d9d4d9119%3A0xc42f5e8c10d92019!2sTacit%20Enterprise!5e0!3m2!1sen!2sin!4v1771482871640!5m2!1sen!2sin" width="100%" height="320" style="border:0; border-radius:8px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="col-12 mt-4">
                <div class="sec-title-four text-center mb-4"><h2 class="sec-title">Enquire Now</h2></div>

                <div id="formAlert" class="my-3">
                    <?php if (!empty($formMessage)): ?>
                        <div class="alert <?php echo $formSuccess ? 'alert-success' : 'alert-danger'; ?> alert-dismissible fade show d-flex align-items-center" role="alert">
                            <i class="fa <?php echo $formSuccess ? 'fa-check-circle' : 'fa-exclamation-triangle'; ?> fa-2x mr-3"></i>
                            <div>
                                <strong><?php echo $formSuccess ? 'Enquiry Submitted!' : 'Submission Error'; ?></strong>
                                <p class="mb-0"><?php echo htmlspecialchars($formMessage, ENT_QUOTES, 'UTF-8'); ?></p>
                                <?php if ($enquiryId): ?>
                                    <small>Reference ID: <?php echo htmlspecialchars($enquiryId, ENT_QUOTES, 'UTF-8'); ?></small>
                                <?php endif; ?>
                            </div>
                            <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                </div>

                <form id="enquiryForm" action="contact-us.php" method="post" class="enquire-section-form" novalidate>
                    <div class="form-group">
                        <input type="text" name="name" id="enqName" placeholder="Name" required maxlength="150" autocomplete="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="enqEmail" placeholder="Email Address" maxlength="190" autocomplete="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" id="enqPhone" placeholder="Phone Number" required maxlength="50" autocomplete="tel" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" id="enqSubject" placeholder="Subject" maxlength="200" class="form-control" value="General Enquiry">
                    </div>
                    <div class="form-group">
                        <textarea name="message" id="enqMessage" class="form-control" placeholder="Message" rows="4" maxlength="5000"></textarea>
                    </div>

                    <div class="text-left mt-3">
                        <button type="submit" id="enqSubmitBtn" class="btn-enquire-submit">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('enquiryForm');
    const alertContainer = document.getElementById('formAlert');
    const submitBtn = document.getElementById('enqSubmitBtn');

    if (!form) return;

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        const name = document.getElementById('enqName').value.trim();
        const phone = document.getElementById('enqPhone').value.trim();
        const email = document.getElementById('enqEmail').value.trim();

        if (!name || !phone) {
            showAlert(false, 'Please fill in your name and phone number.');
            return;
        }

        if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            showAlert(false, 'Please enter a valid email address.');
            return;
        }

        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin mr-2"></i> Sending...';

        const formData = new FormData(form);

        fetch(form.getAttribute('action') || window.location.pathname, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: formData,
            credentials: 'same-origin'
        })
        .then(function (response) {
            return response.text().then(function (text) {
                let data;
                try {
                    data = JSON.parse(text);
                } catch (parseError) {
                    throw new Error('The server returned an invalid response.');
                }

                if (!response.ok || !data.success) {
                    throw new Error(data.message || 'Unable to submit the enquiry.');
                }
                return data;
            });
        })
        .then(function (data) {
            showAlert(true, data.message || 'Thank you! Your enquiry has been received.', data.enquiryId);
            form.reset();
            document.getElementById('enqSubject').value = 'General Enquiry';
        })
        .catch(function (error) {
            console.error('Enquiry submission error:', error);
            showAlert(false, error.message || 'Unable to submit the enquiry right now. Please try again.');
        })
        .finally(function () {
            submitBtn.disabled = false;
            submitBtn.innerHTML = 'Send Message';
        });
    });

    function showAlert(isSuccess, message, enquiryId) {
        if (!alertContainer) return;

        const alertType = isSuccess ? 'alert-success' : 'alert-danger';
        const iconClass = isSuccess ? 'fa-check-circle' : 'fa-exclamation-triangle';
        const heading = isSuccess ? 'Enquiry Submitted Successfully!' : 'Submission Error';
        const safeMessage = String(message).replace(/[&<>\"]/g, function (character) {
            return {'&':'&amp;', '<':'&lt;', '>':'&gt;', '\"':'&quot;'}[character];
        });
        const safeId = enquiryId ? String(enquiryId).replace(/[^A-Za-z0-9_-]/g, '') : '';

        alertContainer.innerHTML = `
            <div class="alert ${alertType} alert-dismissible fade show d-flex align-items-center shadow-sm" role="alert">
                <i class="fa ${iconClass} fa-2x mr-3"></i>
                <div>
                    <h5 class="alert-heading mb-1">${heading}</h5>
                    <p class="mb-0">${safeMessage}</p>
                    ${safeId ? `<small>Reference ID: ${safeId}</small>` : ''}
                </div>
                <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>`;

        alertContainer.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
});
</script>

<?php include __DIR__ . '/partials/footer.php'; ?>
