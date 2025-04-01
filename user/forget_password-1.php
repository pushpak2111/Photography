<?php
	include "conection.php";
	 use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
   
    require "PHPMailer/src/Exception.php";
    require "PHPMailer/src/PHPMailer.php";
    require "PHPMailer/src/SMTP.php";
	$pageheading = 'Forgot Password';
	
	if(isset($_REQUEST['btn_submit']))
	{
		$email = $_REQUEST['txtemail'];
		
		//$email = $_SESSION['email'];
	$_SESSION['forgot'] = $email;
	unset($_SESSION['email']);
	//$cno = $_SESSION['email'];
	$otp = rand(100000,999999);
	$_SESSION['otp'] = $otp;
	
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
            <a href=' style='font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600'>Online Food</a>
          </div>
          <p style='font-size:1.1em'>Hi,</p>
          <p>Thank you for choosing Online Food. Use the following Forget Password OTP to complete your Change Password  procedures. OTP is valid for 5 minutes</p>
          <h2 style='background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;'>$otp</h2>
          <p style='font-size:0.9em;'>Regards,<br />Online Food</p>
          <hr style='border:none;border-top:1px solid #eee' />
          <div style='float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300'>
            <p>Online Food Inc</p>
           
            <p>Bardoli</p>
          </div>
        </div>
      </div>";
        $email->send();
      // header("location:verification.php");

		header("location:forgot_otp.php");	
	}
	
	
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/login_validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Jun 2021 16:12:30 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>forget password</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="admin_public/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="admin_public/assets/css/all.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="admin_public/js/main/jquery.min.js"></script>
	<script src="admin_public/js/main/bootstrap.bundle.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="admin_public/js/plugins/forms/validation/validate.min.js"></script>

	<script src="admin_public/assets/js/app.js"></script>
	<script src="admin_public/js/demo_pages/login_validation.js"></script>
	<!-- /theme JS files -->
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script type="text/javascript">
  function checkForm() 
  {
  	//alert("submit");
	// Fetching values from all input fields and storing them in variables.
	var email = document.getElementById("email1").value;
	
	
	/*var password = document.getElementById("password1").value;
	var email = document.getElementById("email1").value;
	var website = document.getElementById("website1").value;*/
	//Check input Fields Should not be blanks.
	alert("Fill All Fields");
	if (email == '') 
	{
		alert("Fill All Fields");
		return false;//
	} 
	else 
	{
		//Notifying error fields
		var email1 = document.getElementById("email");
		
		if (email1.innerHTML == 'Required'|| email1.innerHTML == 'Invalid Email') 
		{
			alert("Fill Valid Information");
			return false;
		} 
		else 
		{
			//Submit Form When All values are valid.
			document.getElementById("myForm").submit();
		}
	}
}
// AJAX code to check input field values when onblur event triggerd.
function validation(field, query) 
{
	var xmlhttp;
	if (window.XMLHttpRequest) 
	{ 
		// for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} 
	else 
	{ 
		// for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function() 
	{
		if (xmlhttp.readyState != 4 && xmlhttp.status == 200) 
		{
			document.getElementById(field).innerHTML = "Validating..";
		} 
		else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
		{
			document.getElementById(field).innerHTML = xmlhttp.responseText;
		} 
		else 
		{
			document.getElementById(field).innerHTML = "Error Occurred. <a href='index.php'>Reload Or Try Again</a> the page.";
		}
	}
	xmlhttp.open("GET", "validation.php?field=" + field + "&query=" + query, false);
	xmlhttp.send();
}
  </script>
</head>
<body class="bg-secondary">

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Inner content -->
			<div class="content-inner">

				<!-- Content area -->
				<div class="content d-flex justify-content-center align-items-center">

					<!-- Login card -->
					<form class="login-form" id="myForm" name="myForm" method="post">
						<div class="card mb-0">
							<div class="card-body">
								
								<div class="text-center mb-3">
									<i class="icon-people icon-2x text-warning border-warning border-3 rounded-pill p-3 mb-3 mt-1"></i>
									<h5 class="mb-0">Forgot Password</h5>
								</div>
								
								<div class="form-group form-group-feedback form-group-feedback-left">
									<input id="email1" class="form-control" type="text" name="txtemail" placeholder="Enter Email Id" onChange="validation('email',this.value)" required>
									
								</div>
								

								<div class="form-group">
									<div id="email">
		<button type="submit" name="btn_submit" class="btn btn-success" value="Submit">Submit</button><br><br>
		</div>
									
									
									
								</div>
							</div>
						</div>
					</form>
					<!-- /login card -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /inner content -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>

<!-- Mirrored from demo.interface.club/limitless/demo/Template/layout_1/LTR/default/full/login_validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Jun 2021 16:12:32 GMT -->
</html>
