<?php
session_start();
include "../hospital.php"; 
$link=opencon();
if (!$link) {
    die("Database connection failed.");
}
    $id = mysqli_real_escape_string($link, $_POST['id']);
    $staff_name = mysqli_real_escape_string($link, $_POST['staff_name']);
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $sql = "INSERT INTO admin (id,staff_name, username, password) VALUES ('$id',$staff_name', '$username', '$password')";
    if(mysqli_query($link, $sql)){
    echo "New admin added successfully.";
   } else {
    echo "Error: " . mysqli_error($link);
   }
mysqli_close($link);
header('location:form.php');
?>