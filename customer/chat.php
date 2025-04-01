<?php
include("conection.php");
date_default_timezone_set('Asia/Kolkata');
include("session.php");
$sender = $com_code;
	if(isset($_REQUEST['code']))
	{
		$mcode = $_REQUEST['code'];
		$_SESSION['receive'] = $mcode;
		$update = "update `$sender` set status = 'view' where status = 'send' AND sender = '$sender' AND receiver = '$mcode'";
		mysqli_query($conn,$update);
		
		$update1 = "update `$mcode` set status = 'view' where status = 'send' AND sender = '$sender' AND receiver = '$mcode'";
		mysqli_query($conn,$update1);
		header("location:chat.php");
	}
	
	$receiver = $_SESSION['receive'];
	if(isset($_REQUEST['btn_submit']))
	{
		$receiver = $_SESSION['receive'];
		$msgtyp = $_REQUEST['msgtype'];
		$dt = date('d-m-Y');
		$tm = date('h:i A');
		$status = 'send';
		
		if($msgtyp == 'image' || $msgtyp == 'document')
		{
			$name=$_FILES['userfile']['name'];
			$tmp=$_FILES['userfile']['tmp_name'];
			$type=$_FILES['userfile']['type'];
			$size=$_FILES['userfile']['size'];
			$path="document/".$name;
			move_uploaded_file($tmp,$path);
			/*$path1="document/".$name;
			move_uploaded_file($tmp,$path1);*/

		}
		else
		{
			$path = $_REQUEST['txt_msg'];
		}
		
		$insert = "insert into `$sender` values('','$sender','$receiver','$dt','$tm','$msgtyp','$path','$status')";
		mysqli_query($conn,$insert);
		
		$insert1 = "insert into `$receiver` values('','$sender','$receiver','$dt','$tm','$msgtyp','$path','$status')";
		mysqli_query($conn,$insert1);
		header("location:chat.php");
		}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("css.php");
    ?>
    <style>
   .messanger{display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column}.messanger .messages{-ms-flex:1;flex:1;margin:15px 0;padding:0 10px;max-height:350px;overflow-y:auto;overflow-x:hidden}.messanger .messages .message{display:-ms-flexbox;display:flex;margin-bottom:15px;-ms-flex-align:start;align-items:flex-start}.messanger .messages .message.me{-ms-flex-direction:row-reverse;flex-direction:row-reverse}.messanger .messages .message.me img{margin-right:0;margin-left:15px}.messanger .messages .message.me .info{background-color:#673AB7;color:#fff}.messanger .messages .message.me .info:before{display:none}.messanger .messages .message.me .info:after{position:absolute;right:-13px;top:0;content:'';width:0;height:0;border-style:solid;border-width:0 16px 16px 0;border-color:transparent #673AB7 transparent transparent;-webkit-transform:rotate(270deg);-ms-transform:rotate(270deg);transform:rotate(270deg)}.messanger .messages .message img{border-radius:50%;margin-right:15px}.messanger .messages .message .info{margin:0;background-color:#ddd;padding:5px 10px;border-radius:3px;position:relative;-ms-flex-item-align:start;align-self:flex-start}.messanger .messages .message .info:before{position:absolute;left:-14px;top:0;content:'';width:0;height:0;border-style:solid;border-width:0 16px 16px 0;border-color:transparent #ddd transparent transparent}.messanger .sender{display:-ms-flexbox;display:flex}.messanger .sender input[type="text"]{-ms-flex:1;flex:1;border:1px solid #673AB7;outline:none;padding:5px 5px}.messanger .sender button{border-radius:0}
   </style>
   <script type="text/javascript">
		function showtype(str)
		{
		var xyz=null;
		//alert(str);
		
		if(window.XMLHttpRequest)
		{
			xyz = new XMLHttpRequest();
		}
		else if(window.ActiveXObject)
		{
			xyz= new ActiveXObject("Microsoft.XMLHTTP");
		}
		xyz.open('get',"ajax2.php?type="+str,true);
		xyz.send();
		
		xyz.onreadystatechange=function()
		{
			if(xyz.readyState==4)
			{
				document.getElementById("type").innerHTML=xyz.responseText;
			}
		}
		
	
	}
	</script>
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
                    <h1 class="display-4 mb-3 animated slideInDown">Chat</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Chat</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 animated fadeIn">
                    <div class="row g-3">
                        <div class="col-6 text-end">
						<img class="img-fluid bg-white p-3 w-100" src="image/engagement/4.jpg" alt="">
                            <img class="img-fluid bg-white p-3 w-100" src="image/post wedding/8 .jpg" alt="">
                        </div>
                        <div class="col-6">
						<img class="img-fluid bg-white p-3 w-100" src="image/engagement/2.jpg" alt="">
                            <img class="img-fluid bg-white p-3 w-100" src="image/pre wedding/1.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                
              <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Chat - <strong style="text-transform:uppercase;"><?php echo $_SESSION['receive'] ?></strong></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
                      <!--<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#"><i class="fa fa-font pull-right"></i>Text</a>
                          </li>
                          <li><a href="#" ><i class="fa fa-file-image-o pull-right"></i>Image </a>
                          </li>
						  <li><a href="#" ><i class="fa fa-book pull-right"></i>Document </a>
                          </li>
                        </ul>
                      </li>-->
					  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
				  	<div class="col-md-12 col-sm-12 col-xs-12">
				  	
                      <!-- Content Start -->
					 
			<center>		  
		<div class="col-md-5">
            <div class="card">
              
              <div class="messanger">
                <div class="messages">
					<?php
					$ss = "select * from `$sender`";
					$rr = mysqli_query($conn,$ss);
					while($ww = mysqli_fetch_array($rr))
					{
						if($ww['sender'] == $sender && $ww['receiver'] == $receiver)
						{
							if($ww['message_type'] == 'image')
							{
							?>
						<div class="message me"><!--<img src="../CSS/images/avatar3.png">-->
						<p class="info"><strong><img src="<?php echo $ww['message'] ?>" height="100" width="100"></strong><br><span style="font-size:9px;text-align:right;"><?php echo $ww['date']." ".$ww['time'] ?></span></p>
						</div>
						<?php
							}
							else if($ww['message_type'] == 'document')
							{
							?>
						<div class="message me"><!--<img src="../CSS/images/avatar3.png">-->
						<p class="info"><strong><a href="<?php echo $ww['message'] ?>"><?php echo $ww['message_type'] ?></a></strong><br><span style="font-size:9px;text-align:right;"><?php echo $ww['date']." ".$ww['time'] ?></span></p>
						</div>
						<?php
							}
							else
							{
							?>
							<div class="message me"><!--<img src="../CSS/images/avatar3.png">-->
							<p class="info"><strong><?php echo $ww['message'] ?></strong><br><span style="font-size:9px;text-align:right;"><?php echo $ww['date']." ".$ww['time'] ?></span></p>
							</div>
							<?php
							}
						}
						
						if($ww['sender'] == $receiver &&$ww['receiver'] == $sender )
						{
							if($ww['message_type'] == 'image')
							{
							?>
						<div class="message"><!--<img src="../CSS/images/avatar3.png">-->
						<p class="info"><strong><img src="<?php echo $ww['message'] ?>" height="100" width="100"></strong><br><span style="font-size:9px;text-align:right;"><?php echo $ww['date']." ".$ww['time'] ?></span></p>
						</div>
						<?php
							}
							else if($ww['message_type'] == 'document')
							{
							?>
						<div class="message"><!--<img src="../CSS/images/avatar3.png">-->
						<p class="info"><strong><a href="<?php echo $ww['message'] ?>"><?php echo $ww['message_type'] ?></a></strong><br><span style="font-size:9px;text-align:right;"><?php echo $ww['date']." ".$ww['time'] ?></span></p>
						</div>
						<?php
							}
							else
							{
							?>
							<div class="message"><!--<img src="../CSS/images/avatar3.png">-->
							<p class="info"><strong><?php echo $ww['message'] ?></strong><br><span style="font-size:9px;text-align:right;"><?php echo $ww['date']." ".$ww['time'] ?></span></p>
							</div>
							<?php
							}
						}	
				  }
				  ?>
				  <div class="sender">
				<form method="post" enctype ="multipart/form-data">
					<!--<input type="radio" name="txt_msgtype" value="text" checked="checked" autofocus required>Text &nbsp;&nbsp;&nbsp;
					<input type="radio" name="txt_msgtype" value="image" autofocus required>Image &nbsp;&nbsp;&nbsp;
					<input type="radio" name="txt_msgtype" value="document" autofocus required>Document <br/>-->
                <div class="col-md-6 col-sm-6 col-xs-6">	
				 <select name="msgtype" class="form-control" onChange="showtype(this.value)">
						  	<option>-- Select Filed --</option>
							<option selected="selected" value="text"> Text </option>
							<option value="image"> Image </option>
							<option value="document"> Document </option>
				</select>
				</div><br>
				<div class="col-md-9 col-sm-9 col-xs-9">
					<div id="type">
					<input type="text" name="txt_msg" placeholder="Send Message" class="form-control" autofocus required>
					</div>
				</div><br>
				<div class="col-md-3 col-sm-2 col-xs-2">
                  <button type="submit" name="btn_submit" class="btn btn-success"> Submit    </button> 
				</div>
				  
				  </form>
				  <br>
                </div>
                </div>
                </center>
              </div>
            </div>
          </div>
					  <!-- Content END -->
					
					</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
	
    <br><br>
            <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>

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