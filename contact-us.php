<?php
$formMessage = '';
$formSuccess = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = isset($_POST['name']) ? trim($_POST['name']) : '';
	$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
	$email = isset($_POST['email']) ? trim($_POST['email']) : '';
	$subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
	$message = isset($_POST['message']) ? trim($_POST['message']) : '';

	if (!empty($name) && !empty($phone)) {
		$to = "tacitenterprise@hotmail.com, info@tacitenterprise.com";
		$email_subject = "New Website Enquiry: " . ($subject ? $subject : "General");
		$email_body = "You have received a new enquiry from Tacit Enterprise Website:\n\n".
			"Name: $name\n".
			"Phone: $phone\n".
			"Email: $email\n".
			"Subject: $subject\n".
			"Message:\n$message\n";
		$headers = "From: webmaster@tacitenterprise.com\r\n" .
			"Reply-To: " . ($email ? $email : "noreply@tacitenterprise.com") . "\r\n" .
			"X-Mailer: PHP/" . phpversion();

		$mailSent = mail($to, $email_subject, $email_body, $headers);

		if ($mailSent) {
			$formSuccess = true;
			$enquiryId = 'TE-' . strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 6));
			$formMessage = "Thank you! Your enquiry has been received (Ref: $enquiryId). Our team will contact you shortly.";
		} else {
			$formSuccess = false;
			$formMessage = "Your enquiry could not be sent from the server. Please try again or contact us directly by email.";
		}

		$isAjax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ||
		          (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false);

		if ($isAjax) {
			header('Content-Type: application/json');
			echo json_encode([
				'success' => $formSuccess,
				'message' => $formMessage,
				'enquiryId' => isset($enquiryId) ? $enquiryId : null
			]);
			exit;
		}
	} else {
		$formMessage = "Please fill in all required fields (Name and Phone Number).";
		$isAjax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ||
		          (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false);

		if ($isAjax) {
			header('Content-Type: application/json');
			echo json_encode([
				'success' => false,
				'message' => $formMessage
			]);
			exit;
		}
	}
}
?>
<?php include('partials/header.php'); ?>

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
								<a href="https://maps.app.goo.gl/f2YKqggacwhsatk16" target="_blank">
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
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.480356167801!2d73.1797113!3d22.335484200000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fc93d9d4d9119%3A0xc42f5e8c10d92019!2sTacit%20Enterprise!5e0!3m2!1sen!2sin!4v1771482871640!5m2!1sen!2sin" width="100%" height="320" style="border:0; border-radius: 8px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
			
			<div class="col-12 mt-4">
				<div class="sec-title-four text-center mb-4"><h2 class="sec-title">Enquire Now</h2></div>
				
				<div id="formAlert" class="my-3">
					<?php if (isset($formMessage) && !empty($formMessage)): ?>
						<div class="alert <?php echo (isset($formSuccess) && $formSuccess) ? 'alert-success' : 'alert-danger'; ?> alert-dismissible fade show d-flex align-items-center" role="alert">
							<i class="fa <?php echo (isset($formSuccess) && $formSuccess) ? 'fa-check-circle' : 'fa-exclamation-triangle'; ?> fa-2x mr-3"></i>
							<div>
								<strong><?php echo (isset($formSuccess) && $formSuccess) ? 'Enquiry Submitted!' : 'Error'; ?></strong>
								<p class="mb-0"><?php echo htmlspecialchars($formMessage); ?></p>
							</div>
							<button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif; ?>
				</div>

				<form id="enquiryForm" action="contact-us.php" method="post" class="enquire-section-form">
					<div class="form-group">
						<input type="text" name="name" id="enqName" placeholder="Name" required class="form-control">
					</div>
					<div class="form-group">
						<input type="email" name="email" id="enqEmail" placeholder="Email Address" class="form-control">
					</div>
					<div class="form-group">
						<input type="tel" name="phone" id="enqPhone" placeholder="Phone Number" required class="form-control">
					</div>
					<div class="form-group">
						<textarea name="message" id="enqMessage" class="form-control" placeholder="Message" rows="4"></textarea>
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
document.addEventListener("DOMContentLoaded", function () {
	// Auto select subject from URL query param if present
	const urlParams = new URLSearchParams(window.location.search);
	const subjectParam = urlParams.get('subject') || urlParams.get('product');
	if (subjectParam) {
		const subjectSelect = document.getElementById('enqSubject');
		if (subjectSelect) {
			for (let i = 0; i < subjectSelect.options.length; i++) {
				if (subjectSelect.options[i].value.toLowerCase().includes(subjectParam.toLowerCase())) {
					subjectSelect.selectedIndex = i;
					break;
				}
			}
		}
	}

	const form = document.getElementById('enquiryForm');
	const alertContainer = document.getElementById('formAlert');
	const submitBtn = document.getElementById('enqSubmitBtn');

	if (form) {
		form.addEventListener('submit', function (e) {
			e.preventDefault();

			const name = document.getElementById('enqName').value.trim();
			const phone = document.getElementById('enqPhone').value.trim();
			const email = document.getElementById('enqEmail') ? document.getElementById('enqEmail').value.trim() : '';
			const subjectElem = document.getElementById('enqSubject');
			const subject = subjectElem ? subjectElem.value : "General Enquiry";
			const message = document.getElementById('enqMessage') ? document.getElementById('enqMessage').value.trim() : '';

			if (!name || !phone) {
				showAlert(false, "Please fill in your name and phone number.");
				return;
			}

			// Set Loading State
			submitBtn.disabled = true;
			submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin mr-2"></i> Sending...';

			// Send standard form data so PHP can read it from $_POST.
			const formData = new FormData(form);
			if (!formData.get('subject')) {
				formData.set('subject', subject);
			}

			fetch('contact-us.php', {
				method: 'POST',
				headers: {
					'Accept': 'application/json',
					'X-Requested-With': 'XMLHttpRequest'
				},
				body: formData
			})
			.then(response => {
				if (!response.ok) {
					throw new Error("HTTP error " + response.status);
				}
				return response.json();
			})
			.then(data => {
				if (data.success) {
					showAlert(true, data.message, data.enquiryId);
					form.reset();
				} else {
					showAlert(false, data.message || "Failed to submit enquiry. Please try again.");
				}
			})
			.catch(err => {
				console.error("Enquiry submission error:", err);
				showAlert(false, "Unable to submit the enquiry right now. Please try again.");
			})
			.finally(() => {
				submitBtn.disabled = false;
				submitBtn.innerHTML = 'Send Message';
			});
		});
	}

	function showAlert(isSuccess, msg, enquiryId) {
		if (!alertContainer) return;
		const alertType = isSuccess ? 'alert-success' : 'alert-danger';
		const iconClass = isSuccess ? 'fa-check-circle' : 'fa-exclamation-triangle';
		const heading = isSuccess ? 'Enquiry Submitted Successfully!' : 'Submission Error';
		const refText = enquiryId ? `<div class="mt-1"><span class="badge badge-light border text-dark font-weight-bold">Reference ID: ${enquiryId}</span></div>` : '';

		alertContainer.innerHTML = `
			<div class="alert ${alertType} alert-dismissible fade show d-flex align-items-center shadow-sm" role="alert">
				<i class="fa ${iconClass} fa-2x mr-3"></i>
				<div>
					<h5 class="alert-heading mb-1 font-weight-bold">${heading}</h5>
					<p class="mb-0">${msg}</p>
					${refText}
				</div>
				<button type="button" class="close ml-auto align-self-start" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		`;

		alertContainer.scrollIntoView({ behavior: 'smooth', block: 'center' });
	}
});
</script>

<?php include('partials/footer.php'); ?>
