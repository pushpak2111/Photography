<?php
include("conection.php");
include("session.php");?>
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
    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">Profile</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 animated fadeIn">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid bg-white p-3 w-100 mb-3" src="image/wedding/1.jpg" alt="">
                            <img class="img-fluid bg-white p-3 w-50" src="img/hero-3.jpg" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid bg-white p-3 w-50 mb-3" src="img/hero-4.jpg" alt="">
                            <img class="img-fluid bg-white p-3 w-100" src="img/hero-2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Profile View Data Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Crid</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
					<th>Adderss</th>
					<th>Mobile No.</th>
					<th>DOB</th>
				    <th>Email</th>
                    <th>Password</th>
					<th>Image</th>
					<th>Edit</th>
                  </tr>
                  </thead>
                  <tbody>
				  <?php
				  
                   $select="select * from customer_reg where emailid='$user' ";
                   $res=mysqli_query($conn,$select);
                   while($row=mysqli_fetch_array($res))
                   {
                   ?>
                  <tr>
                    <td><?php echo $row['cid']  ?></td>
                    <td><?php echo $row['fname']  ?></td>
                    <td><?php echo $row['mname']  ?></td>
                    <td><?php echo $row['lname']  ?></td>
                    <td><?php echo $row['gender']  ?></td>
                    <td><?php echo $row['address'] ?></td>
					<td><?php echo $row['mno'] ?></td>
					<td><?php echo $row['dob'] ?></td>
                    <td><?php echo $row['emailid']  ?></td>
                    <td><?php echo $row['password']  ?></td>
					<td><img src="../user/<?php echo $row['cimage'] ?>" width="100px" height="100px"></td>
					<td><a href="customer_update.php?edit=<?php echo $row['cid']?>" name="edit" class="btn btn-success" >Edit</a></td>
                  </tr>
				   <?php
                   }
                   ?>
                  </tbody>
                  <tfoot>
                  
                  </tfoot>
                </table>
              </div><center>
              <a href="change_pass.php" class="btn btn-warning">**Change Password**</a></center>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>

    <!-- Footer Start -->
   
<?php
include("footer.php");
?>
 <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid bg-dark text-white border-top border-secondary px-0">
        <div class="d-flex flex-column flex-md-row justify-content-between">
            <div class="py-4 px-5 text-center text-md-start">
                <p class="mb-0">&copy; <a class="text-primary" href="#">Avinu Films</a>. All Rights Reserved.</p>
            </div>
            <div class="py-4 px-5 bg-secondary footer-shape position-relative text-center text-md-end">
                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                <p class="mb-0">Designed by <a class="text-primary fw-bold" href="https://htmlcodex.com">Pushpak Patel</a></p> <a href="https://themewagon.com" target="_blank" ></a>
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