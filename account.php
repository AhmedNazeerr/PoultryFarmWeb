<?php
error_reporting(E_ALL ^ E_WARNING); 
session_start();
$hide=0;
$_SESSION[$hide]=0;
$_SESSION['loggedin']=false;
$_SESSION['logged']=true;
$same=false;
$null=false;
$LOG=FALSE;
$cred=false;
$admin="admin";
$adminp=1234;
  include_once 'connect.php';
if(isset($_POST['ibt']))
{
  $USERNAME1=$_POST["v"];
  $PASSWOR1=$_POST["x"];
  if($USERNAME1==NULL OR $PASSWOR1==NULL){
    $null=true;
   }
   else 
   {
     if($USERNAME1==$admin and $PASSWOR1==$adminp)
     {
      $_SESSION['loggedin']=true;
      $_SESSION['username']=$USERNAME1;
      header("location: admin.php");
     }
     else
     {
  $sql1="SELECT USERNAME from usersdata where ( USERNAME='$USERNAME1' AND PASSWOD='$PASSWOR1' ) ";
  $temp1=oci_parse($connection,$sql1);
  oci_execute($temp1);
  $ll1=oci_fetch($temp1);
  if($ll1 == 1 ){
     $LOG=true;
    $_SESSION['loggedin']=true;
    $_SESSION['username']=$USERNAME1;
    $_SESSION['logged']=false;
   $_SESSION[$hide]=1;
    header("location: booking.php");
  }
  else{
   $cred=true;
  }
   }
  }
}
  $showalert=false;
  $res=0;
  $res1=0;
  $sql=0;
if(isset($_POST["sbt"]))
{
  $USERNAME=$_POST["U"];
  $FIRSTNAME=$_POST["F"];
  $LASTNAME=$_POST["L"];
  $EMAIL=$_POST["E"];
  $PASSWORD=$_POST["P"];

  if($USERNAME==NULL OR $FIRSTNAME==NULL OR $LASTNAME==NULL OR $EMAIL==NULL OR $PASSWORD==NULL){
   $null=true;
  }
  if($USERNAME=="admin"){
    echo '
  <div class="alert alert-danger" role="alert">
   you cannot use this username
  </div>
  ';
  }
  else{
  //get username from form
  $q1="SELECT username from usersdata where USERNAME='$USERNAME'  ";
  $s1=oci_parse($connection,$q1);
  oci_execute($s1);
  $l1=oci_fetch($s1);
  if($l1 == 1)
 {
 $same=true;
 }
else 
{
  $query="INSERT INTO USERSDATA VALUES('$USERNAME','$FIRSTNAME','$LASTNAME','$EMAIL','$PASSWORD')";
  $soon=oci_parse($connection,$query);
  $res=oci_execute($soon);
  if($res!=NULL){
    $showalert=true;
    $res=0;
  }
}
  }
}

// oci_close($connection);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts</title>
    <!-- swiper css link -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <!-- linking font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- cdn.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="account.css">
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
      <!-- <a href="package.html">Package</a> -->
      <!-- <a href="booking.php">Booking</a> -->

      <a href="account.php" >Account</a>
    </nav>

  </section>

  <?php
  if($LOG){
    echo '
  <div class="alert alert-danger" role="alert">
   successfully loged in
  </div>
  ';
  }
  if($showalert){
  echo '
<div class="alert alert-danger" role="alert">
  congrats on becoming a memeber
</div>
';
}
if($null){
  echo '
<div class="alert alert-danger" role="alert">
 enteries cannot be null
</div>
';
}
if($same){
  echo '
<div class="alert alert-danger" role="alert">
 this username already exsists
</div>
';
}
if($cred){
  echo '
<div class="alert alert-danger" role="alert">
 no account with this username exsists
</div>
';
}
?>
<div class="cont">
    <div class="fcont">
  <div class="inup" id="1">
    <form action="account.php" class="in ino" method="post">
        <h2 class="title">Sign In</h2>
        <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text"  maxlength="10" placeholder="Enter UserName" name="v">
        </div>
        <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" maxlength="15" placeholder="Enter Pass" name="x">
        </div>
         <a class="ds" href="changepass.php">Change Password</a>
        <input type="submit" class="btn" value="Sign In" name="ibt">
    </form>
   </div>
<!-- this is the signup form  -->
  <div class="upin" id="2">
    <form action="account.php" class="up" method="post">
        <h2 class="title">Sign Up</h2>
        <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" maxlength="10" placeholder="Enter UserName" name="U">
        </div>
        <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" maxlength="15" placeholder="Enter FirstName" name="F">
        </div>
        <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text"  maxlength="15" placeholder="Enter LastName" name="L">
        </div>

        <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email"  maxlength="25" placeholder="Enter email" name="E">
        </div>

        <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password"  maxlength="15" placeholder="Enter Pass" name="P">
        </div>
        <input type="submit" class="btn" value="click" name="sbt">
       </form>
</div>
               </div>



  

    <div class="panel-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>New Here?</h3>
                <p>become one of us by signing up.</p>
                <button class="btn transparent" id="upbt" onclick="myFunc()" name="op" method="post">Sign Up</button>
            </div>
            <img src="images/log.png" alt="" class="image">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>One of Us?</h3>
                    <p>counitne your journey by signing in.</p>
                    <button class="btn transparent" id="inbt" onclick="myFunc1()" name="po" method="post">Sign In</button>
                </div>
                <img src="images/log1.png" alt="" class="image">
                </div>
       </div>

    </div>

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
  <script src="account.js "></script>
    </body>
    </html>

