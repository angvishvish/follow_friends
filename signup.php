<?php

$con = mysql_connect("localhost", "root", "vish");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("metisme_challenge_test", $con);

$name = $_POST['entername'];
$email = $_POST['enteremail'];
$password = $_POST['enterpassword'];
if($name!=''){
    mysql_query("INSERT INTO userinfo_tbl(UserEmailId,UserName,UserPassword)
	VALUES('$email','$name','$password')"); 
}
 else {
}
?>