<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="jquery.js"></script>
        <link rel="shortcut icon" href="image.gif">
        <script>
            $(document).ready(function() {
                $('#followers').hide();
                $('#following').hide();
                $('#mypost').hide();
                $('#addpeople').hide();
                $('#follow1').click(function() {
                    $('#followers').slideToggle(500);
                    $('#following').hide();
                    $('#mypost').hide();
                    $('#mypost').hide();
                });
                $('#follow2').click(function() {
                    $('#following').slideToggle(500);
                    $('#followers').hide();
                    $('#mypost').hide();
                    $('#mypost').hide();
                });
                $('#follow3').click(function() {
                    $('#mypost').slideToggle(500);
                    $('#following').hide();
                    $('#followers').hide();

                });
                $('#follow4').click(function() {
                    $('#addpeople').slideToggle(500);
                    $('#followers').hide();
                    $('#following').hide();
                    $('#mypost').hide();
                });
            });
        </script>
    </head>
    <body>
        <header id="header" align="center">
            <ul  style="list-style: none;">
                <button id="link_a"><a id="link_a" href="userhomepage.php">Home</a></button>
                <jq id="follow3"><button id="link_a"><a id="link_a" href="#">My posts</a></button></jq>
                <jq id="follow1"><button id="link_a"><a id="link_a" href="#">Following</a></button></jq>
                <jq id="follow2"><button id="link_a"><a id="link_a" href="#">People</a></button></jq>
                <!--jq id="follow4"><button id="link_a"><a id="link_a" href="#">Add People</a></button></jq!-->
                <button id="link_a"><a id="link_a" href="logout.php">Logout</a></button>
            </ul>
        </header>
        <div id="mypost">
            <?php
            session_start();
            $con = mysql_connect("localhost", "root", "");
            if (!$con) {
                die('Could not connect: ' . mysql_error());
            }
            mysql_select_db("metisme_challenge_test") or die("cannot select DB");

            $sql = "SELECT * FROM wallpost_tbl WHERE UserId=' " . $_SESSION['ids'] . "' ORDER BY wallPostTime DESC; ";
            $result = mysql_query($sql);
            //echo "<strong>List of Post ..</strong>";
            ?>
            <tr><strong  id="tab">Your Post ..</strong></tr>
        <?php
        echo "<table>";
        if (mysql_num_rows($result)) {
            while ($row = mysql_fetch_array($result)) {
                ?>
                <tr>
                    <td id="post">
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
                </div>
                <div id="followers" >
                    <?php
                    $con = mysql_connect("localhost", "root", "");
                    if (!$con) {
                        die('Could not connect: ' . mysql_error());
                    }
                    mysql_select_db("metisme_challenge_test") or die("cannot select DB");
                    //SELECT user_id,name,email,profile_image from user_master where user_id IN (Select u_id from follower_detail where f_id=?)");
                    $sql = "SELECT * FROM userinfo_tbl WHERE UserId IN (Select UserFollowerId from followerfollower_tlb where UserFollowId='" . $_SESSION['ids'] . " ') order by UserName";
                    $result = mysql_query($sql);

                    echo "<table>";
                    //echo '<tr><strong>You are following ..</strong></tr>';
                    ?>
                    <tr><strong  id="tab">You are following ..</strong></tr>
        <?php
        if (mysql_num_rows($result)) {
            while ($row = mysql_fetch_array($result)) {
                ?>

                <tr id="post">
                    <td>
                        <div id="posttbl">
                            <?php
                            echo "<b>" . $row['UserEmailId'] . " </b><td><b>" . $row['UserName'] . "</b></td>";
                            ?>
                </tr>
            </div>
            <?php
        }
    } else {
        echo "No People to follow ..";
    }
    echo "</table>";
    ?>
</div>

<div id="following">
    <?php
    $con = mysql_connect("localhost", "root", "");
    if (!$con) {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("metisme_challenge_test") or die("cannot select DB");
    //SELECT user_id,name,email,profile_image from user_master where user_id NOT IN (Select u_id from follower_detail where f_id=?) and user_id!=?"
    $sql = "SELECT * FROM userinfo_tbl WHERE UserId NOT IN (Select UserFollowerId from followerfollower_tlb where UserFollowId='" . $_SESSION['ids'] . " ') and UserId!='" . $_SESSION['ids'] . "'order by UserName ; ";
    $result = mysql_query($sql);

    echo "<table>";
    //echo '<tr><strong>You May be knowing ..</strong></tr>';
    ?>
    <tr><strong  id="tab">You May be knowing ..</strong></tr>
<?php
if (mysql_num_rows($result)) {
    while ($row = mysql_fetch_array($result)) {
        ?>

        <tr id="">

            <td>
                <div id="posttbl">
                    <?php
                    echo "<b>" . $row['UserEmailId'] . " </b><td><b>" . $row['UserName'] . "</b>";
                    ?>
            </td>
            <td >
                <form action='addpeople.php' method="post">
                    <input type="hidden" value="<?php echo $row['UserId'] ?>" name="follow">
                    <input id="postname" type="submit" value="Follow.." name="id"/>
                </form>
            </td>
        </tr>
        </div>
        <?php
    }
} else {
    echo "No more people ..";
}
echo "</table>";
?>
</div>
<div id="addpeople" >
    <?php
    $con = mysql_connect("localhost", "root", "");
    if (!$con) {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("metisme_challenge_test") or die("cannot select DB");
    // insert into follower_detail(f_id,u_id)values(?,?)
    //insert into follower_detail(f_id,u_id)values(?,?)
    $sql = "SELECT * FROM userinfo_tbl WHERE UserId<>' " . $_SESSION['ids'] . " '";
    $result = mysql_query($sql);
    ?>
    <table align="center"><?php
        echo '<tr><strong>You may know ..</strong></tr>';
        if (mysql_num_rows($result)) {
            while ($row = mysql_fetch_array($result)) {
                $sql1 = "SELECT * FROM followerfollower_tlb WHERE UserFollowerId<>' " . $row['UserId'] . " ' ";
                $result1 = mysql_query($sql1);
                mysql_num_rows($result1);
                $rows = mysql_fetch_array($result1);
                ?>
                <tr id="post">
                    <td>
                        <div id="posttbl">
                            <?php
                            echo "<b>" . $row['UserName'] . " </b><td><b>" . $row['UserEmailId'] . "</b>";
                            ?>
                </tr>
        </div>
        <?php
    }
} else {
    echo "No more people ..";
}
?>                 
</table>
</div>
</body>
</html>