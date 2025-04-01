<?php
  include("conection.php");
  include("session.php");
  if(isset($_REQUEST['submit']))
  {
  	$c=$_REQUEST['cid'];
    $s=$_REQUEST['sel_city'];
	$pe=$_REQUEST['pname'];
	$name1=$_FILES['image']['name'];
	$tmp1=$_FILES['image']['tmp_name'];
    $type1=$_FILES['image']['type'];
    $size1=$_FILES['image']['size'];
    $path1="image/".$name1;
	move_uploaded_file($tmp1,$path1);
	$p=$_REQUEST['price'];
  $q=$_REQUEST['quantity'];
	$dec=$_REQUEST['description'];
    $insert="insert into product_entry values (null,'$c','$s','$pe','$path1','$p','$q','$dec')";
    mysqli_query($conn,$insert);
  }
  if(isset($_REQUEST['del']))
  {
    $d=$_REQUEST['del'];
    $delete="delete from product_entry where peid='$d'";
    mysqli_query($conn,$delete);
    header("location:product_entry.php");
  }
  if(isset($_REQUEST['edit']))
  {
    $e=$_REQUEST['edit'];
    $qry="select * from product_entry where peid='$e'";
    $result=mysqli_query($conn,$qry);
    $rows=mysqli_fetch_array($result);
  }
  if(isset($_REQUEST['update']))
  {
    $u=$_REQUEST['pname'];
    $name1=$_FILES['image']['name'];
	  $tmp1=$_FILES['image']['tmp_name'];
    $type1=$_FILES['image']['type'];
    $size1=$_FILES['image']['size'];
    $path1="image/".$name1;
	  move_uploaded_file($tmp1,$path1);
	  $u1=$_REQUEST['i'];
	  $u2=$_REQUEST['price'];
    $u3=$_REQUEST['quantity'];
	  $u4=$_REQUEST['description'];
	  $e1=$_REQUEST['edit'];
    $update="update product_entry set image='$path1', price='$u2',quantity='$u3', description='$u4' where peid='$e1'";
    mysqli_query($conn,$update);
    header("location:product_entry.php");
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
            <h1>Package Entry Master</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Package</li>
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
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Package Entry</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
				          <?php 
						      if(isset($_REQUEST['edit']))
						      {
					        ?>
                  <div class="form-group">
				            <label>Package Name</label>
				            <input type="text" name="pname" class="form-control" id="exampleInputEmail1" placeholder="Enter " required pattern="[0-9 a-z A-Z]{2,}" value="<?php echo $rows['pname']?>">
				          </div>
				          <div class="form-group">
                    <label>Image</label>
                    <input type="hidden" name="i"  class="form-control" value="<?php echo $rows['image']?>">
				            <input type="file" name="image"  class="form-control" >
				            <img src="<?php echo $rows['image'] ?>" width="100px" height="100px">
				          </div>
				          <div class="form-group">
                    <label>Price</label>
				            <input type="text" name="price" class="form-control" id="exampleInputEmail1" placeholder="Enter price" required pattern="[0-9 a-z A-Z]{2,}" value="<?php echo $rows['price']?>">
				          </div>
				           <div class="form-group">
                    <label>Quantity of Images</label>
				            <input type="text" name="quantity" class="form-control" id="exampleInputEmail1" placeholder="Enter price" required  value="<?php echo $rows['quantity']?>">
				          </div> 
				          <div class="form-group">
                    <label>Description</label>
				            <input type="text" name="description" class="form-control" placeholder="Enter Description" value="<?php echo $rows['description']?>">
				          </div>
                  <!-- /.card-body -->
                  <div class="card-footer">	
                    <input type="submit" name="update" class="btn btn-info" value="Update">
                  </div>
				          <?php
					        }
					        else
					        {
				          ?>
				          <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="cid" onChange="showstate(this.value)">
                     
                      <?php
                   		$select="select * from add_category";
                   		$res=mysqli_query($conn,$select);
                   		while($row=mysqli_fetch_array($res))
                   		{
                   	  ?>
					            <option value="<?php echo $row['cid'];?>"><?php echo $row['category'];?></option>
                      <?php 
                      }
                      ?>  
                    </select>	
                  </div>
				          <div class="form-group">
                    <label>Sub Category</label>
					          <div id="city"></div>
				          </div>
				           <div class="form-group">
                    <label>Package Name</label>
				            <input type="text" name="pname" class="form-control" id="exampleInputEmail1" placeholder="Enter " required pattern="[0-9 a-z A-Z]{2,}" >
				          </div> 
				          <div class="form-group">
                    <label>Image</label>
				            <input type="file" name="image"  class="form-control">
				          </div>
				          <div class="form-group">
                    <label>Price</label>
				            <input type="text" name="price" class="form-control" id="exampleInputEmail1" placeholder="Enter price" required pattern="[0-9 a-z A-Z]{2,}">
				          </div>
                  <div class="form-group">
                    <label>Quantity of Images</label>
				            <input type="text" name="quantity" class="form-control" id="exampleInputEmail1" placeholder="Enter price" required>
				          </div> 
				          <div class="form-group">
                    <label>Description</label>
				            <textarea name="description" class="form-control" placeholder="Enter Description"></textarea>
				          </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" name="submit" class="btn btn-primary">
                </div>
				        <?php
					      }
				        ?> 
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
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
                <h3 class="card-title">Package Entry Data Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Category</th>
					          <th>Sub Category</th>
					          <th>Package Name</th>
					          <th>Image</th>
					          <th>Price</th>
                    <th>Quantity of Images</th>
					          <th>Deccription</th>
                    <th>Delete</th>
					          <th>Edit</th>
                  </tr>
                  </thead>
                  <tbody>
				            <?php
                      $select="select * from product_entry join add_category on add_category.cid = product_entry.pcid join sub_category on sub_category.sid = product_entry.pscid";
                      $res=mysqli_query($conn,$select);
                      while($row=mysqli_fetch_array($res))
                      {
                    ?>
                  <tr>
                    <td><?php echo $row['peid']  ?></td>
                    <td><?php echo $row['category'] ?></td>
					          <td><?php echo $row['subcategoryname'] ?></td>
					          <td><?php echo $row['pname'] ?></td>
					          <td><img src="<?php echo $row['image'] ?>" width="100px" height="100px"></td>
					          <td> &#8377; <?php echo $row['price'] ?></td>
                    <td><?php echo $row['quantity'] ?></td>
					          <td><?php echo $row['description'] ?></td>
                    <td><a href="product_entry.php?del=<?php echo $row['peid']?>" name="del" class="btn btn-danger" onClick="return confirm('Are you sure You want to Delete?')">Delete</a></td>
					          <td><a href="product_entry.php?edit=<?php echo $row['peid']?>" name="edit" class="btn btn-success" >Edit</a></td>
                  </tr>
				          <?php
                   }
                   ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Category</th>
					          <th>Sub Category</th>
					          <th>Property Name</th>
					          <th>Image</th>
					          <th>Price</th>
                    <th>Quantity of Images</th>
					          <th>Deccription</th>
                    <th>Delete</th>
					          <th>Edit</th>
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
