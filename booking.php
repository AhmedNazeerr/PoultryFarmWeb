<?php
error_reporting(E_ALL ^ E_WARNING); 
include_once('connect.php');
// $varcheck=0;
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: account.php");
  exit;
}
$hide=0;
if($_SESSION['username']=="admin"){
  header("location: admin.php");
}
// $varcheck=0;
if(isset($_POST['lout'])){
  $_SESSION[$hide]=0;
  // $_SESSION['acc']=false;
  session_unset();
  session_destroy();
  header("location: account.php");
  exit;
}
function writeMsg() {
  echo '
  <span class="alert alert-danger" role="alert">
   enteries cannot be null
  </span>
  ';
}
function writeMsg01() {
  echo '
  <span class="alert alert-danger" role="alert">
  eggs and chickens cannot be zero
  </span>
  ';
}
function writeMsg31() {
  echo '
  <span class="alert alert-danger" role="alert">
 city doent exsist 
  </span>
  ';
} 
function writeMsg41() {
  echo '
  <span class="alert alert-danger" role="alert">
invalid input
  </span>
  ';
} 
function ext() {
  echo '
  <span class="alert alert-danger" role="alert">
try entering a different order key
  </span>
  ';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['username']?></title>
    <!-- swiper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <!-- linking font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- custom css file -->
    <link rel="stylesheet" href="book.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
       <!-- linking favicon -->
       <link rel="shortcut icon" type="image/png" href="images/mainicon.png">
       <script type="text/javascript"src="jquery-3.6.0.min.js"></script>
       <script type="text/javascript"></script>
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
  <!-- </form> -->
  <div class="pto">
    <form action="booking.php" method="post" class="aasx" >
      <input type="submit" class="btn asx" value="fetch Order" method="post" name="por">
    </form>
  <table class="styled-table" >
<thead>
<tr>
<th>User Name</th>
<th>Order No</th>
<th>Branch No</th>
<th>Eggs</th>
<th>Chickens</th>
<th>Price</th>
</tr>
</thead>
<tbody>
  <tr>
  </tr>
</tbody>
  <!-- and so on... -->
<?php
include_once('connect.php');
if(isset($_POST['por']) or isset($_POST['order'])){
$tempuname=$_SESSION['username'];
$query444q="SELECT USERNAME,ORDERNO,BRANCHNO,EGG,CHICKEN,PRICE from BOOKING WHERE USERNAME='$tempuname' ";
$temp1444q=oci_parse($connection,$query444q);
oci_execute($temp1444q);
while (( $row24q = oci_fetch_assoc($temp1444q) ) != false) 
{
echo "
<tbody>
<tr>
<td >" . $row24q['USERNAME'] ."</td> 
<td >" . $row24q['ORDERNO'] ."</td> 
<td >" . $row24q['BRANCHNO'] ."</td> 
<td >" . $row24q['EGG'] ."</td> 
<td >" . $row24q['CHICKEN'] ."</td> 
<td >" . $row24q['PRICE'] ."</td> 
</tr>
</tbody>";
}
}
?>
</table>
  </div>
  <form   action="booking.php" method="post" class="noo">
  <input class="btn no" type="submit" value="logout" name="lout">
</form>
    <!-- header sections ends here  -->
<!-- booking section start here  -->
<div class="cont">
    <!-- class="panel-container"
    class="panel left-panel" -->
  <div class="div1">

      <!-- <div class="content">
          <h3>Book Now</h3>
          <p>Book eggs and chickens now.</p>
      </div>
      <img src="images/booknow.png" alt="" class="image"> -->
<form action="booking.php" class="p1" method="post">
<div class="input-field p11">
            <i class="fas fa-user"></i>
            <input type="text" id="ttext" maxlength="15" placeholder="Enter city name" name="ci">
        </div>
        <!-- onclick="myFunction()" -->
        <button type="submit"  class="btn d"  method="post"   name="vi" id="vi" >View Branches</button>
</form>
<table class="styled-table" id="1">
    <thead>
    <tr>
<th>Branch No</th>
<th>Branch Name</th>
<th>Branch address</th>

</tr>
</thead>
<tbody>
        <tr>
        <!-- <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th> -->
        </tr>
</tbody>
        <!-- and so on... -->
<?php
  include_once('connect.php');
  if(isset($_POST['vi'])){
    $city1=$_POST['ci'];
    if($city1 == NULL){
      // writeMsg();
    }
    else{
      $sql31="SELECT NAME from CITYNAMES where  NAME='$city1' ";
  $temp31=oci_parse($connection,$sql31);
  oci_execute($temp31);
  $ll31=oci_fetch($temp31);
  if($ll31 == 1 ){
  $query44="SELECT BRACHNO,BRACHNAME,BRANCHADDRESS FROM $city1";
  $temp144=oci_parse($connection,$query44);
  oci_execute($temp144);
 while (( $row2 = oci_fetch_assoc($temp144) ) != false) 
 {
    echo "
    <tbody>
    <tr>
    <td >" . $row2['BRACHNO'] ."</td> 
    <td>" . $row2['BRACHNAME'] ."</td> 
    <td>" . $row2['BRANCHADDRESS'] ."</td>
    </tr>
    </tbody>";
}
  }
  else{
// writeMsg31();
  }
}
  }
  
?>
</table>
    </div>
    <div class="fcont">
<div class="inup" id="1">
  <form action="booking.php" class="in" method="post">
      <h2 class="title">BOOK NOW</h2>
      <select id="select" class="select v1" name="city" onchange="ddlselect()">
  <option value="" disabled selected>Select City</option>
<?php
include_once('connect.php');
$queryk="SELECT NAME FROM CITYNAMES";
$do=oci_parse($connection,$queryk);
oci_execute($do);
while (($rowval = oci_fetch_assoc($do)) != false) 
{
echo" <option value=".$rowval['NAME'].">".$rowval['NAME']."</option>";
// echo "<option value='$tempp'>$tempp</option>";
}
?>
</select>
<div class="input-field">
      <i class="fas fa-phone""></i>
      <input type="text"  maxlength="5" placeholder="Enter Branch No" name="i1">
  </div>
      <div class="input-field">
        <i class="fas fa-address-book"></i>
        <input type="text"  maxlength="40"placeholder="Enter permanent-address" name="i2">
    </div>
  
  <div class="radio-container">
      <input type="radio" id="windows" name="os" value="on" onclick="text(1)" checked >
      <label for="windows">Packages</label>

      <input type="radio" id="mac" name="os"  value="of" onclick="text(0)">
      <label for="mac">Custom</label>
    </div>

    <select id="mycode" class="select" name="ecp">
  <option value="" disabled selected>package : eggs : chickens</option>
<?php
include_once('connect.php');
$queryk="SELECT NAME,EGG,CHICKEN FROM PACKAGES";
$do=oci_parse($connection,$queryk);
oci_execute($do);
while (($rowval = oci_fetch_assoc($do)) != false) 
{
echo" <option value=".$rowval['NAME'].">".$rowval['NAME']." : ".$rowval['EGG']." : ".$rowval['CHICKEN']."</option>";
// echo "<option value='$tempp'>$tempp</option>";
}
?>
</select>
  <div class="input-field" id="mycode1">
    <!-- <i class=""></i> -->
    <input type="number"   placeholder="total no of eggs" class="dmn" name="i4" maxlength="6" max="999999">
  </div>
  <div class="input-field" id="mycode2">
    <!-- <i class=""></i> -->
    <input type="number"   placeholder="total no of chickens" class="dmn" name="i5" maxlength="6" max="99999">
  </div>
  
      <input type="submit" class="btn nb" value="order" name="order" method="post">
 </div>
</form>
</div>
</div>


<?php
include_once("connect.php");
  $chr="SELECT orderno FROM BOOKING WHERE ORDERNO=(SELECT max(ORDERNO) FROM BOOKING)";
  $ch1=oci_parse($connection,$chr);
  oci_execute($ch1);
  $xz = oci_fetch_assoc($ch1);
  $num=$xz['ORDERNO'];
  if($num<=0){
    $num=1;
    $v9=$num;
  }
  else{
    $num=$num+1;
    $v9=$num;
  }
if(isset($_POST['order'])){
  $vb1=$_POST['i1'];
  $v2=$_POST['i2'];
  $v4=$_POST['i4'];
  $v5=$_POST['i5'];
  $vo4=$_POST['os'];
  $vname=$_SESSION['username'];
  $varr=$_POST['city'];
  if($vb1==NULL or $v2==NULL ){
      writeMsg();
  }
  else{
  if($vb1<=0){
    writeMsg41();
  }
  else{
  $checker="SELECT ORDERNO FROM BOOKING WHERE ORDERNO=$v9";
  $CHECK=oci_parse($connection,$checker);
  oci_execute($CHECK);
  $DDL=oci_fetch($CHECK);
  if($DDL==1){
    ext();
  }
  else{
if(!empty($varr)) {
  $selected1 = $varr;
  $q11="SELECT NAME FROM CITYNAMES WHERE NAME='$selected1'";
  $vv1=oci_parse($connection,$q11);
  oci_execute($vv1);
  $v1 = oci_fetch_assoc($vv1);
  $cityname=$v1['NAME'];
  if($cityname!=NULL){
  $qwe1="SELECT BRACHNO FROM $cityname WHERE BRACHNO=$vb1";
  $qwee=oci_parse($connection,$qwe1);
  oci_execute($qwee);
  $looe=oci_fetch($qwee);
  if($looe == 1 ){
    $qwe1="SELECT BRACHNO FROM $cityname WHERE BRACHNO=$vb1";
    $qwee=oci_parse($connection,$qwe1);
    oci_execute($qwee);
    $varrr = oci_fetch_assoc($qwee);
    $branchnumber=$varrr['BRACHNO'];
  }
  else{
    echo "invalid brach number";
  }
}
  }
  if(!empty($vo4)) {
    if($vo4=="on"){
      if(empty($_POST['ecp'])){
        writeMsg();
      }
     if(!empty($_POST['ecp'])) {
    $selected = $_POST['ecp'];
    $q1="SELECT EGG,CHICKEN FROM PACKAGES WHERE NAME='$selected'";
    $vv=oci_parse($connection,$q1);
    oci_execute($vv);
    $v = oci_fetch_assoc($vv);
    $eggs=$v['EGG'];
    $chickens=$v['CHICKEN'];
    $PRICE=((20*$eggs)+(1200*$chickens));
    $insertquery="INSERT INTO BOOKING (USERNAME,CITY,BRANCHNO,ADDRESS,EGG,CHICKEN,PRICE,ORDERNO) VALUES('$vname','$cityname',$branchnumber,'$v2',$eggs,$chickens,$PRICE,$v9)";
    $ex=oci_parse($connection,$insertquery);
    oci_execute($ex);
    $qaz="SELECT TOTALORDER FROM $cityname WHERE BRACHNO=$vb1";
            $qaz1=oci_parse($connection,$qaz);
            oci_execute($qaz1);
            $qaz2=oci_fetch_assoc($qaz1);
            $qazvar=$qaz2['TOTALORDER'];
            $qazvar=$qazvar+1;
            $qaz3="UPDATE $cityname SET TOTALORDER=$qazvar WHERE BRACHNO=$vb1";
            $qaz33=oci_parse($connection,$qaz3);
            oci_execute($qaz33);
    }
    }
    else{
        if($v4==NULL or $v5==NULL){
         writeMsg();
        }
        else{
          if($v4<=0 or $v5<=0){
          writeMsg01();
           }
           else{
            $price=((20*$v4)+(1200*$v5));
            $insertquery1="INSERT INTO BOOKING (USERNAME,CITY,BRANCHNO,ADDRESS,EGG,CHICKEN,PRICE,ORDERNO) VALUES('$vname','$cityname',$branchnumber,'$v2',$v4,$v5,$price,$v9)";
            $ex1=oci_parse($connection,$insertquery1);
            oci_execute($ex1);
            $qaz="SELECT TOTALORDER FROM $cityname WHERE BRACHNO=$vb1";
            $qaz1=oci_parse($connection,$qaz);
            oci_execute($qaz1);
            $qaz2=oci_fetch_assoc($qaz1);
            $qazvar=$qaz2['TOTALORDER'];
            $qazvar=$qazvar+1;
            $qaz3="UPDATE $cityname SET TOTALORDER=$qazvar WHERE BRACHNO=$vb1";
            $qaz33=oci_parse($connection,$qaz3);
            oci_execute($qaz33);
           }
      }

    }
}
  }
}
}
}
?>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="book.js"></script>

</section>
</body>
</html>