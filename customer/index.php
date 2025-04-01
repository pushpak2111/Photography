<?php
include("conection.php");
include("session.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("css.php");
    ?>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <?php include("menu.php");
?>


    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <p class="text-primary text-uppercase mb-2 animated slideInDown">Welcome To Avinu Films</p>
                    <h1 class="display-4 mb-3 animated slideInDown">Wedding and portrait studio based in Gujarat</h1>
                    <p class="animated slideInDown">If you are in search of some out-of-the-box and world-famous outdoor or indoor photography sets in Gujarat, then we welcome you to explore the most unique and custom-made photography sets we have for you at the La Fabuloso Photo Studio.</p>
                    <div class="d-flex align-items-center pt-4 animated slideInDown">
                        <button type="button" class="btn-play" data-bs-toggle="modal"
                            data-src="image/didi.mp4" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                        <h5 class="ms-4 mb-0 d-none d-sm-block">Play Video</h5>
                    </div>
                </div>
                <div class="col-lg-6 animated fadeIn">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid bg-white p-3 w-100 mb-3" src="image/post wedding/7.jpg" alt="">
                            <img class="img-fluid bg-white p-3 w-50" src="image/pre wedding/3.jpg" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid bg-white p-3 w-50 mb-3" src="image/wedding/40.jpg" alt="">
                            <img class="img-fluid bg-white p-3 w-100" src="image/haldi/2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Video Modal Start -->
    <div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                            allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row g-3 img-twice position-relative h-100">
                        <div class="col-6">
                        <img class="img-fluid bg-light p-3" src="../User/image/wedding/25.jpg" alt="">
                        </div>
                        <div class="col-6 align-self-end">
                            <img class="img-fluid bg-light p-3" src="../User/image/pre wedding/1.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <p class="text-primary text-uppercase mb-2">About Us</p>
                        <h1 class="display-6 mb-4">We Are Creative And Professional Photographer</h1>
                        <p>Avinu Films is one of the best photography and videography service provider company in Nizar, Gujarat established since 1992. Our speciality  is in wedding, pre-wedding, engagement, baby showers, birthday celebration and other family events. We have well trained and expertise photographers and videographers, who has more than two decades of experience in this industry. </p>
                        <p>We provide one stop services to our clients including latest cameras to cran and drone to 360 shooting which will freeze happy moments into photos and videos. Our service includes    photography, videography,crane shooting, drone shooting, 360 degree photo-video shooting across all india.</p>
                        <div class="row g-2 mb-4">
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-3"></i>Wedding photography and videography
                            </div>
                                <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-3"></i>Candid photography
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-3"></i>Pre-wedding shoots
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-3"></i>Albums
                            </div>
                            </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Facts Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">Why Choose Us!</p>
                <h1 class="display-6 mb-5">The leading photo studio in the Gujarat</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-4 col-md-6 pt-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="fact-item bg-light text-center h-100 p-5">
                        <h1 class="display-2 text-primary mb-3" data-toggle="counter-up"> 5</h1>
                        <h4 class="mb-3">Award Winning</h4>
                        <span></span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="fact-item bg-light text-center h-100 p-5">
                        <h1 class="display-2 text-primary mb-3" data-toggle="counter-up">32</h1>
                        <h4 class="mb-3">Years Experience</h4>
                        <span></span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pt-lg-5 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="fact-item bg-light text-center h-100 p-5">
                        <h1 class="display-2 text-primary mb-3" data-toggle="counter-up">2345</h1>
                        <h4 class="mb-3">Happy Clients</h4>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->


    <!-- Service Start -->
   <!-- <div class="container-xxl bg-light py-5 my-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">Our Services</p>
                <h1 class="display-6 mb-4">We Provide Best Professional Services</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item d-flex flex-column bg-white p-3 pb-0">
                        <div class="position-relative">
                            <img class="img-fluid" src="img/service-1.jpg" alt="">
                            <div class="service-overlay">
                                <a class="btn btn-lg-square btn-outline-light rounded-circle" href=""><i class="fa fa-link text-primary"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h4>Weddings</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 pt-lg-5 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item d-flex flex-column bg-white p-3 pb-0">
                        <div class="position-relative">
                            <img class="img-fluid" src="img/service-2.jpg" alt="">
                            <div class="service-overlay">
                                <a class="btn btn-lg-square btn-outline-light rounded-circle" href=""><i class="fa fa-link text-primary"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h4>Portraits</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item d-flex flex-column bg-white p-3 pb-0">
                        <div class="position-relative">
                            <img class="img-fluid" src="img/service-3.jpg" alt="">
                            <div class="service-overlay">
                                <a class="btn btn-lg-square btn-outline-light rounded-circle" href=""><i class="fa fa-link text-primary"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h4>Fashion</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 pt-lg-5 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item d-flex flex-column bg-white p-3 pb-0">
                        <div class="position-relative">
                            <img class="img-fluid" src="img/service-4.jpg" alt="">
                            <div class="service-overlay">
                                <a class="btn btn-lg-square btn-outline-light rounded-circle" href=""><i class="fa fa-link text-primary"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h4>Editorial</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     Service End -->


    <!-- Project Start -->
    <div class="container-xxl bg-success py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">Our Works</p>
                <h1 class="display-6 mb-0">Discover our unique and creative photoshoot</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="project-item">
                                <img class="img-fluid" src="image\engagement\25.jpg" alt="">
                                <a class="project-title h5 mb-0" href="engagement.php">
                                    Engagement
                                </a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="project-item">
                                <img class="img-fluid" src="image\boy birthday\6.jpg" alt="">
                                <a class="project-title h5 mb-0" href="birthday.php" >
                                    Birthday
                                </a>
                            </div>
                        </div>
                        <div class="project-item">
                           
                            
                            <img class="img-fluid" src="image\post wedding\5.jpg" alt="">
                                <a class="project-title h5 mb-0" href="postwedding.php" >
                                    Post Wedding
                                </a>
                                </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="project-item">
                                <img class="img-fluid" src="image\model m in\6.jpg" alt="">
                                <a class="project-title h5 mb-0" href="modeling.php">
                                    Modeling
                                </a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="project-item">
                                <img class="img-fluid" src="image\mehndi\1.jpg" alt="">
                                <a class="project-title h5 mb-0" href="mehandi.php">
                                    Mehndi
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="project-item">
                                <img class="img-fluid" src="image\wedding\14.jpg" alt="">
                                <a class="project-title h5 mb-0" href="wedding.php">
                                    Wedding
                                </a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="project-item">
                                <img class="img-fluid" src="image\baby shower\b15.jpg" alt="">
                                <a class="project-title h5 mb-0" href="babyshower.php">    
                                    Baby shawor
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="project-item">
                                <img class="img-fluid" src="image\haldi\9.jpg" alt="">
                                <a class="project-title h5 mb-0" href="haldi.php" >
                                    Haldi
                                </a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="project-item">
                                <img class="img-fluid" src="image\pre wedding\9.jpg" alt="">
                                <a class="project-title h5 mb-0" href="prewedding.php" >
                                    Pre wedding
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Project End -->


    <!-- Team Start -->
    <div class="container-xxl px-0 py-5">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="text-primary text-uppercase mb-2">Our Team</p>
            <h1 class="display-6 mb-0">Creative photograher and videographer</h1>
        </div>
        <div class="row g-0">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="row g-0 flex-sm-row">
                    <div class="col-sm-6">
                        <div class="team-img position-relative">
                            <img class="img-fluid" src="../User/image/1.jpeg" alt="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="h-100 p-5 d-flex flex-column justify-content-between">
                            <div class="mb-3">
                                <h4>Avinash Khonde</h4>
                                <span>Photographer</span>
                            </div>
                            <p>The senior photographer of our team with 20 years experiance of wedding photography</p>
                            <div class="d-flex">
                                <!-- <a class="btn btn-square btn-outline-primary rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-outline-primary rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-outline-primary rounded-circle me-2" href=""><i class="fab fa-instagram"></i></a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="row g-0 flex-sm-row-reverse flex-lg-row">
                    <div class="col-sm-6">
                        <div class="team-img position-relative">
                            <img class="img-fluid" src="../User/image/2.jpeg" alt="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="h-100 p-5 d-flex flex-column justify-content-between">
                            <div class="mb-3">
                                <h4>Vinod Khonde</h4>
                                <span>Videographer</span>
                            </div>
                            <p>The senior videographer of our team with 18 years experiance of wedding videography</p>
                            <div class="d-flex">
                                <!-- <a class="btn btn-square btn-outline-primary rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-outline-primary rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-outline-primary rounded-circle me-2" href=""><i class="fab fa-instagram"></i></a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="row g-1 flex-lg-row-reverse">
                    <div class="col-sm-5">
                        <div class="team-img position-relative">
                            <img class="img-fluid" style="height:450px; width:400px;" src="../User/image/3.jpeg" alt="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="h-100 p-5 d-flex flex-column justify-content-between">
                            <div class="mb-3">
                                <h4>Pushpak Patel</h4>
                                <span>Videographer</span>
                            </div>
                            <p>The junior videographer & photo editor of our team with 3 years experiance of wedding videography</p>
                            <div class="d-flex">
                                <!-- <a class="btn btn-square btn-outline-primary rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-outline-primary rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-outline-primary rounded-circle me-2" href=""><i class="fab fa-instagram"></i></a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="row g-0 flex-sm-row-reverse">
                    <div class="col-sm-6">
                        <div class="team-img position-relative">
                            <img class="img-fluid" src="../User/image/4.jpeg" alt="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="h-100 p-5 d-flex flex-column justify-content-between">
                            <div class="mb-3">
                                <h4>Tushar Ramani</h4>
                                <span>Editor</span>
                            </div>
                            <p>The junior videoeditor of our team with 3 years experiance of wedding videography</p>
                            <div class="d-flex">
                                <!-- <a class="btn btn-square btn-outline-primary rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-outline-primary rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-outline-primary rounded-circle me-2" href=""><i class="fab fa-instagram"></i></a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">Client's Review</p>
                <h1 class="display-6 mb-0">More Than 2000+ Customers Trusted Us</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item bg-white p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-1.jpg" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Rajnandini Chandak</h5>
                            <span>teacher</span>
                        </div>
                    </div>
                    <p class="mb-0">Maternity shoot was just awesome at the studio.</p>
                </div>
                <div class="testimonial-item bg-white p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-2.jpg" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Harshil Joshi</h5>
                            <span>Doctor</span>
                        </div>
                    </div>
                    <p class="mb-0">Punctual, Systematic & Fantastic work. Very nice experience</p>
                </div>
                <div class="testimonial-item bg-white p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-3.jpg" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">harshal Patel</h5>
                            <span>Professor</span>
                        </div>
                    </div>
                    <p class="mb-0">It was my baby's first birthday photoshoot n it happens very smoothly.staff was good n very quickly they done all setups...</p>
                </div>
                <div class="testimonial-item bg-white p-4">
                    <div class="d-flex align-items-center mb-4">
                        <img class="flex-shrink-0 rounded-circle border p-1" src="img/testimonial-4.jpg" alt="">
                        <div class="ms-4">
                            <h5 class="mb-1">Meera Krishna</h5>
                            <span>art designer</span>
                        </div>
                    </div>
                    <p class="mb-0">Very great and supportive team because I was there for my new born shoot and baby was not in mood. The team of studio om handled it very patiently and we finally done it with what we exactly wanted</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Footer Start -->
    <?php include("footer.php");
    ?>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid bg-dark text-white border-top border-secondary px-0">
        <div class="d-flex flex-column flex-md-row justify-content-between">
            <div class="py-4 px-5 text-center text-md-start">
                <p class="mb-0">&copy; <a class="text-primary" href="#">Avinu Films</a>. All Rights Reserved.</p>
            </div>
            <div class="py-4 px-5 bg-secondary footer-shape position-relative text-center text-md-end">
                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                <p class="mb-0">Designed by <a class="text-primary fw-bold" href="https://htmlcodex.com">Pushpak Patel</a></p>  <a href="https://themewagon.com" target="_blank" ></a>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>