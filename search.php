<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inceg";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$key = $_GET['key'];
$sql = "SELECT* FROM books where title LIKE '%".$key."%'";
$result = $conn->query($sql);
$json = array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {	
		$json[]= $row;	
}
} else {
    echo "[]";
}
print json_encode($json);
	
$conn->close();
?>
