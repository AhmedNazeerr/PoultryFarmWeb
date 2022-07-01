<?php
session_start();
$hide=0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About us</title>
  <!-- swiper css link -->
  <!-- <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" /> -->
  <!-- swiper other link -->
  <link
  rel="stylesheet"
  href="https://unpkg.com/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
      <!-- <a href="package.html">Package</a> -->
      <a href="package.php">Package</a>
      <a href="booking.php">Booking</a>
      <?php
if(isset($_SESSION[$hide])) {?>
      <a href="account.php" >Account</a>
      <?php } ?>
      <!-- <a href="account.php">Account</a> -->

    </nav>
  </section>
  <!-- header sections ends here  -->
  <div class="heading" style="background:url(images/header-bg-1.jpg) no-repeat">
    <h1>About Us</h1>
  </div>

  <!-- about section start here -->
  <section class="about">
    <div class="image">
      <img src="images/about-img.jpg" alt="">
    </div>
    <div class="content">
      <h3>why choose us</h3>
      <p>This Site is a platform offering premium eggs , chicken and 
    information resources for the national poultry industry.</p>
      <div class="icon-container">
        <div class="icons">
          <i class="fas fa-users"></i>
          <span>Quick Delivery</span>
        </div>
        <div class="icons">
          <i class="fas fa-hand-holding-usd"></i>
          <span>Affordable Price</span>
        </div>
        <div class="icons">
          <i class="fas fa-headset"></i>
          <span>24/7</span>
        </div>
      </div>
    </div>
  </section>

  <!-- about section ends here -->

  <!-- review sections starts here-->
  <section id="testimonials">
    <!--heading--->
    <div class="testimonial-heading">
        <h1>Reviews</h1>
    </div>
    <!--testimonials-box-container------>
    <div class="testimonial-box-container">
        <!--BOX-1-------------->
        <div class="testimonial-box">
            <!--top------------------------->
            <div class="box-top">
                <!--profile----->
                <div class="profile">
                    <!--img---->
                    <div class="profile-img">
                        <img src="images/21.jpg" />
                    </div>
                    <!--name-and-username-->
                    <div class="name-user">
                        <strong>Touseeq Ijaz</strong>
                        <span>@touseeqijazweb</span>
                    </div>
                </div>
                <!--reviews------>
                <div class="reviews">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i><!--Empty star-->
                </div>
            </div>
            <!--Comments---------------------------------------->
            <div class="client-comment">
                <p>I'm really impressed with their standerd of quality and i will recommend everyone to buy chickens and eggs from here.</p>
            </div>
        </div>
        <!--BOX-2-------------->
        <div class="testimonial-box">
            <!--top------------------------->
            <div class="box-top">
                <!--profile----->
                <div class="profile">
                    <!--img---->
                    <div class="profile-img">
                        <img src="images/6.jpg" />
                    </div>
                    <!--name-and-username-->
                    <div class="name-user">
                        <strong>Awais Ashraf</strong>
                        <span>@aashraf</span>
                    </div>
                </div>
                <!--reviews------>
                <div class="reviews">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i><!--Empty star-->
                </div>
            </div>
            <!--Comments---------------------------------------->
            <div class="client-comment">
                <p>there delivery charges are null as compared to other dealers and are delivering packages before the due date really impressed!.</p>
            </div>
        </div>
        <!--BOX-3-------------->
        <div class="testimonial-box">
            <!--top------------------------->
            <div class="box-top">
                <!--profile----->
                <div class="profile">
                    <!--img---->
                    <div class="profile-img">
                        <img src="images/3.jpg" />
                    </div>
                    <!--name-and-username-->
                    <div class="name-user">
                        <strong>Amna Ijaz</strong>
                        <span>@aijaz</span>
                    </div>
                </div>
                <!--reviews------>
                <div class="reviews">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i><!--Empty star-->
                </div>
            </div>
            <!--Comments---------------------------------------->
            <div class="client-comment">
                <p>the chickens were very healthy and were in a good condition and their health was telling that they were given proper diet.</p>
            </div>
        </div>
        <!--BOX-4-------------->
        <div class="testimonial-box">
            <!--top------------------------->
            <div class="box-top">
                <!--profile----->
                <div class="profile">
                    <!--img---->
                    <div class="profile-img">
                        <img src="images/4.jpg" />
                    </div>
                    <!--name-and-username-->
                    <div class="name-user">
                        <strong>Izna Naveed</strong>
                        <span>@inza</span>
                    </div>
                </div>
                <!--reviews------>
                <div class="reviews">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i><!--Empty star-->
                </div>
            </div>
            <!--Comments---------------------------------------->
            <div class="client-comment">
                <p>the quality was fantastic and the packaging was also very good, the eggs were packed firmly hoping to order again.</p>
            </div>
        </div>
    </div>
</section>
  
  <!-- review sections end here -->


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
        <a href="#"><i class="fas fa-angle-right fa-angle-phone"></i>+92-318-7486-849</a>
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
    <div class="swiper-pagination"></div>
    </div>
    <div class="credit">created by <span>Muhammad Ahmad & Muhammad Awais</span> | All Rights Reserved! </div>
  </section>
  <!-- swiper js link -->
  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
  <!-- custom script -->
  <script src="script.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>

</html>