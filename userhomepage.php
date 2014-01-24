<!DOCTYPE html>
<html>
    <head>
        <title>Home Page</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="shortcut icon" href="image.gif">
        <script src="jquery.js"></script>
        <script type="text/javascript">
            function val(v) {
                if (v.value == '') {
                    alert("thsi is empty");
                    return false;
                }
                else
                    return true;
            }
        </script>
        <script>
            $(document).ready(function() {
                var total_len = 100;
                $('#remaining').html("Remaining charecters " + total_len);
                $('#pos').keyup(function() {
                    var text_len = $('#pos').val().length;
                    var rem_len = total_len - text_len;
                    $('#remaining').html("Remaining charecters " + rem_len);
                });
            });
        </script>
    </head>
    <body>
        <div align="center">
            <div id="userpage" align="center">
                <div id="userhome" align="center">

                    <?php require_once 'header.php'; ?>
                    <?php
                    ?>
                </div>
                <div id="userdetails" align="center">
                    <p id="detailsp" >
                        <?php
                        echo "<strong>Wellcome " . $_SESSION['views'] . "</strong>";
                        ?>
                    </p>
                </div>
                <div id="wallpost" > 
                    <form name="wallpostform" onsubmit="return val(wallpostform.postit);" action="wallpost.php" method="post">
                        <br/>
                        <table>
                            <tr>
                                <td><textarea id="pos" placeholder="Post something on your wall .." maxlength="100" rows="4" cols="50" name="postit"></textarea></td>
                                <td id="check"><input id="link_a" type="submit" value="POST" name="wall_post"></td> 
                            </tr>
                            <td><p id="remaining"></p></td>
                        </table>
                    </form>
                </div>
                <div id="recentpost">
                    <?php require_once 'recentpost.php'; ?>
                </div>
                <?php require_once 'footer.php'; ?>
            </div>

        </div>
    </div>
</body>
</html>