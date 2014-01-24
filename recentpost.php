<?php
$con = mysql_connect("localhost", "root", "");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("metisme_challenge_test") or die("cannot select DB");

//List of messages of people u follow : "select u_id,message,date_time from message_detail where u_id IN 
//(select u_id from follower_detail where f_id=?) order by m_id DESC"

$sql = "select UserId,wallPostDetails,wallPostTime from wallpost_tbl where UserId IN(select UserFollowerId from followerfollower_tlb where UserFollowId='" . $_SESSION['ids'] . "') order by wallPostTime DESC;";
$result = mysql_query($sql);
mysql_num_rows($result);
$row = mysql_fetch_array($result);


echo "<table>";
if (mysql_num_rows($result)) {
    while ($row = mysql_fetch_array($result)) {
        ?>
        <tr>
            <td id="postname">
                <?php
                $sqla = "select UserName from userinfo_tbl where UserId='" . $row['UserId'] . " ' ";
                $resulta = mysql_query($sqla);
                mysql_num_rows($resulta);
                $rows = mysql_fetch_array($resulta);
                echo "<strong>" . $rows['UserName'] . '</strong>';
                ?>
            </td>                                   
            <td>
                <div id="posttbl">
                    <?php
                    echo "<b> " . $row['wallPostDetails'] . " </b><td><b>" . $row['wallPostTime'] . " </b>";
                    echo '</td></tr>';
                    echo '</div>';
                }
            } else {
                echo "No posts yet ..";
            }echo "</table>";
            ?>
