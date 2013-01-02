<?php
session_start();
$con = mysql_connect("localhost", "root", "vish");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("metisme_challenge_test", $con);

$userid = $_SESSION['ids'];
$followerid = $_POST['follow'];
echo $userid . "<br/>";
echo $followerid;
//insert into follower_detail(f_id,u_id)values(?,?)
mysql_query("INSERT INTO followerfollower_tlb(UserFollowerId,UserFollowId)VALUES('$followerid','$userid')");
header('Location: userhomepage.php');
?>