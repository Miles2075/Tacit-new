<?php include('partials/header.php'); ?>
<!-- Tacit Vertical Full-Screen Slider Start -->
 <style>
    /* =========================================================
   TACIT SPLIT-SCREEN PRODUCT SLIDER
   Unique class prefix: tacit-splitx-
========================================================= */
.tacit-splitx-slider {
	--tacit-splitx-height: 670px;
	--tacit-splitx-divider: 35%;

	/* Light color theme */
	--tacit-splitx-dark: #f5f7fb;
	--tacit-splitx-black: #ffffff;
	--tacit-splitx-light: #1f2937;
	--tacit-splitx-muted: #4f46e5;
	--tacit-splitx-primary: #2563eb;

	position: relative;
	width: 100%;
	height: var(--tacit-splitx-height);
	min-height: 520px;
	overflow: hidden;
	background: var(--tacit-splitx-dark);
	outline: none;
	isolation: isolate;
}

.tacit-splitx-stage {
	position: absolute;
	inset: 0;
	width: 100%;
	height: 100%;
}

.tacit-splitx-slide {
	position: absolute;
	inset: 0;
	display: grid;
	grid-template-columns:
		var(--tacit-splitx-divider)
		calc(100% - var(--tacit-splitx-divider));
	width: 100%;
	height: 100%;
	opacity: 0;
	visibility: hidden;
	pointer-events: none;
	transform: translateY(30px);
	transition:
		opacity 0.65s ease,
		visibility 0.65s ease,
		transform 0.65s ease;
}

.tacit-splitx-slide.tacit-splitx-active {
	z-index: 2;
	opacity: 1;
	visibility: visible;
	pointer-events: auto;
	transform: translateY(0);
}


/* Left Content Panel */

.tacit-splitx-content-panel {
	position: relative;
	display: flex;
	align-items: center;
	justify-content: center;
	height: 100%;
	padding: 70px 55px;
	overflow: hidden;
	background: #f5f7fb;
}

.tacit-splitx-content-panel::before {
	content: "";
	position: absolute;
	top: -150px;
	left: -150px;
	width: 350px;
	height: 350px;
	border: 1px solid rgba(79, 70, 229, 0.08);
	border-radius: 50%;
}

.tacit-splitx-content-panel::after {
	content: "";
	position: absolute;
	right: -120px;
	bottom: -160px;
	width: 330px;
	height: 330px;
	border: 1px solid rgba(79, 70, 229, 0.08);
	border-radius: 50%;
}

.tacit-splitx-content {
	position: relative;
	z-index: 2;
	width: 100%;
	max-width: 430px;
}

.tacit-splitx-label {
	display: inline-block;
	margin-bottom: 17px;
	color: var(--tacit-splitx-muted);
	font-size: 13px;
	font-weight: 600;
	line-height: 1.5;
	letter-spacing: 2px;
	text-transform: uppercase;
}

.tacit-splitx-content h2 {
	margin: 0 0 8px;
	color: #3949ab;
	font-size: clamp(42px, 4.4vw, 70px);
	font-weight: 700;
	line-height: 1.05;
	letter-spacing: -1.5px;
}

.tacit-splitx-content h3 {
	margin: 0 0 20px;
	color: var(--tacit-splitx-light);
	font-size: 21px;
	font-weight: 500;
	line-height: 1.45;
}

.tacit-splitx-content p {
	margin: 0 0 28px;
	color: #4b5563;
	font-size: 15px;
	line-height: 1.8;
}

.tacit-splitx-btn {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	gap: 12px;
	min-height: 48px;
	padding: 11px 21px;
	border: 1px solid var(--tacit-splitx-primary);
	color: var(--tacit-splitx-primary);
	font-size: 14px;
	font-weight: 600;
	line-height: 1.4;
	text-decoration: none;
	background: transparent;
	transition:
		background-color 0.3s ease,
		border-color 0.3s ease,
		color 0.3s ease,
		transform 0.3s ease;
}

.tacit-splitx-btn span {
	font-size: 20px;
	line-height: 1;
	transition: transform 0.3s ease;
}

.tacit-splitx-btn:hover {
	border-color: var(--tacit-splitx-primary);
	background: var(--tacit-splitx-primary);
	color: #ffffff;
	text-decoration: none;
	transform: translateY(-2px);
}

.tacit-splitx-btn:hover span {
	transform: translateX(4px);
}


/* Right Image Panel */

.tacit-splitx-image-panel {
	position: relative;
	height: 100%;
	overflow: hidden;
	background: #111827;
}

.tacit-splitx-image-panel picture {
	position: absolute;
	inset: 0;
	display: block;
	width: 100%;
	height: 100%;
}

.tacit-splitx-image-panel img {
	display: block;
	width: 100%;
	height: 100%;
	object-fit: cover;
	object-position: center;
	transform: scale(1.06);
	transition: transform 6s ease;
}

.tacit-splitx-active .tacit-splitx-image-panel img {
	transform: scale(1);
}

.tacit-splitx-image-overlay {
	position: absolute;
	inset: 0;
	z-index: 1;
	background:
		linear-gradient(
			90deg,
			rgba(0, 0, 0, 0.18) 0%,
			rgba(0, 0, 0, 0.03) 48%,
			rgba(0, 0, 0, 0.16) 100%
		);
	pointer-events: none;
}

.tacit-splitx-image-caption {
	position: absolute;
	right: 28px;
	bottom: 25px;
	z-index: 3;
	display: flex;
	align-items: center;
	gap: 12px;
	color: #ffffff;
}

.tacit-splitx-image-caption span {
	display: flex;
	align-items: center;
	justify-content: center;
	width: 42px;
	height: 42px;
	border: 1px solid rgba(255, 255, 255, 0.55);
	border-radius: 50%;
	font-size: 12px;
	font-weight: 700;
}

.tacit-splitx-image-caption strong {
	font-size: 13px;
	font-weight: 600;
	letter-spacing: 1px;
	text-transform: uppercase;
}


/* Centre Controls */

.tacit-splitx-controls {
	position: absolute;
	top: 50%;
	left: var(--tacit-splitx-divider);
	z-index: 20;
	width: 82px;
	height: 102px;
	transform: translate(-50%, -50%);
	pointer-events: none;
}

.tacit-splitx-arrow {
	position: absolute;
	display: flex;
	align-items: center;
	justify-content: center;
	width: 42px;
	height: 50px;
	padding: 0;
	border: 0;
	background: #d1d5db;
	cursor: pointer;
	pointer-events: auto;
	transition:
		background-color 0.3s ease,
		transform 0.3s ease;
}

.tacit-splitx-prev {
	top: 0;
	right: 0;
	border-radius: 0 22px 22px 0;
}

.tacit-splitx-next {
	bottom: 0;
	left: 0;
	border-radius: 22px 0 0 22px;
}

.tacit-splitx-arrow span {
	display: block;
	width: 0;
	height: 0;
	border-right: 5px solid transparent;
	border-left: 5px solid transparent;
}

.tacit-splitx-prev span {
	border-bottom: 7px solid #111111;
}

.tacit-splitx-next span {
	border-top: 7px solid #111111;
}

.tacit-splitx-arrow:hover {
	background: var(--tacit-splitx-primary);
	transform: scale(1.07);
}

.tacit-splitx-arrow:hover span {
	filter: brightness(0) invert(1);
}


/* Progress Bar */

.tacit-splitx-progress {
	position: absolute;
	top: 0;
	left: 0;
	z-index: 25;
	width: 100%;
	height: 3px;
	background: rgba(17, 24, 39, 0.08);
}

.tacit-splitx-progress-bar {
	width: 0;
	height: 100%;
	background: var(--tacit-splitx-muted);
}


/* Counter */

.tacit-splitx-counter {
	position: absolute;
	left: 25px;
	bottom: 22px;
	z-index: 20;
	display: flex;
	align-items: center;
	gap: 8px;
	color: #374151;
	font-size: 12px;
	font-weight: 700;
	letter-spacing: 1px;
}

.tacit-splitx-counter-line {
	display: block;
	width: 28px;
	height: 1px;
	background: rgba(17, 24, 39, 0.35);
}


/* Tablet */

@media (max-width: 1199px) {
	.tacit-splitx-slider {
		--tacit-splitx-divider: 42%;
		--tacit-splitx-height: 550px;
	}

	.tacit-splitx-content-panel {
		padding: 60px 42px;
	}

	.tacit-splitx-content h2 {
		font-size: 48px;
	}
}


/* Mobile */

@media (max-width: 767px) {
	.tacit-splitx-slider {
		--tacit-splitx-height: 650px;
		height: var(--tacit-splitx-height);
		min-height: 650px;
	}

	.tacit-splitx-slide {
		grid-template-columns: 1fr;
		grid-template-rows: 47% 53%;
	}

	.tacit-splitx-content-panel {
		grid-row: 1;
		justify-content: flex-start;
		padding: 42px 55px 45px 24px;
	}

	.tacit-splitx-image-panel {
		grid-row: 2;
	}

	.tacit-splitx-content {
		max-width: 100%;
	}

	.tacit-splitx-label {
		margin-bottom: 9px;
		font-size: 11px;
		letter-spacing: 1.5px;
	}

	.tacit-splitx-content h2 {
		margin-bottom: 5px;
		font-size: 38px;
	}

	.tacit-splitx-content h3 {
		margin-bottom: 11px;
		font-size: 17px;
		color: #111827;
	}

	.tacit-splitx-content p {
		display: -webkit-box;
		margin-bottom: 16px;
		overflow: hidden;
		font-size: 13px;
		line-height: 1.6;
		-webkit-box-orient: vertical;
		-webkit-line-clamp: 3;
	}

	.tacit-splitx-btn {
		min-height: 42px;
		padding: 8px 16px;
		font-size: 12px;
	}

	.tacit-splitx-controls {
		top: 47%;
		left: auto;
		right: 14px;
		width: 48px;
		height: 96px;
		transform: translateY(-50%);
	}

	.tacit-splitx-arrow {
		position: absolute;
		left: 0;
		width: 44px;
		height: 44px;
		border-radius: 50%;
	}

	.tacit-splitx-prev {
		top: 0;
		right: auto;
	}

	.tacit-splitx-next {
		top: auto;
		bottom: 0;
	}

	.tacit-splitx-image-caption {
		right: 17px;
		bottom: 17px;
	}

	.tacit-splitx-image-caption strong {
		display: none;
	}

	.tacit-splitx-image-caption span {
		width: 37px;
		height: 37px;
	}

	.tacit-splitx-counter {
		left: 18px;
		bottom: 18px;
	}
}


/* Small Mobile */

@media (max-width: 420px) {
	.tacit-splitx-slider {
		--tacit-splitx-height: 620px;
		min-height: 620px;
	}

	.tacit-splitx-slide {
		grid-template-rows: 50% 50%;
	}

	.tacit-splitx-content-panel {
		padding: 35px 52px 35px 20px;
	}

	.tacit-splitx-controls {
		top: 50%;
	}

	.tacit-splitx-content h2 {
		font-size: 34px;
	}
}


/* Reduced Motion */

@media (prefers-reduced-motion: reduce) {
	.tacit-splitx-slide,
	.tacit-splitx-image-panel img,
	.tacit-splitx-btn,
	.tacit-splitx-arrow {
		transition: none;
	}
}
    </style>
<!-- Tacit Split-Screen Slider Start -->
<section
	id="tacitSplitSlider"
	class="tacit-splitx-slider"
	aria-label="Tacit Enterprise product slider"
	tabindex="0"
>
	<div class="tacit-splitx-stage">
		<!-- Slide 1 -->
		<article class="tacit-splitx-slide tacit-splitx-active">
			<div class="tacit-splitx-content-panel">
				<div class="tacit-splitx-content">
					<span class="tacit-splitx-label">
						Industrial Degreasing
					</span>
					<h2>Hemtop</h2>
					<h3>Powerful Degreasing Solution</h3>
					<p>
						A high-performance industrial cleaner developed to remove
						heavy grease, oil deposits and stubborn contaminants from
						machinery, tools and metal surfaces.
					</p>
					<a
						href="hemtop-degreasing-solution.php"
						class="tacit-splitx-btn"
					>
						Explore Hemtop
						<span aria-hidden="true">→</span>
					</a>
				</div>
			</div>
			<div class="tacit-splitx-image-panel">
				<picture>
					<source
						media="(max-width: 767px)"
						srcset="images/s-1.webp"
					>
					<img
						src="images/slider-hemtop.png"
						alt="Hemtop industrial degreasing solution"
					>
				</picture>
				<div class="tacit-splitx-image-overlay"></div>
				<div class="tacit-splitx-image-caption">
					<span>01</span>
					<strong>Industrial Cleaning</strong>
				</div>
			</div>
		</article>
		<!-- Slide 2 -->
		<article class="tacit-splitx-slide">
			<div class="tacit-splitx-content-panel">
				<div class="tacit-splitx-content">
					<span class="tacit-splitx-label">
						Hygiene &amp; Sanitation
					</span>
					<h2>Hemec-4</h2>
					<h3>Disinfectant &amp; Sanitizing Cleaner</h3>
					<p>
						A dependable cleaning and sanitizing formulation developed
						to support microbial control and maintain hygienic conditions
						in critical industrial and institutional environments.
					</p>
					<a href="hemec-4.php" class="tacit-splitx-btn">
						Explore Hemec-4
						<span aria-hidden="true">→</span>
					</a>
				</div>
			</div>
			<div class="tacit-splitx-image-panel">
				<picture>
					<source
						media="(max-width: 767px)"
						srcset="images/s-2.webp"
					>
					<img
						src="images/slider-hemec.png"
						alt="Hemec-4 disinfectant and sanitizing cleaner"
					>
				</picture>
				<div class="tacit-splitx-image-overlay"></div>
				<div class="tacit-splitx-image-caption">
					<span>02</span>
					<strong>Hygiene Solutions</strong>
				</div>
			</div>
		</article>
		<!-- Slide 3 -->
		<article class="tacit-splitx-slide">
			<div class="tacit-splitx-content-panel">
				<div class="tacit-splitx-content">
					<span class="tacit-splitx-label">
						Customized Formulations
					</span>
					<h2>Specialty Cleaners</h2>
					<h3>Solutions Designed for Your Process</h3>
					<p>
						Customized industrial cleaning formulations developed
						according to customer requirements, process conditions,
						contaminant types and surface characteristics.
					</p>
					<a href="contact-us.php" class="tacit-splitx-btn">
						Discuss Your Requirement
						<span aria-hidden="true">→</span>
					</a>
				</div>
			</div>
			<div class="tacit-splitx-image-panel">
				<picture>
					<source
						media="(max-width: 767px)"
						srcset="images/s-3.webp"
					>
					<img
						src="images/tacit-slider-3.jpg"
						alt="Customized specialty industrial cleaners"
					>
				</picture>
				<div class="tacit-splitx-image-overlay"></div>
				<div class="tacit-splitx-image-caption">
					<span>03</span>
					<strong>Custom Formulations</strong>
				</div>
			</div>
		</article>
	</div>
<!-- Center Arrow Controls -->
	<div class="tacit-splitx-controls">
		<button
			type="button"
			class="tacit-splitx-arrow tacit-splitx-prev"
			aria-label="Previous slide"
		>
			<span></span>
		</button>
		<button
			type="button"
			class="tacit-splitx-arrow tacit-splitx-next"
			aria-label="Next slide"
		>
			<span></span>
		</button>
	</div>
	<!-- Slide Progress -->
	<div class="tacit-splitx-progress">
		<div class="tacit-splitx-progress-bar"></div>
	</div>
	<!-- Slide Counter -->
	<div class="tacit-splitx-counter">
		<span class="tacit-splitx-current">01</span>
		<span class="tacit-splitx-counter-line"></span>
		<span class="tacit-splitx-total">03</span>
	</div>
</section>
<!-- Tacit Split-Screen Slider End -->
<!-- Slider Start -->
<!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/Tacit Slider-1.webp" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/Tacit Slider-1.webp" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/Tacit Slider-1.webp" alt="First slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> -->
<!-- Slider End -->


<!-- Mobile Slider Start -->
<!-- <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/s-1.webp" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/s-2.webp" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/s-3.webp" alt="First slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> -->
<!-- Mobile Slider End -->
<!-- About Us Start -->
<section class="about-sec2 overflow-hidden">
  <div class="container">
   <div class="row align-items-center">
    <div class="col-xl-6 col-sm-8 ms-sm-auto" id="desk">
     <div class="about-media-box position-relative">
      <div class="ab-main-img">
       <img src="images/about-m.webp" class="img-fluid" alt="">
       <div class="experien-stat">
        <p class="text-info m-0"> <span class="purecounter" data-purecounter-end="25" data-purecounter-duration="0">25</span>+ Years
        Experience</p>
      </div>
      <div class="about-sm">
        <img class="img-fluid" src="images/about-m2.webp" alt="">
      </div>
    </div>
  </div>
</div>
<div class="col-xl-6 ps-xl-4">
 <div class="about-content">
  <span class="sub-title2 fadeInUp single" style="transform: translate(0px); opacity: 1;">About </span>
  <h2 class="sec-title">Tacit Enterprise</h2>
  <p>Established in 1998, Tacit Enterprise is a Vadodara-based manufacturer of high-quality industrial chemicals serving pharmaceutical, food, automobile, and general manufacturing industries. Founded by Mr. Samir Parikh, the company was built with a vision to provide reliable, performance-driven chemical solutions tailored to industrial needs.</p>
  <p>With over 25 years of experience, we specialize in customized chemical formulations developed according to specific client requirements. Our expertise allows us to understand diverse industrial processes and deliver solutions that enhance efficiency, safety, and overall operational performance.</p>
  <p>At Tacit Enterprise, quality and consistency are at the core of everything we do. From careful raw material selection to strict batch testing, we ensure every product meets required industry standards while maintaining economical pricing and dependable results.</p>
  <div class="d-sm-flex align-items-center about-cta gap-5">
   <a href="company-overview.php" class="btn btn-primary">Learn More <i class="fa fa-arrow-right"></i><span style="top: 267.45px; left: 119.6px;"></span> </a>
</div>
</div>
</div>
<div class="col-xl-6 col-sm-8 ms-sm-auto" id="mob">
     <div class="about-media-box position-relative">
      <div class="ab-main-img">
       <img src="images/about-m.webp" class="img-fluid" alt="">
       <div class="experien-stat">
        <p class="text-info m-0"> <span class="purecounter" data-purecounter-end="25" data-purecounter-duration="0">25</span>+ Years
        Experience</p>
      </div>
      <div class="about-sm">
        <img class="img-fluid" src="images/about-m2.webp" alt="">
      </div>
    </div>
  </div>
</div>
</div>
</div>
</section>

<!-- About Us End -->
<!-- Why us start -->
<section class="why-choose-us-two">
  <div class="bg bg-image" style="background-image: url('images/why.webp')"></div>
  <div class="bg bg-pattern-5"></div>

  <div class="container">            
    <div class="row g-0">
      <!-- Title Column -->
      <div class="title-column col-12 col-lg-4 col-xl-4">
        <div class="inner-column">
          <div class="sec-title light">
            <span class="sub-title2 single color-white" style="transform: translate(0px); opacity: 1;">Why Choose </span>
            <h2 class="sec-title color-white">Tacit Enterprise</h2>
            <p class="color-white"><b>Reliable Industrial Chemical Solutions Backed by 25+ Years of Expertise</b></p>
            <p class="color-white">We deliver customized, economical, and eco-friendly chemical formulations designed to improve your industrial performance and operational efficiency.</p>
          </div>
          <a href="why-us.php" class="btn btn-primary">Learn More <i class="fa fa-arrow-right"></i><span style="top: 267.45px; left: 119.6px;"></span> </a>
        </div>
      </div>
      <!-- Content Column -->
      <div class="content-column col-12 col-lg-8 col-xl-8">
        <div class="row g-0">
          <!-- Features Block Three -->
          <div class="feature-block-three col-lg-6 col-md-6 col-sm-12">
            <div class="inner-box">
              <i class="icon flaticon-interview"></i>
              <i class="bg-icon flaticon-interview"></i>
              <h6 class="title"><a href="why-us.php">🧪 Customized Formulations</a></h6>
              <div class="text">We manufacture chemicals strictly as per client specifications to ensure maximum efficiency and compatibility with your industrial processes.</div>
            </div>
          </div>

          <!-- Features Block Three -->
          <div class="feature-block-three col-lg-6 col-md-6 col-sm-12">
            <div class="inner-box">
              <i class="icon flaticon-low-cost"></i>
              <i class="bg-icon flaticon-low-cost"></i>
              <h6 class="title"><a href="why-us.php">💰 Cost-Effective Solutions</a></h6>
              <div class="text">Our optimized production methods allow us to offer competitive pricing without compromising on product quality or performance.</div>
            </div>
          </div>
          <!-- Features Block Three -->
          <div class="feature-block-three col-lg-6 col-md-6 col-sm-12">
            <div class="inner-box">
              <i class="icon flaticon-loyalty"></i>
              <i class="bg-icon flaticon-loyalty"></i>
              <h6 class="title"><a href="why-us.php">✅Trusted Quality</a></h6>
              <div class="text">Every batch undergoes strict quality control, raw material inspection, and performance validation to ensure consistent and reliable results.</div>
            </div>
          </div>
          <!-- Features Block Three -->
          <div class="feature-block-three col-lg-6 col-md-6 col-sm-12">
            <div class="inner-box">
              <i class="icon flaticon-online-support"></i>
              <i class="bg-icon flaticon-online-support"></i>
              <h6 class="title"><a href="why-us.php">🔒Safe & Eco-Friendly</a></h6>
              <div class="text">Our formulations are designed for safe handling and include environmentally responsible, biodegradable options wherever possible.</div>
            </div>
          </div>
        </div>    
      </div>
    </div>
  </div>
</section>
<!-- Why us End -->
<!-- Product Start -->
<!-- Package -->
<section class="ourservices  st-service-area" style='background-image: url("images/tour_bg_1-2.webp");'>
  <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000">
    <div class="row">
      <div class="col-md-12">
        <div class="site-heading mb-3 text-center">
                <h2 class="sec-title ">Our Products</h2>
       </div>
               <div id="service-slider22" class="owl-carousel">

          <div class="post-slide">
            <div class="product-cat-style-one">
              <div class="thumb">
                <!-- <img src="images/cip-detergent.webp" class="thubug" alt="CIP Alkaline Detergent"> -->
                <div class="shape">
                  <img src="images/39.png" class="img-fluid" alt="Image Not Found">
                </div>
             <!--  </div>
              <div class="info">
                <h4><a href="cip-alkaline-detergent.php">CIP Alkaline Detergent</a></h4>
                <p>
                  Heavy-duty, low-foaming alkaline cleaning solution engineered for automated Clean-in-Place (CIP) systems to remove fats, proteins, oils, and organic scale in processing lines.
                </p>
              </div> -->
              <div class="button">
                <!-- <a href="cip-alkaline-detergent.php"> -->
                  <i class="fa fa-angle-right"></i>
                  <span>Know More</span>
                </a>
              </div>
            </div>
          </div>

          <div class="post-slide">
            <div class="product-cat-style-one">
              <div class="thumb">
                <img src="images/ICC1.webp" class="thubug" alt="Hemtop Industrial Cleaner">
                <div class="shape">
                  <img src="images/39.png" class="img-fluid" alt="Image Not Found">
                </div>
              </div>
              <div class="info">
                <h4>
                  <a href="hemtop-degreasing-solution.php">
                    Hemtop Industrial Cleaner
                  </a>
                </h4>
                <p>
                  High-performance degreasing and de-oiling solution designed for 
                  industrial cleaning. Hemtop effectively removes grease, oil, and 
                  tough grime from equipment while maintaining a neutral pH.
                </p>
              </div>
              <div class="button">
                <a href="hemtop-degreasing-solution.php">
                  <i class="fa fa-angle-right"></i>
                  <span>Know More</span>
                </a>
              </div>
            </div>
          </div>

          <div class="post-slide">
            <div class="product-cat-style-one">
              <div class="thumb">
                <img src="images/hemec4.webp" class="thubug" alt="HEMEC-4 Chemical">
                <div class="shape">
                  <img src="images/39.png" class="img-fluid" alt="Image Not Found">
                </div>
              </div>
              <div class="info">
                <h4><a href="hemec-4.php">HEMEC-4</a></h4>
                <p>
                 HEMEC-4 is a specialized chemical solution formulated for efficient cleaning and maintenance of industrial equipment, helping remove stubborn residues and ensuring improved operational hygiene.
                </p>
              </div>
              <div class="button">
                <a href="hemec-4.php">
                  <i class="fa fa-angle-right"></i>
                  <span>Know More</span>
                </a>
              </div>
            </div>
          </div>

          <div class="post-slide">
            <div class="product-cat-style-one">
              <div class="thumb">
                <img src="images/hemtop-plus.webp" class="thubug" alt="HEMTOP Plus Chemical">
                <div class="shape">
                  <img src="images/39.png" class="img-fluid" alt="Image Not Found">
                </div>
              </div>
              <div class="info">
                <h4><a href="hemtop-plus.php">HEMTOP+</a></h4>
                <p>
                 High-performance cleaner formulated for pharma API equipment and industrial machinery. Effectively removes all API residues, working with hot or cold and hard or brackish water.
                </p>
              </div>
              <div class="button">
                <a href="hemtop-plus.php">
                  <i class="fa fa-angle-right"></i>
                  <span>Know More</span>
                </a>
              </div>
            </div>
          </div>

        </div>
</div>
</div>
</div>
</div>
</section>
<!--  -->
<!-- Product End -->
</section><!-- floor cleaner -->
<!-- Industries Start -->
<section class="ourservices bg3 st-service-area" style='background-image: url("images/tour_bg_1-2.webp");'>
  <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000">
    <div class="row">
      <div class="col-md-12">
        <div class="site-heading mb-3 text-center">
          <h2 class="sec-title">Industries We Serve</h2>
        </div>
      </div>
      <div class="col-lg col-md-6 col-sm-6">
        <div class="card">
          <a href="pharmaceutical-industry.php">
            <img src="images/1.webp" class="img-fluid">
            <h3>Pharmaceutical Industry</h3>
          </a>
        </div>
      </div>
      <div class="col-lg col-md-6 col-sm-6">
        <div class="card">
          <a href="food-processing-industry.php">
            <img src="images/2.webp" class="img-fluid">
            <h3>Food Industry</h3>
          </a>
        </div>
      </div>
      <div class="col-lg col-md-6 col-sm-6">
        <div class="card">
          <a href="automotive-industry.php">
            <img src="images/3.webp" class="img-fluid">
            <h3>Automobile Industry</h3>
          </a>
        </div>
      </div>
      <div class="col-lg col-md-6 col-sm-6">
        <div class="card">
          <a href="manufacturing-units.php">
            <img src="images/4.webp" class="img-fluid">
            <h3>General Manufacturing Units</h3>
          </a>
        </div>
      </div>
      <div class="col-lg col-md-6 col-sm-6">
        <div class="card">
          <a href="dairy-industry.php">
            <img src="images/5.webp" class="img-fluid">
            <h3>Dairy Industry</h3>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Industries End -->
<!-- 
<section class="ourservices  st-service-area">
<div class="container">
<div class="col-md-12">
        <div class="site-heading mb-3 text-center">
          <h2 class="sec-title">Our Trusted Clients</h2>
        </div>
      </div>

<div id="client-slider22" class="owl-carousel">
<div class="post-slide">
    <img src="images/logo/1.webp" class="img-fluid">
</div>
<div class="post-slide">
    <img src="images/logo/2.webp" class="img-fluid">
</div>
<div class="post-slide">
    <img src="images/logo/3.webp" class="img-fluid">
</div>
<div class="post-slide">
    <img src="images/logo/4.webp" class="img-fluid">
</div>
<div class="post-slide">
    <img src="images/logo/5.webp" class="img-fluid">
</div>
<div class="post-slide">
    <img src="images/logo/6.webp" class="img-fluid">
</div>
<div class="post-slide">
    <img src="images/logo/7.webp" class="img-fluid">
</div>
<div class="post-slide">
    <img src="images/logo/8.webp" class="img-fluid">
</div>
<div class="post-slide">
    <img src="images/logo/9.webp" class="img-fluid">
</div>
<div class="post-slide">
    <img src="images/logo/10.webp" class="img-fluid">
</div>
<div class="post-slide">
    <img src="images/logo/11.webp" class="img-fluid">
</div>
<div class="post-slide">
    <img src="images/logo/12.webp" class="img-fluid">
</div>
<div class="post-slide">
    <img src="images/logo/13.webp" class="img-fluid">
</div>
<div class="post-slide">
    <img src="images/logo/14.webp" class="img-fluid">
</div>
<div class="post-slide">
    <img src="images/logo/15.webp" class="img-fluid">
</div>
<div class="post-slide">
    <img src="images/logo/16.webp" class="img-fluid">
</div>
<div class="post-slide">
    <img src="images/logo/17.webp" class="img-fluid">
</div>
<div class="post-slide">
    <img src="images/logo/18.webp" class="img-fluid">
</div>
</div>
</div>
</section> -->
<script>
document.addEventListener("DOMContentLoaded", function () {
	"use strict";
	const slider = document.getElementById("tacitSplitSlider");
	if (!slider) {
		return;
	}
	const slides = Array.from(
		slider.querySelectorAll(".tacit-splitx-slide")
	);
	const previousButton = slider.querySelector(".tacit-splitx-prev");
	const nextButton = slider.querySelector(".tacit-splitx-next");
	const currentCounter = slider.querySelector(".tacit-splitx-current");
	const totalCounter = slider.querySelector(".tacit-splitx-total");
	const progressBar = slider.querySelector(".tacit-splitx-progress-bar");
	if (!slides.length) {
		return;
	}
	let currentIndex = 0;
	let autoPlayTimer = null;
	let progressAnimation = null;
	let touchStartY = 0;
	let touchEndY = 0;
	const autoPlayDelay = 6000;
	const minimumSwipeDistance = 45;
	if (totalCounter) {
		totalCounter.textContent = String(slides.length).padStart(2, "0");
	}
	function updateSlider(index) {
		if (index < 0) {
			index = slides.length - 1;
		}
		if (index >= slides.length) {
			index = 0;
		}
		slides.forEach(function (slide, slideIndex) {
			const isActive = slideIndex === index;
			slide.classList.toggle("tacit-splitx-active", isActive);
			slide.setAttribute("aria-hidden", isActive ? "false" : "true");
		});
		currentIndex = index;
		if (currentCounter) {
			currentCounter.textContent = String(
				currentIndex + 1
			).padStart(2, "0");
		}
		restartAutoPlay();
	}
	function nextSlide() {
		updateSlider(currentIndex + 1);
	}
	function previousSlide() {
		updateSlider(currentIndex - 1);
	}
	function startProgressAnimation() {
		if (!progressBar) {
			return;
		}
		progressBar.style.transition = "none";
		progressBar.style.width = "0%";
		void progressBar.offsetWidth;
		progressBar.style.transition =
			"width " + autoPlayDelay + "ms linear";
		progressBar.style.width = "100%";
	}
	function restartAutoPlay() {
		window.clearInterval(autoPlayTimer);
		startProgressAnimation();
		autoPlayTimer = window.setInterval(function () {
			nextSlide();
		}, autoPlayDelay);
	}
	if (previousButton) {
		previousButton.addEventListener("click", function () {
			previousSlide();
		});
	}
	if (nextButton) {
		nextButton.addEventListener("click", function () {
			nextSlide();
		});
	}
	slider.addEventListener("keydown", function (event) {
		if (
			event.key === "ArrowUp" ||
			event.key === "ArrowLeft"
		) {
			event.preventDefault();
			previousSlide();
		}
		if (
			event.key === "ArrowDown" ||
			event.key === "ArrowRight"
		) {
			event.preventDefault();
			nextSlide();
		}
	});
	slider.addEventListener(
		"touchstart",
		function (event) {
			touchStartY = event.changedTouches[0].clientY;
		},
		{
			passive: true
		}
	);
	slider.addEventListener(
		"touchend",
		function (event) {
			touchEndY = event.changedTouches[0].clientY;
			const swipeDistance = touchEndY - touchStartY;
			if (Math.abs(swipeDistance) < minimumSwipeDistance) {
				return;
			}
			if (swipeDistance < 0) {
				nextSlide();
			} else {
				previousSlide();
			}
		},
		{
			passive: true
		}
	);
	slider.addEventListener("mouseenter", function () {
		window.clearInterval(autoPlayTimer);
		if (progressBar) {
			progressBar.style.transition = "none";
		}
	});
	slider.addEventListener("mouseleave", function () {
		restartAutoPlay();
	});
	document.addEventListener("visibilitychange", function () {
		if (document.hidden) {
			window.clearInterval(autoPlayTimer);
		} else {
			restartAutoPlay();
		}
	});
	updateSlider(0);
});
</script>
<?php include('partials/footer.php'); ?>
