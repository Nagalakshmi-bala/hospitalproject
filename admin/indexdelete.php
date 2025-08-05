<?php
include "../hospital.php";	
$link = opencon(); 
$did=$_GET['content'];
$qr="delete from alerts where content='$did'";
echo $qr;
mysqli_query($link,$qr);
header('location:index.php');
mysqli_close($link); 
?>