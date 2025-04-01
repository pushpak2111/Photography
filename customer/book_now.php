<?php
  include("conection.php");
  include("session.php");
  if(isset($_REQUEST['submit']))
  {
    $a=$_REQUEST['cl_name'];
    $c=$_REQUEST['cl_num'];
    $d=$_REQUEST['ev_date'];
    $e=$_REQUEST['clemail'];
    $f=$_REQUEST['cl_address'];
    $name1=$_FILES['cl_image']['name'];
	$tmp1=$_FILES['cl_image']['tmp_name'];
    $type1=$_FILES['cl_image']['type'];
    $size1=$_FILES['cl_image']['size'];
    $path2="image/".$name1;
	move_uploaded_file($tmp1,$path2);
    $book=$_REQUEST['book'];
    $insert="insert into user_bookclname values(null,'$a','$c','$d','$e','$f','$path2','$book','$user')";
    mysqli_query($conn,$insert);
    header("location:viewbooking.php");
  }
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include("css.php");
    ?>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->
    <?php include("menu.php");
?>

    

    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">Book Now</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Book Now</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 animated fadeIn">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                        <img class="img-fluid bg-white p-3 w-100" src="image/engagement/2.jpg" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid bg-white p-3 w-100" src="image/pre wedding/4.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Contact Start -->
    
        
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h2><p class="text-primary text-uppercase mb-2">Book Now Form</p></h2>
            </div>
            <br>
            <?php
	$c1=$_REQUEST['book'];
    $select="select * from product_entry join add_category on add_category.cid = product_entry.pcid join sub_category on sub_category.sid = product_entry.pscid where product_entry.peid='$c1'";
    $res=mysqli_query($conn,$select);
    while($row=mysqli_fetch_array($res))
    {
    ?>
    <center><div class="gallery">
  <a target="_blank" href="../Admin/<?php echo $row['image']?>">
    <img src="../Admin/<?php echo $row['image'] ?>" alt="Cinqimageue Terre" width="600" height="400" >
  </a>
  <div class="desc"><?php echo $row['category']?><br>
  <td><?php echo $row['subcategoryname'] ?></td></center>
  <?php
        }
        ?>
        <br><br>
            <div class="row g-0 justify-content-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                    
                    <form method="post" enctype="multipart/form-data">
                        <div class="row g-3">
                        <div class="col-md-12">
            
                                <div class="form-floating">
                                    <input  name="cl_name" type="text" class="form-control" id="text" placeholder="Enter Your First name" required pattern="[a-z,A-Z, ]{2,}">
                                    <label for="clname"><h6>Client's Full Name</h6></label>
                                </div>
                            </div>
                            

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="mobile" placeholder="enter valid number" name="cl_num" required pattern="[6-9]\d{9}">
                                    <label for="mobile"><h6>client's Mobile no.</h6></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="date" min="<?php $d=date ('Y-m-d'); echo date('Y-m-d',strtotime($d. '+2 days')); ?>" class="form-control" id="dob" placeholder="Your birthdate" name="ev_date" required>
                                    <label for="eventdate"><h6><b>Event Date</b></h6></label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email" name="clemail" required>
                                    <label for="email"><h6>client's Email</h6></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <textarea class="form-control" id="text" placeholder="Your address" name="cl_address" required></textarea>
                                    <label for="claddress"><h6>client's Address</h6></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                     <input type="file" name="cl_image" class="form-control" required>
                                    <label for="password">Client's Id Proof</label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary py-3 px-5" type="submit" name="submit">REGISTER</button>
                                <br><br><br>
                                
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
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
                <p class="mb-0">Designed by <a class="text-primary fw-bold" href="https://htmlcodex.com">Pushpak Patel</a></p>   <a href="https://themewagon.com" target="_blank" ></a>
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