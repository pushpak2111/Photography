<?php
  include("conection.php");
  include("session.php");
  if(isset($_REQUEST['btn_submit']))
  {
    $a=$_REQUEST['category'];
    $b=$_REQUEST['subcategoryname'];
    $insert="insert into sub_category value(null,'$a','$b')";
    mysqli_query($conn,$insert);
  }
  if(isset($_REQUEST['del']))
  {
    $d=$_REQUEST['del'];
    $delete="delete from sub_category where sid='$d'";
    mysqli_query($conn,$delete);
    header("location:sub_category.php");
  }
  if(isset($_REQUEST['edit']))
  {
  $d1=$_REQUEST['edit'];
  $select="select * from sub_category where sid='$d1'";
  $res1=mysqli_query($conn,$select);
  $row1=($row=mysqli_fetch_array($res1));
  }
  if(isset($_REQUEST['btn_update']))
  {
    $a1=$_REQUEST['subcategoryname'];
    $d2=$_REQUEST['edit'];
    $update="update sub_category set subcategoryname='$a1' where sid='$d2'";
    mysqli_query($conn,$update);
    header("location:sub_category.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include("A_css.php");
    ?>
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
            <h1>Sub Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Sub Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
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
                <h3 class="card-title">Sub Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="post">
                <div class="card-body">
                  <div class="form-group">
                    

                    <?php
                  if(isset($_REQUEST['edit']))
                  {
                  ?>
                  <label for="exampleInputEmail1"> add Sub Category</label>
                <input type="text" name="subcategoryname" class="form-control" id="category" placeholder="Enter Category" 
                    required pattern="[A-Z a-z]{2,}" title="Plase Enter 2 Alphabet"  value="<?php echo $row['subcategoryname'] ?>">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" name="btn_update" class="btn btn-info" value="update" >
                </div>
                <?php
                }
                else
                {
                ?>
                <label for="exampleInputEmail1"> Category</label>
                    <select name="category" class="form-control" id="category" placeholder="Enter Category">
                    <?php
                   $select="select * from add_category";
                   $res=mysqli_query($conn,$select);
                   while($row=mysqli_fetch_array($res))
                   {
                   ?>
                   <option value="<?php echo $row['cid']?>"><?php echo $row['category']?></option> 
                   <?php
                   }
                   ?>
                   </select>
                   <label for="exampleInputEmail1"> add Sub Category</label>
                <input type="text" name="subcategoryname" class="form-control" id="category" placeholder="Enter Category" 
                    required pattern="[A-Z a-z]{2,}" title="Plase Enter 2 Alphabet" >
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" name="btn_submit" class="btn btn-primary" >
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
      </div><!-- /.container-fluid -->

      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Category Data Fetch</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sid</th>
                    <th>Cid</th>
                    <th>Subcategoryname</th>
                    <th>Delete</th>
                    <th>Edit</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php
                    $select="select * from sub_category join add_category on add_category.cid=sub_category.cid";
                    $res=mysqli_query($conn,$select);
                    while($row=mysqli_fetch_array($res))
                    {
                    ?>
                    <tr>
                    <td><?php echo $row['sid'] ?></td>
                    <td><?php echo $row['category'] ?></td>
                    <td><?php echo $row['subcategoryname'] ?></td>
                    <td><a href="sub_category.php?del=<?php echo $row['sid']?>" name="del" class="btn btn-danger" onClick="return confirm('Are you sure Delete?')">Delete</a></td>
                    <td><a href="sub_category.php?edit=<?php echo $row['sid']?>"  class="btn btn-success">Edit</a></td>
                   </tr> 
                   <?php
                   }
                   ?>
                  
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Sid</th>
                    <th>Cid</th>
                    <th>Subcategoryname</th>
                    <th>Delete</th>
                    <th>Edit</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <?php 
        include("A_footer.php");
    ?>
  </footer>

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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
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
