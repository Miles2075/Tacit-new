<?php include('partials/header.php'); ?>
<!-- Tacit Vertical Full-Screen Slider Start -->
<style>
/* =========================================================
   TACIT SPLIT-SCREEN PRODUCT SLIDER (STRESS-TESTED)
========================================================= */
.tacit-splitx-slider {
    position: relative;
    width: 100%;
    padding: 3rem 0;
    background-color: #f8f9fa; /* Slight off-white to make the slider pop */
}

.card-carousel {
    position: relative;
    width: 100%;
    min-height: 550px; /* Enforced height */
    background: #ffffff;
    border-radius: 16px; /* Smooth professional corners */
    overflow: hidden; /* Crucial: traps the image and text inside the border */
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08); /* Professional depth */
}

/* Base Card Setup */
.card-carousel .slide-card {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
    background: transparent;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.5s ease-in-out, visibility 0.5s;
    z-index: 0;
}

.card-carousel .slide-card.active {
    opacity: 1;
    visibility: visible;
    z-index: 1;
}

/* Layout Grid */
.card-carousel .row {
    height: 100%;
    margin: 0; /* Kill bootstrap default margins */
}

/* Text Container */
.card-carousel .text-column {
    display: flex;
    align-items: center;
    padding: 4rem 3rem 6rem 4rem; /* 6rem bottom padding clears the nav arrows */
    height: 100%;
}

.card-carousel .text-wrapper {
    max-width: 90%;
}

/* Image Container */
.card-carousel .img-column {
    padding: 0; /* Kill bootstrap default padding */
    height: 100%;
}

.card-carousel .img-column img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Forces image to fill without warping */
    object-position: center;
}

/* Animation Data */
.slide-card .text-wrapper > * {
    transform: translateY(20px);
    opacity: 0;
    transition: all 0.5s ease-in-out;
}

.slide-card.active .text-wrapper > * {
    transform: translateY(0);
    opacity: 1;
}

.slide-card.active .text-wrapper h6 { transition-delay: 0.1s; }
.slide-card.active .text-wrapper h3 { transition-delay: 0.2s; }
.slide-card.active .text-wrapper p { transition-delay: 0.3s; }
.slide-card.active .text-wrapper .btn { transition-delay: 0.4s; }

/* Navigation Constraints */
.card-carousel__nav {
    position: absolute;
    bottom: 0;
    left: 0;
    display: flex;
    z-index: 10; /* Forces nav above everything */
}

.carousel__arrow {
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    width: 60px;
    height: 60px;
    background-color: #2563eb; /* Primary brand color */
    fill: #ffffff;
    transition: background-color 0.2s ease;
}

.carousel__arrow:hover {
    background-color: #1d4ed8;
}

.carousel__arrow:last-child {
    border-left: 1px solid rgba(255, 255, 255, 0.2);
}

/* =========================================================
   MOBILE RESPONSIVENESS (CROSS-PLATFORM)
========================================================= */
@media (max-width: 991.98px) {
    .card-carousel {
        min-height: 700px;
        display: flex;
        flex-direction: column;
    }
    .card-carousel .row {
        flex-direction: column-reverse; /* Stacks text under image on mobile */
    }
    .card-carousel .text-column {
        height: 50%;
        padding: 3rem 2rem 5rem 2rem;
    }
    .card-carousel .img-column {
        height: 50%;
    }
}
.tacit-splitx-slider {
    position: relative;
    width: 100%;
    padding: 3rem 0;
    background-color: #f8f9fa;
    z-index: 0; /* <-- CRUCIAL: Forces the entire slider underneath your header */
}
</style>

<!-- Tacit Split-Screen Slider Start -->
<section id="tacitSplitSlider" class="tacit-splitx-slider" aria-label="Tacit Enterprise product slider">
    <div class="container mt-5">
        <div class="row g-0">
            <div class="col-12">
                <div class="card-carousel">
                    
                    <!-- Navigation (Pulled outside the cards to govern the whole block) -->
                    <div class="card-carousel__nav">
                        <span id="moveLeft" class="carousel__arrow">
                            <svg width="24" height="24" viewBox="0 0 24 24">
                                <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path>
                            </svg>
                        </span>
                        <span id="moveRight" class="carousel__arrow">
                            <svg width="24" height="24" viewBox="0 0 24 24">
                                <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
                            </svg>
                        </span>
                    </div>

                    <!-- Slide 1 -->
                    <div class="slide-card active">
                        <div class="row g-0">
                            <div class="col-lg-4 text-column">
                                <div class="text-wrapper">
                                    <h6 class="card-subtitle text-uppercase fs-6 text-muted mb-2">Industrial Degreasing</h6>
                                    <h3 class="card-title display-6 fw-bold mb-3">Hemtop</h3>
                                    <p class="card-text mb-4 text-secondary">   A high-performance industrial cleaner developed to remove
                        heavy grease, oil deposits and stubborn contaminants from
                        machinery, tools and metal surfaces.</p>
                                    <a href="hemtop-degreasing-solution.php" class="btn btn-primary px-4 py-2 rounded-pill">Powerful Degreasing Solution</a>
                                </div>
                            </div>
                            <div class="col-lg-8 img-column">
                                <img src="images/slider-hemtop.png" alt="Industrial Image 1">
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="slide-card">
                        <div class="row g-0">
                            <div class="col-lg-4 text-column">
                                <div class="text-wrapper">
                                    <h6 class="card-subtitle text-uppercase fs-6 text-muted mb-2">Hygiene &amp; Sanitation</h6>
                                    <h3 class="card-title display-6 fw-bold mb-3">Hemec-4</h3>
                                    <p class="card-text mb-4 text-secondary">   A dependable cleaning and sanitizing formulation developed
                        to support microbial control and maintain hygienic conditions
                        in critical industrial and institutional environments.</p>
                                    <a href="hemec-4.php" class="btn btn-primary px-4 py-2 rounded-pill">Explore Hemec-4</a>
                                </div>
                            </div>
                            <div class="col-lg-8 img-column">
                                <img src="images/slider-hemec.png" alt="Industrial Image 2">
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="slide-card">
                        <div class="row g-0">
                            <div class="col-lg-4 text-column">
                                <div class="text-wrapper">
                                    <h6 class="card-subtitle text-uppercase fs-6 text-muted mb-2">Customized Formulations</h6>
                                    <h3 class="card-title display-6 fw-bold mb-3">Specialty Cleaners</h3>
                                    <p class="card-text mb-4 text-secondary">   Customized industrial cleaning formulations developed
                        according to customer requirements, process conditions,
                        contaminant types and surface characteristics.</p>
                                    <a href="contact-us.php" class="btn btn-primary px-4 py-2 rounded-pill">Discuss Your Requirement</a>
                                </div>
                            </div>
                            <div class="col-lg-8 img-column">
                                <img src="images/tacit-slider-3.jpg" alt="Industrial Image 3">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Tacit Split-Screen Slider End -->
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

 <!--          <div class="post-slide">
            <div class="product-cat-style-one">
              <div class="thumb">
                <img src="images/cip-detergent.webp" class="thubug" alt="CIP Alkaline Detergent">
                <div class="shape">
                  <img src="images/39.png" class="img-fluid" alt="Image Not Found">
                </div>
              </div>
              <div class="info">
                <h4><a href="cip-alkaline-detergent.php">CIP Alkaline Detergent</a></h4>
                <p>
                  Heavy-duty, low-foaming alkaline cleaning solution engineered for automated Clean-in-Place (CIP) systems to remove fats, proteins, oils, and organic scale in processing lines.
                </p>
              </div>
              <div class="button">
                <a href="cip-alkaline-detergent.php">
                  <i class="fa fa-angle-right"></i>
                  <span>Know More</span>
                </a>
              </div>
            </div>
          </div> -->

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
document.addEventListener('DOMContentLoaded', function () {
    const items = document.querySelectorAll('.card-carousel .slide-card');
    if(items.length === 0) return;

    let current = 0;
    const total = items.length;
    
    function setSlide(next) {
        if (next >= total) next = 0;
        if (next < 0) next = total - 1;
        
        items[current].classList.remove('active');
        items[next].classList.add('active');
        current = next;
    }

    const moveRight = document.getElementById('moveRight');
    const moveLeft = document.getElementById('moveLeft');
    if (moveRight) moveRight.addEventListener('click', () => setSlide(current + 1));
    if (moveLeft) moveLeft.addEventListener('click', () => setSlide(current - 1));

    let touchStartX = 0;
    let touchEndX = 0;
    const swipeThreshold = 50; 
    const cardCarousel = document.querySelector('.card-carousel');

    if (cardCarousel) {
        cardCarousel.addEventListener('touchstart', e => {
            if (e.changedTouches && e.changedTouches[0]) {
                touchStartX = e.changedTouches[0].screenX;
            }
        }, { passive: true });

        cardCarousel.addEventListener('touchend', e => {
            if (e.changedTouches && e.changedTouches[0]) {
                touchEndX = e.changedTouches[0].screenX;
                if (touchEndX < touchStartX - swipeThreshold) setSlide(current + 1);
                if (touchEndX > touchStartX + swipeThreshold) setSlide(current - 1);
            }
        }, { passive: true });
    }
});
</script>
<!-- Tacit Split-Screen Slider End -->
<?php include('partials/footer.php'); ?>
    