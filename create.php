<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inceg";
echo "abc";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$title = $_POST["title"];
$about = $_POST["about"];
$author = $_POST["author"];

$stock = $_POST["stock"];
$given = $_POST["given"];
$sql = "INSERT INTO books(title,about,author,stock,given) VALUES ('$title', '$about', '$author','$stock','$given')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
