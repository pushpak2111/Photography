<?php
  include("conection.php");

  use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require "PHPMailer/src/Exception.php";
    require "PHPMailer/src/PHPMailer.php";
    require "PHPMailer/src/SMTP.php";

  if(isset($_REQUEST['submit']))
  {
    $code='c1000';
    $sc="select * from customer_reg";
    $sr=mysqli_query($conn,$sc);
    while($sw=mysqli_fetch_array($sr))
    {
    $code++;
    }
    $co=$code;

	$fn=$_REQUEST['fname'];
	$mn=$_REQUEST['mname'];
	$ln=$_REQUEST['lname'];
	$g=$_REQUEST['gender'];
	$add=$_REQUEST['address'];
	$m=$_REQUEST['mno'];
	$dob=$_REQUEST['dob'];
	$email=$_REQUEST['email'];
	$password=$_REQUEST['password'];

	$name1=$_FILES['cimage']['name'];
	$tmp1=$_FILES['cimage']['tmp_name'];
    $type1=$_FILES['cimage']['type'];
    $size1=$_FILES['cimage']['size'];
    $path1="image/".$name1;
	move_uploaded_file($tmp1,$path1);
    $insert="insert into customer_reg values ('$co','$fn','$mn','$ln','$g','$add','$m','$dob','$email','$password','$path1')";
    mysqli_query($conn,$insert);

    $table="CREATE TABLE `$co`(
                            `chat_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            `sender` VARCHAR (100) NOT NULL,
                            `receiver` VARCHAR (100) NOT NULL,
                            `date` VARCHAR (50) NOT NULL,
                            `time` VARCHAR (50) NOT NULL,
                            `message_type` VARCHAR (100) NOT NULL,
                            `message` VARCHAR (500) NOT NULL,
                            `status` VARCHAR (100) NOT NULL
                            ) ENGINE = INNODB";
        mysqli_query($conn,$table);

    
    $email= new PHPMailer;
        $email->isSMTP();
        $email->Host="smtp.gmail.com";
        $email->SMTPAuth=True;
        $email->Username="pushpakpatel127@gmail.com";
        $email->Password="rxueanerqwgonsnl";
        $email->SMTPSecure="ssl";
        $email->Port=465;
        $email->setFrom("pushpakpatel127@gmail.com");
        $email->addAddress($_REQUEST['email']);
        $email->isHtml(true);
        $email->Subject="OTP";
        $otp=rand(1111,9999);
        $_SESSION['otp']=$otp;
        $email->Body="<div style='font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2'>
        <div style='margin:50px auto;width:70%;padding:20px 0'>
          <div style='border-bottom:1px solid #eee'>
            <a href=' style='font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600'>Avinu Films</a>
          </div>
          <p style='font-size:1.1em'>Hi,</p>
          <p>Thank you for choosing Avinu Films. Use the following Registration OTP to complete your Sign Up procedures. OTP is valid for 5 minutes</p>
          <h2 style='background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;'>$otp</h2>
          <p style='font-size:0.9em;'>Regards,<br />Avinu Films</p>
          <hr style='border:none;border-top:1px solid #eee' />
          <div style='float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300'>
            <p>Avinu Films
             Inc</p>
           
            <p>Bardoli</p>
          </div>
        </div>
      </div>";
        $email->send();
        header("location:verification.php");

  }
 ?>
 
<!DOCTYPE html>
<html lang="en">

<head>
<?php
        include("css.php");
    ?>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content=
		"width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="captcha.css">
	<link rel="stylesheet" href=
"https://use.fontawesome.com/releases/v5.15.3/css/all.css"
		integrity=
"sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk"
		crossorigin="anonymous">
	<script src="captcha.js"></script>

</head>

<body onLoad="generate()">
    
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
                    <h1 class="display-4 mb-3 animated slideInDown">Registration</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Registration</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 animated fadeIn">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid bg-white p-3 w-100" src="image/engagement/1.jpg" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid bg-white p-3 w-100" src="image/pre wedding/5.jpg" alt="">
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
                                    <input type="text" class="form-control" name="fname" id="fname" placeholder="Your First Name" required>
                                    <label for="email">First Name</label>
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="mname" id="mname" placeholder="Your Middle Name" required>
                                    <label for="email">Middle Name</label>
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="lname" id="lname" placeholder="Your Last Name" required>
                                    <label for="email">Last Name</label>
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                Gender:
                                    <input type="radio" name="gender" value="Male" required>
                                    <label for="email">Male</label>
                                    <input type="radio" name="gender" value="Female" required>
                                    <label for="email">Female</label>
                                    <input type="radio" name="gender" value="Other" required>
                                    <label for="email">Other</label>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-floating">
                                    <textarea class="form-control" name="address" id="address" placeholder="Your Address" required></textarea>
                                    <label for="address">Address</label>
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="mno" id="mobile" placeholder="Your mobile number" required>
                                    <label for="mobile">Mobile Number</label>
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-floating">
                                    <input type="date" class="form-control" name="dob" id="dob" placeholder="Your DOB" required>
                                    <label for="dob">Date of Birthday</label>
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Your password" required>
                                    <label for="password">Password</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-floating">
                                <input type="file" name="cimage" class="form-control" required>
                                <label for="password">Image</label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                            <div id="user-input" class="inline">
		<input type="text" id="submit"
			placeholder="Captcha code" required />
	</div>

	<div class="inline" onClick="generate()">
		<i class="fas fa-sync"></i>
	</div>

	<div id="image" class="inline" selectable="False">
	</div><br><br>

	<input class="btn btn-primary py-3 px-5" name="submit" id="btn" onClick="printmsg()" type="submit" value="Register" />
 <div class="col-md-12">
	<p id="key"></p>
</div>
                                
                            
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