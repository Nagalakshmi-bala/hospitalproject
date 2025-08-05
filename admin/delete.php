<?php
include "../hospital.php";	
$link = opencon(); 
$did=$_GET['staff_name'];
$qr="delete from admin where staff_name='$did'";
echo $qr;
mysqli_query($link,$qr);
header('location:staffuser.php');
mysqli_close($link); 
?>