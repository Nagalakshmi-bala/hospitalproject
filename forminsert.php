<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
include "hospital.php";
$link = opencon();
$pname = mysqli_real_escape_string($link, $_POST['pname']);
$date = mysqli_real_escape_string($link, $_POST['date']);
$narration = mysqli_real_escape_string($link, $_POST['narration']);
$admin = $_SESSION['admin'];
// Define the directory where files will be uploaded
$targetDir = "uploads/";

// Create the uploads directory if it doesn't exist
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0755, true);
}

// Handle image upload
if (isset($_FILES['img'])) {
    $imgFileType = strtolower(pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION));
    $imgFileName = uniqid('img_', true) . '.' . $imgFileType; // Unique file name
    $imgTargetFile = $targetDir . $imgFileName;

    // Check if the file is an actual image
    $check = getimagesize($_FILES['img']['tmp_name']);
    if ($check === false) {
        $imgFileName = null; 
      }elseif ($_FILES['img']['size'] > 5000000) {
        die("Sorry, your image is too large.");
    }elseif (!in_array($imgFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    }

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES['img']['tmp_name'], $imgTargetFile)) {
        echo "The image " . htmlspecialchars($imgFileName) . " has been uploaded.<br>";
    } else {
        echo "No image uploaded. Proceeding without image.<br>";
    }
}
// Handle video upload
if (isset($_FILES['video'])) {
    $videoFileType = strtolower(pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION));
    $videoFileName = uniqid('vid_', true) . '.' . $videoFileType; // Unique file name
    $videoTargetFile = $targetDir . $videoFileName;

    // Check file size (50MB limit)
    if ($_FILES['video']['size'] > 50000000) {
        die("Sorry, your video is too large.");
    }

    // Allow certain file formats
    if (!in_array($videoFileType, ['mp4', 'avi', 'mov', 'wmv'])) {
        die("Sorry, only MP4, AVI, MOV & WMV files are allowed.");
    }

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES['video']['tmp_name'], $videoTargetFile)) {
        echo "The video " . htmlspecialchars($videoFileName) . " has been uploaded.<br>";
    } else {
        die("Sorry, there was an error uploading your video.");
    }
}
$imgFileName = $imgFileName ?? "";
$videoFileName = $videoFileName ?? "";
    $sql = "INSERT INTO patientname (pname, date, narration, img, video,admin) VALUES (?, ?, ?, ?, ?,?)";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "ssssss", $pname, $date, $narration, $imgFileName, $videoFileName,$admin);

    if (mysqli_stmt_execute($stmt)) {
        echo "Record inserted successfully.";
    } else {
        echo "Database error: " . mysqli_error($link);
    }
    mysqli_stmt_close($stmt);
    header("location:form.php");
?>