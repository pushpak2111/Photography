
<?php
include("conection.php");
include("session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php
  	include("css.php");
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

<body>
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->
    <?php include("menu.php");
?>

    

    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">View Booking</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        
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


    <!-- Video Modal Start -->
    <div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                            allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1>View Booking</h1>
          </div>
          <div class="col-sm-2">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active"> View Booking</li>
            </ol>
          </div>
        </div>
      </div>
	  <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    
				  
	  <div class="card">
              <div class="card-header">
                <!-- <h3 class="card-title">Product Entry Data Table</h3> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Id</th>
                    <th>Name</th>
					          <th>number</th>
					          <th>Date</th>
					          <th>Email</th>
                    <th>address</th>
                    <th>package </th>
                    <th>customer id</th>

                  </tr>
                  </thead>
                  <tbody>
                  <?php
                   
                   $select="select * from user_bookclname where customer_id='$user'";
                   $res=mysqli_query($conn,$select);
                   while($row=mysqli_fetch_array($res))
                   {
                   ?>
                  <tr>
                    <td><?php echo $row['cl_id']  ?></td>
                    <td><?php echo $row['cl_name']  ?></td>
                    <td><?php echo $row['cl_num']  ?></td>
                    <td><?php echo $row['ev_date']  ?></td>
                    <td><?php echo $row['clemail']  ?></td>
                    <td><?php echo $row['cl_address']  ?></td>
                    <td><?php echo $row['package_id']  ?></td>
                    <td><?php echo $row['customer_id']  ?></td>
                    
                  </tr>
				   <?php
                   }
                   ?>
   
                  </tbody>
                  
                </table>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
<?php
 include("footer.php")
?>


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