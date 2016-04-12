<?php

$host="localhost"; 
$username="root"; 
$password="";
$db_name="inceg"; 

mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
$response = array("error" => FALSE);
$username=$_POST['username']; 
$password=$_POST['password']; 

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$sql="SELECT * FROM users WHERE username='$username' and password='$password'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
$user = mysql_fetch_array($result);
$response["error"] = FALSE;
            $response["uid"] = $user["id"];
            $response["user"]["name"] = $user["name"];
            $response["user"]["email"] = $user["email"];
	    $response["user"]["admin"] = $user["admin"];
echo json_encode($response);
}
else {
$response["error"] = TRUE;
            $response["error_msg"] = "Incorrect username or password!";
            echo json_encode($response);
}
?>

