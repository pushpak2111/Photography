<nav class="navbar navbar-expand-lg bg-white navbar-light fixed-top shadow py-lg-0 px-4 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.php" class="navbar-brand d-block d-lg-none">
            <h1 class="text-primary">Avinu Films</h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between py-4 py-lg-0" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="profile.php" class="nav-item nav-link">profile</a>
                <a href="about.php" class="nav-item nav-link">About</a>
                <a href="message.php" class="nav-item nav-link">Chat</a>
            </div>
            <a href="index.php" class="navbar-brand bg-primary py-2 px-4 mx-3 d-none d-lg-block">
                <h1 class="text-white">Avinu Films</h1>
            </a>
            <div class="navbar-nav me-auto py-0">
                <a href="project.php" class="nav-item nav-link">Projects</a>
                <a href="booking.php" class="nav-item nav-link">Booking</a>
                <a href="viewbooking.php" class="nav-item nav-link">My Book</a>
            <div>
            <div class="navbar-nav me-auto py-0">
                <a href="logout.php"> <b style="color:green"> <?php echo $fname;?> <?php echo $mname;?> <?php echo $lname;?></b> <b style="color:red">Logout</b></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->