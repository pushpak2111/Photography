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
			$path="../customer/document/".$name;
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
  	include("A_css.php");
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
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <?php
        include("A_menu.php");
    ?>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Chat</li>
            </ol>
          </div>
        </div>
      </div>
	  <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div>
	    <!-- /.container-fluid -->
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
						<p class="info"><strong><img src="../customer/<?php echo $ww['message'] ?>" height="100" width="100"></strong><br><span style="font-size:9px;text-align:right;"><?php echo $ww['date']." ".$ww['time'] ?></span></p>
						</div>
						<?php
							}
							else if($ww['message_type'] == 'document')
							{
							?>
						<div class="message me"><!--<img src="../CSS/images/avatar3.png">-->
						<p class="info"><strong><a href="../customer/<?php echo $ww['message'] ?>"><?php echo $ww['message_type'] ?></a></strong><br><span style="font-size:9px;text-align:right;"><?php echo $ww['date']." ".$ww['time'] ?></span></p>
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
						<p class="info"><strong><img src="../customer/<?php echo $ww['message'] ?>" height="100" width="100"></strong><br><span style="font-size:9px;text-align:right;"><?php echo $ww['date']." ".$ww['time'] ?></span></p>
						</div>
						<?php
							}
							else if($ww['message_type'] == 'document')
							{
							?>
						<div class="message"><!--<img src="../CSS/images/avatar3.png">-->
						<p class="info"><strong><a href="../customer/<?php echo $ww['message'] ?>"><?php echo $ww['message_type'] ?></a></strong><br><span style="font-size:9px;text-align:right;"><?php echo $ww['date']." ".$ww['time'] ?></span></p>
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
            <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- footer -->
  <?php
  	include("A_footer.php");
  ?>
  <!-- /.footer -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

<?php /*?><!--<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>--><?php */?>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<?php /*?><!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script --><?php */?>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
