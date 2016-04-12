<?php
$servername = "localhost";
$username = "root";
$password = "barathe94";
$dbname = "mobathon";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$title = $_POST["club"];
$name = $_POST["name"];
$password = $_POST["password"];

$sql = "INSERT INTO customer(name,username,password) VALUES ('$title', '$name', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
