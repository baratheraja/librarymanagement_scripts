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
$ids = $_POST['id'];
$uid = $_POST['userid'];

$del_id = $ids;

$sql = "SELECT blocked FROM books WHERE id='$del_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	
	$row = $result->fetch_assoc();
	//echo $row["blocked"];
	$b = (int)$row["blocked"];
	if($b == 1) {
		echo "blocked";	
	}else{
	//	echo $b;
	$sql = "update books set blocked='1' WHERE id='$del_id'";
	$result = $conn->query($sql);
	$sql2 = "INSERT INTO blocks (userid,bookid) values('.$uid.','.$ids.')";	
	echo "success";	
	}
	
}



$conn->close();
?>
