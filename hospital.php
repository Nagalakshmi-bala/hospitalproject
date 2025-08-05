<?php
function opencon(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "hospital";
	$conn = new mysqli($servername, $username, $password, $db);
	if($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}
	return $conn;  // Return the correct variable
}
?>