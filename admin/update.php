<?php
include "../hospital.php";	
$link = opencon(); 
$staff_name=$_POST['staff_name'];
$username=$_POST['username'];
$password=$_POST['password'];
$id = $_POST['id'];
$qr="update admin set username='$username',password='$password'where id='$id'";
echo $qr;
mysqli_query($link,$qr);
header('location:staffuser.php');
?>