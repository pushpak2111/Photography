<?php
  include("conection.php");
  include("session.php");
  $err= "";
  if(isset($_REQUEST['btn_submit']))
  {
      $q = "select * from customer_reg where password = '".$_REQUEST['txt_opass']."' and emailid = '".$_SESSION['customer']."'";
      $qq = mysqli_query($conn,$q);
      if(mysqli_num_rows($qq) > 0)
      {
          if($_REQUEST['txt_npass'] == $_REQUEST['txt_cpass'])
          {
              $q1 = "update customer_reg set password = '".$_REQUEST['txt_npass']."' where emailid = '".$_SESSION['customer']."'";
              mysqli_query($conn,$q1);
              $err="Pasword Changed!!!";
          }
          else
          {
              $err="New And Confirm Password Are Not Same";
          }
      }
      else
      {
          $err="old Password is Invalid";
      }
  } 
?>
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
    <?php
        include("menu.php");
    ?>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">Change Password</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 animated fadeIn">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                        <img class="img-fluid bg-white p-3 w-100" src="image/engagement/4.jpg" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid bg-white p-3 w-100" src="image/pre wedding/7.jpg" alt="">
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
            <div class="row g-0 justify-content-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">

                <center><h2>Change Password</h2>
                            <form class="form-horizontal style-form" method="post">
				                <div id="sendmessage" style="color:#FF3300;padding-left:30px;margin-bottom:20px;">
					                <?php
					                 if($err != '')
					                 {
					                 	echo "* ".$err; 
					                 }
					                 ?>
				                </div>
					            <div class="form-group">
					                <label class="col-sm-20 col-sm-20 "> Enter Old Password </label>
					                <div class="col-sm-8">
						                <input type="password" name="txt_opass" class="form-control" required>
					                </div>
					            </div>
                                <br>
					            <div class="form-group">
					                <label class="col-sm-20 col-sm-20 "> Enter New Password </label>
					                <div class="col-sm-8">
						                <input type="password" name="txt_npass" class="form-control" required>
					                </div>
					            </div>
                                <br>
					            <div class="form-group">
					                <label class="col-sm-20 col-sm-20 "> Enter Confirm Password </label>
					                <div class="col-sm-8">
						                <input type="password" name="txt_cpass" class="form-control" required>
					                </div>
					            </div>
                   
					            <div class="form-group">
						            <div class="col-sm-12">
						                <button type="submit" name="btn_submit" class="btn btn-danger">Submit</button>
						            </div>
					            </div></center>	
				            </form>
                            <br><br>
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
                <p class="mb-0">&copy; <a class="text-primary" href="#">Your Site Name</a>. All Rights Reserved.</p>
            </div>
            <div class="py-4 px-5 bg-secondary footer-shape position-relative text-center text-md-end">
                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                <p class="mb-0">Designed by <a class="text-primary fw-bold" href="https://htmlcodex.com">HTML Codex</a></p>  Distributed by <a href="https://themewagon.com" target="_blank" >ThemeWagon</a>
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