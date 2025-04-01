
<?php
include("conection.php");
include("session.php");
if(isset($_REQUEST['book']))
    {
        $book=$_REQUEST['book'];
        $r=0;
        $price=$_REQUEST['price'];
        $S=$_SESSION['customer'];
        $insert="insert into customer_booking values(null,'$r','$book','$price','$user','book')";
            mysqli_query($conn,$insert);
            header("location:booking.php");
    }
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
<style>
div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 203px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: 200px;
}

div.desc {
  padding: 15px;
  text-align: center;
}
</style>
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
                    <h1 class="display-4 mb-3 animated slideInDown">Booking</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        
                    </nav>
                </div>
                <div class="col-lg-6 animated fadeIn">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                        <img class="img-fluid bg-white p-3 w-100" src="image/engagement/3.jpg" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid bg-white p-3 w-100" src="image/pre wedding/6.jpg" alt="">
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
          <div class="col-sm-9
          ">
            <h1>Booking Packages</h1>
          </div>
          <div class="col-sm-2">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active"> View Detail</li>
            </ol>
          </div>
        </div>
      </div>
	  <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <?php
	 		
        $select="select * from product_entry join sub_category on sub_category.sid=product_entry.pscid join add_category on add_category.cid=sub_category.cid ";
        $res=mysqli_query($conn,$select);
        while($row=mysqli_fetch_array($res))
        {
    ?>
    <div class="gallery">
  <a target="_blank" href="../Admin/<?php echo $row['image']?>">
    <img src="../Admin/<?php echo $row['image'] ?>" alt="Cinqimageue Terre" width="600" height="400">
  </a>
  <div class="desc"><?php echo $row['category']?><br>
  <?php echo $row['subcategoryname']?><br>
  <?php echo $row ['price'] ?>Rs.<br>
  <button clsss="btn btn-primary"> <a href="book_now.php?book=<?php echo $row['peid']?>&price=<?php echo $row ['price'] ?>" >Book Now</a></button><br><br>
  <button clsss="btn btn-info"> <a href="viewdetail.php?p=<?php echo $row['peid']?>" >view detail</a></button></div>
</div>
<?php
}    
?>
 <br><br><br><br><br><br>
  <!-- /.content -->
</div>



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
