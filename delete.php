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
$ids = $_POST["id"];

for($i=0;$i<count($ids);$i++){

$del_id = $ids[$i];
$sql = "DELETE FROM books WHERE id='$del_id'";

if ($conn->query($sql) === TRUE) {
    echo "Success";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}



$conn->close();
?>
