<!doctype html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width,initial-scale=1">
   <link rel="shortcut icon" type="image/png" href="images/logo.jpeg">
   <title><?php echo isset($title) ? htmlspecialchars($title) . " - Tacit Enterprise" : "Tacit Enterprise - High Performance Industrial Cleaning Chemicals"; ?></title>
   <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css'>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders:opsz,wght@10..72,100..900&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body> 

   <!-- Topbar Start -->

   <div class="topbar">
      <div class="container-fluid">
         <div class="row align-items-center">
            <div class="col-12 col-md-8 text-center text-md-left">
               <ul class="topbar-contacts">
                  <li>
                     <i class="fa fa-phone"></i>
                     <a href="tel:+91 9898028467">+91 98980 28467</a>
                  </li>
                  <li>
                     <i class="fa fa-envelope"></i>
                     <a href="mailto:tacitenterprise@hotmail.com">tacitenterprise@hotmail.com</a>
                  </li>
               </ul>
            </div>
            <div class="col-12 col-md-4 text-center text-md-right">
               <ul class="topbar-socials">
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
               </ul>
            </div>

         </div>
      </div>
   </div>

   <!-- Topbar End -->

<!-- Menu Start -->

<div class="navigation-wrap header start-header start-style">
   <div class="container  pbl-0">
      <div class="row">
         <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-light">
               <a class="navbar-brand" href="index.php">
                  <img src="images/logo.webp" alt="Tacit Logo">
               </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto py-4 py-md-0">
                     <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                     <li class="nav-item">
                       <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>
                       <div class="dropdown-menu">
                          <a class="dropdown-item" href="company-overview.php">Company Overview</a>
                          <a class="dropdown-item" href="our-history.php">Our History</a>
                          <a class="dropdown-item" href="vision-and-mission.php">Vision & Mission</a>
                          <a class="dropdown-item" href="sustainability.php">Sustainability</a>                            
                       </div>
                    </li>
                    <li class="nav-item">
                     <a href="why-us.php" class="nav-link">Why Us</a>
                  </li>  
                  <li class="nav-item">
                     <a href="facility.php" class="nav-link">Facility</a>
                  </li>
                  <li class="nav-item">
                     <a href="quality-assurance.php" class="nav-link">Quality Assurance</a>
                  </li>  
                  <li class="nav-item">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Products</a>
                    <div class="dropdown-menu">
                       <a class="dropdown-item" href="hemtop-degreasing-solution.php">Hemtop Industrial Cleaner</a>
                       <a class="dropdown-item" href="hemtop-plus.php">Hemtop Plus</a>
                       <a class="dropdown-item" id="n" href="hemec-4.php">Hemec-4</a>
                    </div>
                 </li>
                 
                 <li class="nav-item">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Industries</a>
                    <div class="dropdown-menu">
                       <a class="dropdown-item" href="pharmaceutical-industry.php">Pharmaceutical Industry</a>
                       <a class="dropdown-item" href="food-processing-industry.php">Food Processing Industry</a>
                       <a class="dropdown-item" href="automotive-industry.php">Automotive Industry</a>
                       <a class="dropdown-item" href="manufacturing-units.php">Manufacturing Units</a>
                       <a class="dropdown-item" href="dairy-industry.php">Dairy Industry</a>
                       <a class="dropdown-item" href="textile-industry.php">Textile Industry</a>
                       <a class="dropdown-item" href="metal-industry.php">Metal Industry</a>
                    </div>
                 </li>
                 <li class="nav-item">
                   <a href="blog.php" class="nav-link">Blog</a>
                </li>  
                <li class="nav-item">
                   <a href="contact-us.php" class="nav-link">Contact</a>
                </li> 
             </ul>
          </div>
       </nav>
    </div>
 </div>
 </div>
 </div>
 <!-- Menu End -->
