<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Sign In</title>
        <script src="jquery.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="shortcut icon" href="image.gif">
    </head>
    <body background="body.jpg">
        <div id="signin" align="center">
            <div id="signinbox" align="center">
                <form action="signup.php" method="post">
                    <table id="tables">
                        <h4 style="float:left;">New to This? Sign Up</h4>
                        <tr>
                            <td id="input"><input id="textbox" maxlength="30" id="input" type="text" size="30" name="entername" placeholder="Fullname" /></td>
                        </tr>
                        <tr>
                            <td id="input"><input id="textbox" maxlength="30" type="email" size="30" name="enteremail" placeholder="Email" /></td>
                        </tr>
                        <table>
                            <tr>
                                <td id="input"><input id="textbox" maxlength="16" id="input" type="password"  size="16" name="enterpassword" placeholder="Password" /></td>
                                <td id="input"><input id="clicksignup" type="submit"  name="submit" value="Sign Up" /></td>
                            </tr>
                        </table>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>
