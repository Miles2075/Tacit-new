<?php include('partials/header.php'); ?>
<style>
.sustainability-intro {
    background: #f9f9f9;
}

.sustainability-list {
    list-style: none;
    padding-left: 0;
    margin-top: 15px;
}

.sustainability-list li {
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    line-height: 1.75;
    color: #4a5568;
    margin-bottom: 10px;
    position: relative;
    padding-left: 24px;
}

.sustainability-list li::before {
    content: "✓";
    position: absolute;
    left: 0;
    top: 0;
    color: #5047a2;
    font-weight: 700;
}

.sustainability-cta h3 {
    color: #fff;
    font-family: "Big Shoulders", sans-serif;
    font-size: 32px;
    font-weight: 700;
    text-align: center;
    margin-bottom: 12px;
}

.sustainability-cta p {
    color: rgba(255, 255, 255, 0.9);
    text-align: center;
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    line-height: 1.7;
    max-width: 750px;
    margin: 0 auto;
}

.sustainability-features {
    background: #eaedf4;
}

.sustain-card {
    background: #fff;
    padding: 35px 25px;
    border-radius: 12px;
    text-align: center;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    transition: all .3s ease;
    height: 95%;
}

.sustain-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.12);
}

.sustain-icon {
    font-size: 42px;
    margin-bottom: 15px;
}

.sustain-card h5 {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 18px;
    color: #1a1f29;
    margin-bottom: 10px;
}

.sustain-card p {
    font-family: 'Poppins', sans-serif;
    font-size: 15px;
    line-height: 1.6;
    color: #555d6e;
    text-align: center;
    margin-bottom: 0;
}

.section-subtitle {
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    color: #666;
    max-width: 600px;
    margin: 0 auto;
}

.sustainability-cta {
    background: #5047a2;
    color: #fff;
    padding: 60px 0;
}

.sustainability-cta .btn {
    background: #fff;
    color: #5047a2;
    font-weight: 600;
    padding: 12px 32px;
    margin-top: 20px;
    border-radius: 30px;
}

@media screen and (max-width: 767px){
    .sustainability-features .mb-5 {
        margin-bottom: 1rem !important;
    }
    .sustain-card {
        margin-bottom: 20px;
        height: auto;
        padding: 25px 20px;
    }
    .sustainability-features {
        padding-bottom: 20px !important;
    }
    .sustainability-cta {
        padding: 35px 0;
    }
}
</style>
<!-- BANNER -->
<section class="internal-page-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="bannertitle">
                    <h1>Sustainability</h1>
                </div>
            </div>
            <div class="col-md-12">
                <div class="breadcrumb">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#!">About</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- INTRO SECTION -->
<section class="about-sec2 overflow-hidden" >
    <div class="container">
        <div class="row ">

            <div class="col-lg-5 mb-4">
                <img src="images/eco-conscious.png" class="img-fluid rounded shadow">
            </div>

            <div class="col-lg-7">
                <h2 class="sec-title">Our Commitment to Sustainable Growth</h2>

                <p>
                    At <strong>Tacit Enterprise</strong>, sustainability is not just a goal – it is a responsibility.
                    We focus on developing innovative industrial chemical solutions that deliver high performance
                    while reducing environmental impact.
                </p>

                <p>
                    Our manufacturing philosophy focuses on efficient resource utilization,
                    responsible chemical handling, and continuous environmental improvement
                    to support both industry and nature.
                </p>

                <ul class="sustainability-list">
                    <li>Eco-friendly chemical formulations</li>
                    <li>Energy-efficient production processes</li>
                    <li>Waste reduction & responsible disposal</li>
                    <li>Continuous environmental improvements</li>
                </ul>

            </div>
        </div>
    </div>
</section>



<!-- INITIATIVES -->
<section class="sustainability-features py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="sec-title">Our Sustainability Initiatives</h2>
            <p class="section-subtitle">
                Driving responsible industrial innovation through sustainable practices
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-6 col-lg-3">
                <div class="sustain-card">
                    <div class="sustain-icon">🌱</div>
                    <h5>Eco-Friendly Products</h5>
                    <p>
                        Our industrial chemicals are designed to provide maximum
                        performance with minimal environmental impact.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="sustain-card">
                    <div class="sustain-icon">♻️</div>
                    <h5>Waste Reduction</h5>
                    <p>
                        Advanced manufacturing techniques help reduce production
                        waste and optimize resource utilization.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="sustain-card">
                    <div class="sustain-icon">🛡️</div>
                    <h5>Safe Chemical Handling</h5>
                    <p>
                        Strict safety protocols ensure responsible storage,
                        transportation, and handling of chemicals.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="sustain-card">
                    <div class="sustain-icon">⚡</div>
                    <h5>Resource Optimization</h5>
                    <p>
                        Efficient usage of water, energy, and raw materials helps
                        us build sustainable industrial processes.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>



<!-- CTA -->
<section class="sustainability-cta">
    <div class="container text-center">
        <h3>Partner With Us for Sustainable Industrial Solutions</h3>
        <p>
            At Tacit Enterprise, we combine innovation, safety, and sustainability
            to deliver responsible chemical solutions that benefit industries
            and the environment.
        </p>

        <a href="contact-us.php" class="btn btn-light">Contact Our Team</a>
    </div>
</section>


<?php include('partials/footer.php'); ?>