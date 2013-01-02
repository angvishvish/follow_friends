<?php
session_start();
$con = mysql_connect("localhost", "root", "vish");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("metisme_challenge_test") or die("cannot select DB");

$username=$_SESSION['views'];
$sql = "SELECT * FROM userinfo_tbl WHERE UserName='$username'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$id=$row['UserId'];
$_SESSION['idisnow']=$id;
$sql1 = "SELECT * FROM wallpost_tbl WHERE UserId='$id'";
$result1 = mysql_query($sql1);
$rows = mysql_fetch_array($result1);
$wallpostid=$rows['WallPost_Id'];
$wallpostid=$wallpostid+1;
$post = $_POST['postit'];

$date=date('Y-m-d H:i:s');
if (!mysql_query("INSERT INTO wallpost_tbl(UserId,WallPostDetails)VALUES('$id','$post')")) {
    die(mysql_error());
}
//mysql_query("INSERT INTO wallpost_tbl(UserId,WallPost_Id,WallPostDetails,WallPostTime)
//    VALUES('$id','$wallpostid','$post')");
header('Location: userhomepage.php');
?>