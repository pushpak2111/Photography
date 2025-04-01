<?php
include("conection.php");
include("session.php");

  if(isset($_REQUEST['del']))
  {
    $d=$_REQUEST['del'];
    $delete="delete from customer_reg where cid='$d'";
    mysqli_query($conn,$delete);
    header("location:customerview.php");
  }

?>    
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  	include("A_css.php");
  ?>
  <script type="text/javascript">
		function showstate(str)
		{
		var abc=null;
		//alert(str);
		
		if(window.XMLHttpRequest)
		{
			abc = new XMLHttpRequest();
		}
		else if(window.ActiveXObject)
		{
			abc= new ActiveXObject("Microsoft.XMLHTTP");
		}
		abc.open('get',"ajax.php?state="+str,true);
		abc.send();
		
		
		
		abc.onreadystatechange=function()
		{
			if(abc.readyState==4)
			{
				document.getElementById("city").innerHTML=abc.responseText;
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
            <h1>Customer View</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Customer View</li>
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
	          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Customer View Data Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Crid</th>
                    <th>F Name</th>
                    <th>M Name</th>
                    <th>L Name</th>
                    <th>Gender</th>
					          <th>Adderss</th>
					          <th>Mobile No.</th>
					          <th>DOB</th>
				            <th>Email</th>
                    <th>Password</th>
					          <th>Image</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
				          <?php
                   $select="select * from customer_reg";
                   $res=mysqli_query($conn,$select);
                   while($row=mysqli_fetch_array($res))
                   {
                   ?>
                  <tr>
                    <td><?php echo $row['cid'] ?></td>
                    <td><?php echo $row['fname'] ?></td>
                    <td><?php echo $row['mname'] ?></td>
                    <td><?php echo $row['lname'] ?></td>
                    <td><?php echo $row['gender'] ?></td>
                    <td><?php echo $row['address'] ?></td>
					          <td><?php echo $row['mno'] ?></td>
					          <td><?php echo $row['dob'] ?></td>
                    <td><?php echo $row['emailid']  ?></td>
                    <td><?php echo $row['password']  ?></td>
					          <td><img src="../user/<?php echo $row['cimage'] ?>" width="100px" height="100px"></td>
                    <td><a href="customerview.php?del=<?php echo $row['cid']?>" name="del" class="btn btn-danger" onClick="return confirm('Are you sure You want to Delete?')">Delete</a></td>
                  </tr>
				          <?php
                   }
                   ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Crid</th>
                    <th>F Name</th>
                    <th>M Name</th>
                    <th>L Name</th>
                    <th>Gender</th>
					          <th>Adderss</th>
					          <th>Mobile No.</th>
					          <th>DOB</th>
				            <th>Email</th>
                    <th>Password</th>
					          <th>Image</th>
                    <th>Delete</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
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
