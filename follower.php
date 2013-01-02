<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="jquery.js"></script>
        <link rel="shortcut icon" href="image.gif">
        <script>
            $(document).ready(function(){
                $('#followers').hide();
                $('#following').hide();
                $('#follow1').click(function(){
                    $('#followers').toggle(500);
                    $('#following').hide();
                });
                $('#follow2').click(function(){
                    $('#following').toggle(500);
                    $('#followers').hide();
                });     
            });
        </script>
    <html>
        <body>
            <?php
            session_start();
            $con = mysql_connect("localhost", "root", "vish");
            if (!$con) {
                die('Could not connect: ' . mysql_error());
            }
            mysql_select_db("metisme_challenge_test") or die("cannot select DB");

            $idis = $_SESSION['ids'];

            echo $idis;
            $sql = "SELECT * FROM followerfollower_tlb WHERE IdUserFollowId=' " . $_SESSION['ids'] . " ' ORDER BY UserFollowerId";
            $result = mysql_query($sql);
            while ($row = mysql_fetch_row($result)) {
                echo "<tr>";
                echo $row['UserFollower'];
                // $row is array... foreach( .. ) puts every element
                // of $row to $cell variable
                foreach ($row as $cell)
                    echo "<td>$cell</td>";

                echo "</tr>\n";
            }
            ?>
        </body>
    </html>