<?php
session_start();
include "../hospital.php"; 
$link=opencon();
if (!$link) {
    die("Database connection failed.");
}
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $content = $_POST['content'];

    $sql = "INSERT INTO alerts (start_date, end_date, content) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($link, $sql);
     mysqli_stmt_bind_param($stmt,"sss", $start_date, $end_date, $content);
        if (mysqli_stmt_execute($stmt)) {
            echo "Record inserted successfully.";
        } else {
            echo "Database error: " . mysqli_error($link);
        }
        mysqli_stmt_close($stmt);
        header("location:index.php");
          ?>
