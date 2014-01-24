<?php

session_start();
$con = mysql_connect("localhost", "root", "");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("metisme_challenge_test") or die("cannot select DB");

$email = $_POST['email'];
$password = $_POST['password'];


$sql = "SELECT * FROM userinfo_tbl WHERE UserEmailId='$email' and UserPassword='$password'";
$result = mysql_query($sql);

// store session data

$row = mysql_fetch_array($result);
$nameis = $row['UserName'];
$id = $row['UserId'];
$_SESSION['ids'] = $id;
$_SESSION['views'] = $nameis;

// Mysql_num_row is counting table row
$count = mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if ($count >= 1) {

    // Register $myusername, $mypassword and redirect to file "login_success.php"
    //session_register("email");

    header("location: userhomepage.php");
} else {
    header("location: index.php");
}
?>