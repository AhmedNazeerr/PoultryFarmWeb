<?php
include_once('connect.php');
$hide=1;
session_start();
$varcheck=0;
// if($_SESSION['username']=="admin"){
//     header("location: admin.php");
//   }






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- swiper css link -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <!-- linking font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- custom css file -->
    <link rel="stylesheet" href="style.css">
    <!-- linking favicon -->
    <link rel="shortcut icon" type="image/png" href="images/mainicon.png">
</head>
<body>
 

  <section class="header">
      <a href="home.php" class="logo"><img src="images/homelogo.png" alt=""></a>
      <nav class="navbar">
      <a href="home.php">Home</a>
      <a href="about.php">About</a>
      <a href="package.php">Package</a>
      <!-- <a href="account.php">Account</a> -->
      <!-- <a href="package.html">Package</a> -->
      <a href="booking.php">Booking</a>


    </nav>


  </section>
    
<!-- header ends here -->

<!-- home section start -->
<section class="home">
    <div class="swiper home-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide" style="background:url(images/home-slide-1.jpg) no-repeat">
                <div class="content">
                   <!-- <span>explore, discover ,purchase </span> -->
                   <h3>grow your farm</h3>
                   <!-- <a href="package.html" class="btn">Discover More</a> -->
                </div>
            </div>

            <div class="swiper-slide slide" style="background:url(images/home-slide-2.jpg) no-repeat">
                <div class="content">
                   <!-- <span>explore, discover ,purchase </span> -->
                   <h3>increase your production</h3>
                   <!-- <a href="package.html" class="btn">Discover More</a> -->
                </div>
            </div>

            <div class="swiper-slide slide" style="background:url(images/home-slide-3.jpg) no-repeat">
                <div class="content">
                   <!-- <span>explore, discover ,purchase </span> -->
                   <h3>Buy New Varieties</h3>
                   <!-- <a href="package.html" class="btn">Discover More</a> -->
                </div>
            </div>
        </div>
        <!-- <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div> -->
        <div class="swiper-pagination"></div>
    </div>
</section>
<!-- home section end  -->

<!-- emoji section  -->
<div id="emoji" class="Collapse">
    <div class="own">
            <img class="gif" src="images/chicken.gif" alt="">
     </div>
</div>



<!-- emoji section ends here -->

<!-- service section start -->
<section class="services">
    <h1 class="heading-title">our services</h1>

    <div class="box-container">
       
 <a href="booking.php"><div class="box">
    
    <img src="images/icon-1.png" alt="">
    <h3>Chickens</h3>
</div></a>

<a href="booking.php"><div class="box">
    
    <img src="images/icon-2.png" alt="">
    <h3>Eggs</h3>
</div></a>
    <a href="booking.php"><div class="box">
    
        <img src="images/icon-3.png" alt="">
        <h3>Feed</h3>
    </div></a>
    
        </div>
</section>
<!-- service section end -->


<!-- home about section  -->

<section class="new-home-about">
    <div class="ima">
        <a href="about.php"><img src="images/about-img.jpg" alt="" ></a>
    </div>
    <div class="content">
     <h3>About Us</h3>
    <p>We have been delivering Chickens and Eggs to poultry farmers nationally for many decades. Producers in punjab, sindh and etc are naturally facing many challenges in producing them So we are here to supply handsome amount of Chickens and eggs to you so you can grow your business more.</p>
   <a href="about.php" class="btn">Read More</a>
    </div>
</section>

<!-- home about section ends here  -->


<!-- homr packages section start here  -->



<section class="n-home-packages">

    <h1 class="heading-title">Our Packages</h1>

    <div class="box-container">
        <div class="box">
            <div class="image">
            <img src="images/img-1.jpg" alt="">
        </div>
        <div class="content">
            <h3>BRONZE</h3>
            <p>Egg &#8594; 2000 Chickens &#8594; 500</p>
            <!-- <p class="co">Price: 20,000/-RS</p> -->
            <form  action="booking.php" method="post" >
            <button type="submit" class="btn" method="post" name="bb">Book Now<button>
            <form>
        </div>
        </div>

        <div class="box">
            <div class="image">
            <img src="images/img-2.jpg" alt="">
        </div>
        <div class="content">
            <h3>SILVER</h3>
            <p>Egg &#8594;2000 Chickens &#8594; 1000</p>
            <!-- <p class="co">Price: 30,000/-RS</p> -->
            <a href="booking.php" class="btn">Book Now</a>
        </div>
        </div>

        <div class="box">
            <div class="image">
            <img src="images/img-3.jpg" alt="">
        </div>
        <div class="content">
            <h3>GOLD</h3>
            <p>Egg &#8594; 2500 Chickens &#8594; 1500</p>
            <!-- <p class="co">Price: 40,000/-RS</p> -->
            <a href="booking.php" class="btn">Book Now</a>
        </div>
        </div>
<?php

?>
        
        
    </div>
    <!-- <div class="load-more"><a href="package.html" class="btn">Load More</a></div> -->
</section>



<!-- home packages section ends here -->

<!-- Home Offer Section -->

<section class="home-offer">
    <div class="content">
        <h3>Upto 10% off</h3>
        <p>You can avail discount on eggs and chicken by using Packages</p>
        <a href="booking.php" class="btn">Book Now</a>
    </div>
</section>

<!-- home offer section ends here -->



  <!-- footer -->
  <section class="footer">
      <div class="box-container">
          <div class="box">
              <h3>Quick Links</h3>
            <a href="home.php"> <i class="fas fa-angle-right"></i> Home</a>
            <a href="about.php"> <i class="fas fa-angle-right"></i> About</a>
            <a href="account.php"> <i class="fas fa-angle-right"></i> Accounts</a>
            <a href="booking.php"> <i class="fas fa-angle-right"></i> Booking</a>
          </div>

          <div class="box">
            <h3>Extra Links</h3>
          <a href="#"> <i class="fas fa-angle-right"></i>Ask Questions</a>
          <a href="#"> <i class="fas fa-angle-right"></i>About Us</a>
          <a href="#"> <i class="fas fa-angle-right"></i>Privacy Policy</a>
          <a href="#"> <i class="fas fa-angle-right"></i>Terms of Use</a>
        </div>
        <div class="box">
        <h3>Contact Info</h3>
        <a href="#"><i class="fas fa-angle-right fa-angle-phone" ></i>+92-318-7486-849</a>
        <a href="#"><i class="fas fa-angle-right fa-angle-phone"></i>+92-304-6628-824</a>
        <a href="#"><i class="fas fa-angle-right fa-angle-envelope"></i>f200282@cfd.nu.edu.pk</a>
        <a href="#"><i class="fas fa-angle-right fa-angle-maps"></i> punjab, pakistan </a>
        </div>
        <div class="box">
            <h3>Follow Us</h3>
            <a href="#"> <i class="fab fa-facebook-f"></i>Facebook</a>
            <a href="#"> <i class="fab fa-twitter"></i>Twitter</a>
            <a href="#"> <i class="fab fa-instagram"></i>Instagram</a>
            <a href="#"> <i class="fab fa-linkedin"></i>linkedin</a>
  
        </div>
      </div>
      </div>
      <div class="credit">created by <span>Muhammad Ahmad & Muhammad Awais</span> | All Rights Reserved! </div>
  </section>
    <!-- swiper js link -->
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <!-- custom script -->
    <script src="script.js"></script>




</body>
</html>