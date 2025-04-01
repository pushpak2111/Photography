<?php
	include "conection.php";
	//$pageheading = 'Forgot Password';
	
	if(isset($_SESSION['forgot']))
{
	
	$email = $_SESSION['forgot'];
	//$cno = $_SESSION['contact'];
	$otp = $_SESSION['otp'];

}
else
{
	header("location:login");
}

if(isset($_REQUEST['btn_update']))
{
	$email = $_SESSION['forgot'];
	
	$pwd = $_REQUEST['txtpwd'];
	
	$update ="update customer_reg set password='$pwd' where emailid='$email'";
	mysqli_query($conn,$update); 
	
	//$where = array('pr_email'=>$email);
	//$update = array('pr_password'=>$pwd);
	//$this->mymodel->update("patient_reg",$update,$where);
	
	//$this->session->set_userdata('patient',$email);
	unset($_SESSION['forgot']);
	unset($_SESSION['contact']);
	unset($_SESSION['otp']);
	header("location:login.php");
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
<script type="text/javascript"></script>
<script type="text/javascript">
  
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
	xmlhttp.open("GET", "validation?field=" + field + "&query=" + query, false);
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
									<h5 class="mb-0">New Password</h5>
								</div>
	
		<div class="form-group">
		<div class="col-lg-6">
		<label for="exampleInputEmail1">New Password</label>
		<input id="email1" class="form-control" style="width:200px" type="password" name="txtpwd" placeholder="Enter New password"  pattern="[A-Za-z0-9@]{7,}" required>
		</div>
		<div id="pass" style="color:#FF0000;font-size:12px;margin-top:-15px;" class="col-lg-6"></div>
		
</div>
			
		
		<div id="payment">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="review_submit" type="submit" name="btn_update" class="btn btn-success" value="Submit">Submit</button>
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
