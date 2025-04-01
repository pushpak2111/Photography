<?php
  include("conection.php");
  include("session.php");

  if(isset($_REQUEST['edit']))
  {
    $e=$_REQUEST['edit'];
    $qry="select * from customer_reg where cid='$e'";
    $result=mysqli_query($conn,$qry);
    $rows=mysqli_fetch_array($result);
  }
  if(isset($_REQUEST['update']))
  {
    $fn=$_REQUEST['fname'];
	$mn=$_REQUEST['mname'];
	$ln=$_REQUEST['lname'];
	$g=$_REQUEST['gender'];
	$add=$_REQUEST['address'];
	$m=$_REQUEST['mno'];
	$dob=$_REQUEST['dob'];
	$name1=$_FILES['cimage']['name'];
	$tmp1=$_FILES['cimage']['tmp_name'];
    $type1=$_FILES['cimage']['type'];
    $size1=$_FILES['cimage']['size'];
    $path1="../user/image/".$name1;
	move_uploaded_file($tmp1,$path1);
    $i=$_REQUEST['i'];
	  $e1=$_REQUEST['edit'];
    $update="update customer_reg set fname='$fn',mname='$mn',lname='$ln',gender='$g',address='$add',mno='$m',dob='$dob',cimage='$path1' where cid='$e1'";
    mysqli_query($conn,$update);
    header("location:profile.php");
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
                    <h1 class="display-4 mb-3 animated slideInDown">Update Profile</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update Profile</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 animated fadeIn">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                        <img class="img-fluid bg-white p-3 w-100" src="image/engagement/3.jpg" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid bg-white p-3 w-100" src="image/pre wedding/6.jpg" alt="">
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

                    <form method="post" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-md-12 ">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="fname" value="<?php echo $rows['fname']?>" placeholder="Your First Name" required pattern="[A-Z,a-z]{2,}">
                                    <label for="email">First Name</label>
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="mname" value="<?php echo $rows['mname']?>" placeholder="Your Middle Name" required pattern="[A-Z,a-z]{2,}">
                                    <label for="email">Middle Name</label>
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="lname" value="<?php echo $rows['lname']?>" placeholder="Your Last Name" required pattern="[A-Z,a-z]{2,}">
                                    <label for="email">Last Name</label>
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                Gender:
                                <?php
                                if ($rows['gender']=='Male')
                                {
                                ?>
                                    <input type="radio" name="gender" value="Male" checked="checked" required>
                                    <label for="email">Male</label>
                                    <input type="radio" name="gender" value="Female" required>
                                    <label for="email">Female</label>
                                    <input type="radio" name="gender" value="Other" required>
                                    <label for="email">Other</label>
                                <?php
                                }
                                else if($rows['gender']=='Female')
                                {
                                    ?>
                                    <input type="radio" name="gender" value="Male" required>
                                    <label for="email">Male</label>
                                    <input type="radio" name="gender" value="Female" checked="checked" required>
                                    <label for="email">Female</label>
                                    <input type="radio" name="gender" value="Other" required>
                                    <label for="email">Other</label>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <input type="radio" name="gender" value="Male" required>
                                    <label for="email">Male</label>
                                    <input type="radio" name="gender" value="Female" required>
                                    <label for="email">Female</label>
                                    <input type="radio" name="gender" value="Other" checked="checked" required>
                                    <label for="email">Other</label>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-floating">
                                    <input tupe="text" class="form-control" name="address" value="<?php echo $rows['address']?>" placeholder="Your Address" required>
                                    <label for="address">Address</label>
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="mno" value="<?php echo $rows['mno']?>" placeholder="Your mobile number" required>
                                    <label for="mobile">Mobile Number</label>
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="dob" value="<?php echo $rows['dob']?>" placeholder="Your DOB" required>
                                    <label for="dob">DOB</label>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                            Image:
                            <input type="file" name="cimage" >
                            <input type="hidden" name="i"  class="form-control" value="<?php echo $rows['cimage']?>">
                            <img src="../user/<?php echo $rows['cimage'] ?>" width="100px" height="100px">
                            </div>
                            <div class="col-12 text-center">
                                <input class="btn btn-primary py-3 px-5" value="Update" name="update" type="submit">
                            
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