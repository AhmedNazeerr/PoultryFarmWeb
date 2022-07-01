<?php
// error_reporting(E_ALL ^ E_WARNING);
$M1=FALSE;
$M2=FALSE;
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: account.php");
    exit;
  }
  if($_SESSION['username']!="admin"){
    header("location: home.php");
  }
  if(isset($_POST['back'])){
    // $_SESSION['acc']=false;
    session_unset();
    session_destroy();
    header("location: account.php");
    exit;
  }
  ?>
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
        <div class="alert alert-danger" role="alert">
         no account with this username exsists
        </div>
        ';
         } 
         function writeMsg2() {
          echo '
          <div class="alert alert-danger" role="alert">
         user deleted sucessfully
          </div>
          ';
      }       
      function writeMsg21() {
        echo '
        <div class="alert alert-danger" role="alert">
       branch deleted sucessfully
        </div>
        ';
    }       
      function writeMsg3() {
        echo '
        <div class="alert alert-danger" role="alert">
        name already exsist 
        </div>
        ';
    }   
    function writeMsg31() {
      echo '
      <div class="alert alert-danger" role="alert">
     doent exsist 
      </div>
      ';
  } 
    
    function writeMsg4() {
      echo '
      <div class="alert alert-danger" role="alert">
    table created succesfully
      </div>
      ';
  }   
  function writeMsg5() {
    echo '
    <div class="alert alert-danger" role="alert">
  deleted succesfully
    </div>
    ';
}   
function writeMsg6() {
  echo '
  <div class="alert alert-danger" role="alert">
brach number cannot be less than 1
  </div>
  ';
} 
function writeMsg7() {
  echo '
  <div class="alert alert-danger" role="alert">
city doesnt exsist
  </div>
  ';
}      
function writeMsg8() {
  echo '
  <div class="alert alert-danger" role="alert">
branch no already exsist try adding a different one
  </div>
  ';
} 
function writeMsg9() {
  echo '
  <div class="alert alert-danger" role="alert">
data added sucessfully
  </div>
  ';
} 
function writeMsg10() {
  echo '
  <div class="alert alert-danger" role="alert">
branchno is invalid
  </div>
  ';
}
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About us</title>
  <!-- swiper css link -->
  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
  <!-- swiper other link -->
  <link
  rel="stylesheet"
  href="https://unpkg.com/swiper/swiper-bundle.min.css">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- linking font -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <!-- custom css file -->
  <link rel="stylesheet" href="style.css">

  <link rel="stylesheet" href="admin.css">
     <!-- linking favicon -->
     <link rel="shortcut icon" type="image/png" href="images/mainicon.png">
</head>

<body>
  <section class="header">
    <a href="home.php" class="logo"><img src="images/homelogo.png" alt=""></a>
    <nav class="navbar">
    <a href="#userdata">UserData</a>
    <a href="#pdata">PackageData</a>
    <a href="#citydata">CityData</a>
    <a href="#bookdata">BookingData</a>
      <a href="account.php" name="back">Back</a>
    </nav>
  </section>
   <section class="pack"id="pdata" >
   <form action="admin.php" class="l1"method="post">
<div class="input-field">
            <i class="fas"></i>
            <input type="text"  maxlength="25" placeholder="Enter Package name" name="val">
        </div>
        <input type="submit" class="btn s" value="all packages" name="alll">
        <input type="submit" class="btn s" value="SEARCH" name="addb">
        <input type="submit" class="btn s" value="DEL" name="delb">
</form>
   <table class="styled-table dol1" >
    <thead>
    <tr>
<th>Package Name</th>
<th>egg Count</th>
<th>Chicken Count</th>
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
  if(isset($_POST['alll'])){
$query4412="SELECT * FROM packages";
$temp14412=oci_parse($connection,$query4412);
oci_execute($temp14412);
while (( $row221 = oci_fetch_assoc($temp14412) ) != false) 
{
  echo "
  <tbody>
  <tr>
  <td >" . $row221['NAME'] ."</td> 
  <td>" . $row221['EGG'] ."</td> 
  <td>" . $row221['CHICKEN'] ."</td> 
  </tr>
  </tbody>";
}
}
  if(isset($_POST['addb'])){
    $varr=$_POST['val'];
    if($varr == NULL){
      echo '
      <header class="alert alert-danger" role="alert">
       enteries cannot be null
      </header>
      ';
   }
else{
  $query01="SELECT NAME FROM packages where NAME='$varr'";
$temp01=oci_parse($connection,$query01);
oci_execute($temp01);
$l01=oci_fetch($temp01);
if($l01 == 1 ){
  $query02="SELECT * FROM packages where NAME='$varr'";
  $temp02=oci_parse($connection,$query02);
  oci_execute($temp02);
  while (( $row02 = oci_fetch_assoc($temp02) ) != false) 
  {
    echo "
    <tbody>
    <tr>
    <td >" . $row02['NAME'] ."</td> 
    <td>" . $row02['EGG'] ."</td> 
    <td>" . $row02['CHICKEN'] ."</td> 
    </tr>
    </tbody>";
  }
  }
  else{
    writeMsg3();
}

}
}
if(isset($_POST['delb'])){
  $va=$_POST['val'];
  if($va == NULL){
   writeMsg();
 }
 else{
  $qery101="SELECT NAME FROM packages where NAME='$va'";
$tmp101=oci_parse($connection,$qery101);
oci_execute($tmp101);
$l11=oci_fetch($tmp101);
if($l11 == 1 ){
  $qery102="DELETE  FROM packages where NAME='$va'";
$temp12=oci_parse($connection,$qery102);
oci_execute($temp12);
writeMsg5();
}
else{
  writeMsg31();
}
 }
}
?>
</table>
</section>
<section class="badde">
   <div class="">
<form action="admin.php" method="post" class=""  name="">
<div class="input-field">
            <i class="fas"></i>
            <input type="text"  maxlength="25" placeholder="Enter Package name" name="pval">
        </div>
        <div class="input-field">
            <i class="fas"></i>
            <input type="text"  maxlength="25" placeholder="Enter number of eggs" name="eval">
        </div>
        <div class="input-field">
            <i class="fas"></i>
            <input type="text"  maxlength="25" placeholder="Enter number of chickens" name="cval">
        </div>
        <input type="submit" class="btn"  method="post" value="Add Package" name="padd">


</form>
<?php
include_once('connect.php');
if(isset($_POST['padd'])){
  $pname=$_POST["pval"];
$pegg=$_POST['eval'];
$pchick=$_POST['cval'];
if($pname==NULL or $pegg == NULL or $pchick==NULL){
writeMsg();
}
if($pegg<=0 or $pchick<=0){
  writeMsg();
  }
else{
$s="SELECT NAME from PACKAGES where  NAME='$pname' ";
$t=oci_parse($connection,$s);
oci_execute($t);
$l=oci_fetch($t);
if($l == 1 ){
writeMsg3();
}
else{
 $stmt1="INSERT INTO PACKAGES (NAME,EGG,CHICKEN) VALUES('$pname',$pegg,$pchick)";
 $tem=oci_parse($connection,$stmt1);
oci_execute($tem);
writeMsg9();
}
}
}


?>

</div>
</section>






  <!-- header sections ends here  -->
  <section class="citycreate" id="citydata">
  <div>
<form action="admin.php" class="p1"method="post">
<div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text"  maxlength="15" placeholder="Enter city name" name="cityname">
        </div>
        <input type="submit" class="btn s" value="ADD CITY" name="cityaddbutton">
        <input type="submit" class="btn s" value="DEL CITY" name="citydelbutton">
</form>
<?php
  include_once('connect.php');
   if(isset($_POST['cityaddbutton'])){
    $CITY=$_POST['cityname'];
   if($CITY == NULL){
    writeMsg();
  }
  else{
    $sql31="SELECT NAME from CITYNAMES where  NAME='$CITY' ";
    $temp31=oci_parse($connection,$sql31);
    oci_execute($temp31);
    $ll31=oci_fetch($temp31);
    if($ll31 == 1 ){
writeMsg3();
   }
   else{
    $queryno1="INSERT INTO CITYNAMES VALUES('$CITY')";
    $tq1=oci_parse($connection,$queryno1);
  oci_execute($tq1);
  $queryno2="CREATE TABLE $CITY(brachno int PRIMARY KEY,
  brachname VARCHAR(100) NOT NULL,
  branchaddress VARCHAR(30) NOT NULL,
  totalorder int not null
  )";
  $tq12=oci_parse($connection,$queryno2);
  oci_execute($tq12);
  writeMsg4();
   }
  }
}
if(isset($_POST['citydelbutton'])){
  $CITY=$_POST['cityname'];
 if($CITY == NULL){
  writeMsg();
}
else{
  $sql31="SELECT NAME from CITYNAMES where  NAME='$CITY' ";
  $temp31=oci_parse($connection,$sql31);
  oci_execute($temp31);
  $ll31=oci_fetch($temp31);
  if($ll31 == 1 ){
$qbnn="DELETE FROM BOOKING WHERE CITY='$CITY' ";
$qbnn1=oci_parse($connection,$qbnn);
oci_execute($qbnn1);
$queryno31="DROP TABLE $CITY";
$tq31=oci_parse($connection,$queryno31);
oci_execute($tq31);
$queryno41="DELETE FROM CITYNAMES WHERE NAME='$CITY' ";
$tq41=oci_parse($connection,$queryno41);
oci_execute($tq41);
writeMsg5();
 }
 else{
writeMsg31();
 }
}
}
?>
</div>

<div class="brach">
<form action="admin.php" class="p1"method="post">
<select id="svcj" class="select" name="city" onchange="ddlselect1()">
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
<div class="input-field" id="i2">
            <i class="fas fa-user"></i>
            <input type="text"  placeholder="Enter city for brach" id="i1" name="branchcity">
        </div>
<div class="input-field">
            <i class="fas fa-user"></i>
            <input type="number"  placeholder="Enter branch no" name="branchno">
        </div>
<div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text"  maxlength="15" placeholder="Enter branch name" name="branchname">
        </div>
        <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text"  maxlength="40" placeholder="Enter branch address" name="branchaddress">
        </div>
        <input type="submit" class="btn n" value="ADD BRANCH" name="brachadd">
        <input type="submit" class="btn c" value="DEL BRANCH" name="brachdel">
</form>
</div>
<div class="div1">

      <!-- <div class="content">
          <h3>Book Now</h3>
          <p>Book eggs and chickens now.</p>
      </div>
      <img src="images/booknow.png" alt="" class="image"> -->
<form action="admin.php" class="p1" method="post">
<select id="svc" class="select xc1" name="city" onchange="ddlselect()">
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
<div class="input-field qsa">
            <i class="fas fa-user"></i>
            <input type="text"  maxlength="15" placeholder="Enter city name" id="ci"name="ci">
        </div>
        <button type="submit" onclick="myFunction()" class="btn d vvv"  method="post" name="vi">View Branches</button>
</form>
<table class="styled-table" >
    <thead>
    <tr>
<th>Branch No</th>
<th>Branch Name</th>
<th>Branch address</th>
<th>orders</th>
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
      writeMsg();
    }
    else{
      $sql31="SELECT NAME from CITYNAMES where  NAME='$city1' ";
  $temp31=oci_parse($connection,$sql31);
  oci_execute($temp31);
  $ll31=oci_fetch($temp31);
  if($ll31 == 1 ){
  $query44="SELECT BRACHNO,BRACHNAME,BRANCHADDRESS,TOTALORDER FROM $city1";
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
    <td>" . $row2['TOTALORDER'] ."</td> 
    </tr>
    </tbody>";
}
  }
  else{
writeMsg31();
  }
}
  }
  
?>
</table>
    </div>


    <div class="div2">

<!-- <div class="content">
    <h3>Book Now</h3>
    <p>Book eggs and chickens now.</p>
</div>
<img src="images/booknow.png" alt="" class="image"> -->
<form action="admin.php" class="p1" method="post">
<!-- <div class="input-field">
      <i class="fas fa-user"></i>
      <input type="text"  maxlength="15" placeholder="Enter city name" name="ci">
  </div> -->
  <button type="submit" onclick="myFunction()" class="btn nu"  method="post" name="vii">View  All Cities</button>
</form>
<table class="styled-table" >
<thead>
<tr>
<th>City Name</th>
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
if(isset($_POST['vii'])){
$query444="SELECT NAME from CITYNAMES ";;
$temp1444=oci_parse($connection,$query444);
oci_execute($temp1444);
while (( $row24 = oci_fetch_assoc($temp1444) ) != false) 
{
echo "
<tbody>
<tr>
<td >" . $row24['NAME'] ."</td> 
</tr>
</tbody>";
}
}
?>
</table>
</div>









<?php
  include_once('connect.php');
  if(isset($_POST['brachadd'])){
    $branchcity=$_POST["branchcity"];
$branchno=$_POST["branchno"];
$branchname=$_POST["branchname"];
$branchaddress=$_POST["branchaddress"];
if($branchcity==NULL or $branchno == NULL or $branchname==NULL or $branchaddress==NULL){
writeMsg();
}
else if($branchno<1){
writeMsg6();
}
else{
  $sql31="SELECT NAME from CITYNAMES where  NAME='$branchcity' ";
  $temp31=oci_parse($connection,$sql31);
  oci_execute($temp31);
  $ll31=oci_fetch($temp31);
  if($ll31 == 1 ){

    $sql321="SELECT brachno  from $branchcity where  brachno='$branchno' ";
    $temp321=oci_parse($connection,$sql321);
    oci_execute($temp321);
    $ll321=oci_fetch($temp321);
    if($ll321 == 1 ){
writeMsg8();
    }
    else{
      $sql3221="INSERT INTO $branchcity VALUES($branchno,'$branchname','$branchaddress',0)";
$temp3221=oci_parse($connection,$sql3221);
oci_execute($temp3221);
writeMsg9();
    }
 }
 else{
writeMsg7();
 }


}
}

if(isset($_POST['brachdel'])){
  $branchcity=$_POST["branchcity"];
$branchno=$_POST["branchno"];
$branchname=$_POST["branchname"];
$branchaddress=$_POST["branchaddress"];
if($branchcity==NULL or $branchno == NULL or $branchname==NULL or $branchaddress==NULL){
writeMsg();
}
else if($branchno<1){
writeMsg6();
}
else{
$sql31="SELECT NAME from CITYNAMES where  NAME='$branchcity' ";
$temp31=oci_parse($connection,$sql31);
oci_execute($temp31);
$ll31=oci_fetch($temp31);
if($ll31 == 1 ){

  $sql321="SELECT brachno  from $branchcity where  brachno='$branchno' ";
  $temp321=oci_parse($connection,$sql321);
  oci_execute($temp321);
  $ll321=oci_fetch($temp321);
  if($ll321 == 1 ){
    $qec="DELETE FROM BOOKING WHERE BRANCHNO=$branchno";
    $cfdd=oci_parse($connection,$qec);
    oci_execute($cfdd);
    $query="DELETE FROM $branchcity where brachno=$branchno";
  $temp2=oci_parse($connection,$query);
  oci_execute($temp2);
writeMsg21();
  }
  else{
writeMsg10();
  }
}
else{
writeMsg7();
}


}
}

?>
    </section>


    <section class="book" id="bookdata">
       <form action="admin.php" class="p1"method="post">
        <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text"  maxlength="15" placeholder="Enter UserName" name="nnbv">
        </div>
        <input type="submit" class="btn b" value="getall" name="bookall">
        <input type="submit" class="btn b" value="Search" name="booksearch">
        <input type="submit" class="btn b" value="delete" name="bookdel">
        </form>
        <table class="styled-table">
    <thead>
    <tr>
<th>Username</th>
<th>City</th>
<th>Branch No</th>
<th>Address</th>
<th>EGG</th>
<th>Chicken</th>
<th>Price</th>
<th>Orderno</th>
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
  if(isset($_POST['bookall'])){
  $qquery="SELECT * FROM BOOKING";
  $qtemp1=oci_parse($connection,$qquery);
  oci_execute($qtemp1);
//  $nrows = oci_fetch_all($temp1, $res);
 while (($qrow = oci_fetch_assoc($qtemp1)) != false) {
    //  echo"<br>";
    // echo " |".$row["USERNAME"] . "|  |" . $row["FIRSTNAME"] ." | ". "<br>\n" ;
    echo "
    <tbody>
    <tr>
    <td >" . $qrow['USERNAME'] ."</td> 
    <td>" . $qrow['CITY'] ."</td> 
    <td>" . $qrow['BRANCHNO'] ."</td> 
    <td>" . $qrow['ADDRESS'] ."</td> 
    <td>" . $qrow['EGG'] ."</td> 
    <td>" . $qrow['CHICKEN'] ."</td> 
    <td>" . $qrow['PRICE'] ."</td> 
    <td>" . $qrow['ORDERNO'] ."</td> 
    </tr>
    </tbody>";
}
  }

  if(isset($_POST['booksearch'])){
$tempdata=$_POST['nnbv'];
if($tempdata==NULL){
  writeMsg();
}
else{
  $qqq="SELECT USERNAME FROM BOOKING WHERE USERNAME='$tempdata'";
  $qqqc=oci_parse($connection,$qqq);
  oci_execute($qqqc);
  $qq1=oci_fetch_assoc($qqqc);
  $qq2=$qq1['USERNAME'];
  if($qq2==$tempdata){
    $qquery="SELECT * FROM BOOKING WHERE USERNAME='$tempdata'";
  $qtemp1=oci_parse($connection,$qquery);
  oci_execute($qtemp1);
//  $nrows = oci_fetch_all($temp1, $res);
 while (($qrow = oci_fetch_assoc($qtemp1)) != false) {
    //  echo"<br>";
    // echo " |".$row["USERNAME"] . "|  |" . $row["FIRSTNAME"] ." | ". "<br>\n" ;
    echo "
    <tbody>
    <tr>
    <td >" . $qrow['USERNAME'] ."</td> 
    <td>" . $qrow['CITY'] ."</td> 
    <td>" . $qrow['BRANCHNO'] ."</td> 
    <td>" . $qrow['ADDRESS'] ."</td> 
    <td>" . $qrow['EGG'] ."</td> 
    <td>" . $qrow['CHICKEN'] ."</td> 
    <td>" . $qrow['PRICE'] ."</td> 
    <td>" . $qrow['ORDERNO'] ."</td> 
    </tr>
    </tbody>";
}
  }
}
  }
  if(isset($_POST['bookdel'])){
    $tempdata=$_POST['nnbv'];
    if($tempdata==NULL){
      writeMsg();
    }
    else{
      $qqq="SELECT USERNAME FROM BOOKING WHERE USERNAME='$tempdata'";
      $qqqc=oci_parse($connection,$qqq);
      oci_execute($qqqc);
      $qq1=oci_fetch_assoc($qqqc);
      $qq2=$qq1['USERNAME'];
      if($qq2==$tempdata){
        $xxz="SELECT CITY,BRANCHNO FROM BOOKING WHERE USERNAME='$tempdata'";
        $xxzz=oci_parse($connection,$xxz);
        oci_execute($xxzz);
        while(($x=oci_fetch_assoc($xxzz))!=false){
          $vart=$x['CITY'];
          $vart1=$x['BRANCHNO'];
          $valid="SELECT TOTALORDER FROM $vart WHERE BRACHNO=$vart1";
          $valid1=oci_parse($connection,$valid);
          oci_execute($valid1);
          $valid2=oci_fetch_assoc($valid1);
          $varq=$valid2['TOTALORDER'];
          if($varq>0){
            $varq=$varq-1;
            $h="UPDATE $vart SET TOTALORDER=$varq WHERE BRACHNO=$vart1";
            $h1=oci_parse($connection,$h);
            oci_execute($h1);
          }
        }
        $delq="DELETE FROM BOOKING WHERE USERNAME='$tempdata'";
        $delq1=oci_parse($connection,$delq);
        oci_execute($delq1);
      }
    }
      }
?>
</table>




</section>




<section class="page" id="userdata">
    <div class="new">
    <form action="admin.php"  method="post">
<input type="submit" class="btn l" value="getallusers" name="yes">
</form>
<form action="admin.php" class="p1"method="post">
<div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text"  maxlength="15" placeholder="Enter UserName" name="nbv">
        </div>
        <input type="submit" class="btn b" value="search" name="yess">
        <input type="submit" class="btn b b1" value="delete" name="del">
</form>
</div>
<div class="container">
<table class="t1">
<table class="styled-table">
    <thead>
    <tr>
<th>Username</th>
<th>FirstName</th>
<th>LastName</th>
<th>Email</th>
<th>Pasword</th>
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
  if(isset($_POST['yes'])){
  $query="SELECT username,firstname,lastname,email,passwod FROM USERSDATA";
  $temp1=oci_parse($connection,$query);
  oci_execute($temp1);
//  $nrows = oci_fetch_all($temp1, $res);
 while (($row = oci_fetch_assoc($temp1)) != false) {
    //  echo"<br>";
    // echo " |".$row["USERNAME"] . "|  |" . $row["FIRSTNAME"] ." | ". "<br>\n" ;
    echo "
    <tbody>
    <tr>
    <td >" . $row['USERNAME'] ."</td> 
    <td>" . $row['FIRSTNAME'] ."</td> 
    <td>" . $row['LASTNAME'] ."</td> 
    <td>" . $row['EMAIL'] ."</td> 
    <td>" . $row['PASSWOD'] ."</td> 
    </tr>
    </tbody>";
}
  }

if(isset($_POST['yess'])){
      $USERNAME2=$_POST["nbv"];

      if($USERNAME2 == NULL){
        writeMsg();
      }
      else {
  $sql1="SELECT USERNAME from usersdata where ( USERNAME='$USERNAME2') ";
  $temp1=oci_parse($connection,$sql1);
  oci_execute($temp1);
  $ll1=oci_fetch($temp1);
  if($ll1 == 1 ){
    $query="SELECT username,firstname,lastname,email,passwod FROM USERSDATA where USERNAME='$USERNAME2'";
    $temp2=oci_parse($connection,$query);
    oci_execute($temp2);
   while (($row = oci_fetch_assoc($temp2)) != false) {
      echo "
      <tr>
      <td>" . $row['USERNAME'] ."</td> 
      <td>" . $row['FIRSTNAME'] ."</td> 
      <td>" . $row['LASTNAME'] ."</td> 
      <td>" . $row['EMAIL'] ."</td> 
      <td>" . $row['PASSWOD'] ."</td> 
      </tr>";
  }
    }
    else{
        writeMsg1();
    }
}
}
if(isset($_POST['del']))
{
    $USERNAME2=$_POST["nbv"];

    if($USERNAME2 == NULL){
      writeMsg();
    }
    else {
   $sql12="SELECT USERNAME from usersdata where ( USERNAME='$USERNAME2') ";
   $q12=oci_parse($connection,$sql12);
   oci_execute($q12);
 $row1 = oci_fetch($q12);
if($row1==1)
{
  $bvc="SELECT CITY FROM BOOKING WHERE USERNAME='$USERNAME2' ";
  $bvc1=oci_parse($connection,$bvc);
  oci_execute($bvc1);
  while(($bvc2=oci_fetch_assoc($bvc1))!=false){
    $tempcity=$bvc2['CITY'];
    $bvcc="SELECT BRANCHNO FROM BOOKING WHERE ( USERNAME='$USERNAME2' AND CITY='$tempcity')";
    $bvcc1=oci_parse($connection,$bvcc);
    oci_execute($bvcc1);
    $dvcc=oci_fetch_assoc($bvcc1);
    $bno=$dvcc['BRANCHNO'];
    $sqx="SELECT TOTALORDER FROM $tempcity where BRACHNO=$bno";
    $sqx1=oci_parse($connection,$sqx);
    oci_execute($sqx1);
    $bbno=oci_fetch_assoc($sqx1);
    $bbbno=$bbno['TOTALORDER'];
    if($bbbno>0){
      $bbbno=$bbbno-1;
      $cxc="UPDATE $tempcity SET TOTALORDER=$bbbno WHERE BRACHNO=$bno";
      $cxcc=oci_parse($connection,$cxc);
      oci_execute($cxcc);
    }
  }
  $bana="DELETE FROM BOOKING WHERE USERNAME='$USERNAME2'";
  $bana1=oci_parse($connection,$bana);
  oci_execute($bana1);
  $query="DELETE FROM USERSDATA where USERNAME='$USERNAME2'";
  $temp2=oci_parse($connection,$query);
  oci_execute($temp2);
writeMsg2();
}
else{
writeMsg1();
}
    }
  }
?>
</table>
</section>
<!-- <section class="page">

</section> -->
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
  <script src="admin.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>
</html>