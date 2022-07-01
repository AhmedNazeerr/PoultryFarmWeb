<?php
$connection=oci_connect("system","1234","localhost:1521/orcl");
if(!$connection){
    echo "Not ready";
}
else{
    // echo "Ready to Run";
}
// $query="insert into ahmed values('ahmednazeer')";
// $stmp=oci_parse($connection,$query);
// oci_execute($stmp);
// oci_close($connection);
?>