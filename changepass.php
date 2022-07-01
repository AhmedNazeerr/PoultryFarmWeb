<?php
include_once('connect.php');
session_start();
if($_SESSION['logged']!=true){
  header("location: booking.php");
  exit;
}
if($_SESSION['username']=="admin"){
  header("location: admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <!-- swiper css link -->
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <!-- linking font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- custom css file -->
    <link rel="stylesheet" href="book.css">
   <link rel="stylesheet" href="changepass.css">
       <!-- linking favicon -->
       <link rel="shortcut icon" type="image/png" href="images/mainicon.png">
</head>
<body>
  <section class="header">
    <a href="home.php" class="logo"><img src="images/homelogo.png" alt=""></a>
      <nav class="navbar">
      <a href="account.php">Back</a>
      <!-- <a href="account.php">Account</a> -->
    </nav>


  </section>
  <?php
 function writeMsg() {
    echo '
    <div class="alert alert-danger" role="alert">
     enteries cannot be null
    </div>
    ';
}
function writeMsg1() {
    echo '
    <section>
    <div class="alert alert-danger" role="alert">
     no account with this username exsists
    </div>
    </section>';
     } 
     function writeMsg2() {
      echo '
      <section>
      <div class="alert alert-danger" role="alert">
old password is incorecct
      </div>
      </section>';
      } 
  function writeMsg3() {
    echo '
    <section>
    <div class="alert alert-danger" role="alert">
password updated successfully
    </div>
    </section>
    ';
}         
if(isset($_POST['c']))
{
    $UNAME=$_POST['h1'];
    $OLDP=$_POST['h2'];
    $NEWP=$_POST['h3'];
    if($UNAME == NULL OR $OLDP == NULL OR $NEWP == NULL){
       writeMsg();
    }
    else{
     $q1="SELECT username from usersdata where USERNAME='$UNAME'  ";
     $s1=oci_parse($connection,$q1);
     oci_execute($s1);
     $l1=oci_fetch($s1);
     if($l1 == 1)
    {
     $q11="SELECT passwod from usersdata where username='$UNAME' ";
     $s11=oci_parse($connection,$q11);
     oci_execute($s11);
     $row = oci_fetch_assoc($s11);
     $var=$row['PASSWOD'];
     if($var==$OLDP){
        $q2="UPDATE usersdata SET  passwod = '$NEWP' WHERE username = '$UNAME' ";
        $s112=oci_parse($connection,$q2);
        oci_execute($s112);
        writeMsg3();
     }
     else{
        writeMsg2();
       }

    }
    else{
     writeMsg1();
    }
    }
 }
?>
<!-- header sections ends here  -->
<!-- booking section start here  -->
<div class="cont">
  <div class="fcont">
<div class="inup" id="1">
<div class="resize">
  <form action="changepass.php" class="in" method="post">
      <h2 class="title">Change Password</h2>
      <div class="input-field">
        <i class="fas fa-users"></i>
        <input type="text" placeholder="Enter username" name="h1">
    </div>
    <div class="input-field">
      <i class="fas fa-mobile""></i>
      <input type="text" placeholder="Enter old Password" name="h2">
  </div>
  <div class="input-field">
    <i class="fas fa-lock"></i>
    <input type="text" placeholder="Enter new Password" name="h3">
  </div>
      <input type="submit" class="btn" value="Change" name="c">
    </div>
</form>
</div>
 <div class="panel-container">
  <div class="panel left-panel">
      <div class="content">
          <h3>Change Password</h3>
          <p>to keep your account protected.</p>
      </div>
      <img src="images/booknow.png" alt="" class="image">
      </div>
    </div>

</div>
</div>
<!-- booking section ends here -->

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