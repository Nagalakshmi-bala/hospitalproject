<?php
session_start();
include "hospital.php"; 
$link = opencon();
if (!$link) {
    die("Database connection failed.");
}
    $eusername = mysqli_real_escape_string($link, $_POST['eusername']);
    $epassword = mysqli_real_escape_string($link, $_POST['epassword']);
    $sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $eusername, $epassword);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['admin'] = $row['username']; 
    header("Location: index.php");
    exit();
    } else {
        echo "<script>alert('Incorrect username or password'); window.location.href='login.php';</script>";
    }
mysqli_close($link);
?>