<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Sign In</title>
        <script src="jquery.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="shortcut icon" href="image.gif">
        <script>
            function val(v){
                if(v.value == ''){
                   alert('Email or Password Cannot be EMPTY ..');
                    return false;
                }
                else
                    return true;
            }
            function value(v){
                if(v.value == ''){
                   alert('Email or Password Cannot be EMPTY ..');
                    return false;
                }
                else
                    return true;
            }
        </script>
    </head>
    <body background="body.jpg">
        <div id="signin" align="center">
            <div id="signinbox" align="center">
                <form id="signin1" action="login.php" method="post" name="wallpostform2" onsubmit="return val(signin1.email);">
                    <table id="tables">
                        <tr>    
                            <td id="input"><input id="textbox" placeholder="Email" maxlength="30" type="email" size="30" name="email" /></td>
                        </tr>
                        <table id="tables">
                            <tr>
                                <td id="input"><input id="textbox" maxlength="20"  id="inputpassword" type="password" name="password" placeholder="Password" /></td>
                                <td ><input id="clicksignin" type="submit" name="submit1" value="Sign In" /></td>
                            </tr>
                        </table>
                </form>
            </div>
            <div id="signinbox" align="center">
                <form id="signup1" action="signup.php" name="wallpostform1" onsubmit="return value(signup1.enteremail);" method="post">
                    <table id="tables">
                        <h4 style="float:left;">New to This? Sign Up</h4><br/>
                        <tr>
                            <td id="input"><input id="textbox"  maxlength="30" id="input" type="text" size="30" name="entername" placeholder="Fullname" /></td>
                        </tr>
                        <tr>
                            <td id="input"><input id="textbox" maxlength="30" type="email" size="30" name="enteremail" placeholder="Email" /></td>
                        </tr>
                        <table>
                            <tr>
                                <td id="input"><input id="textbox" maxlength="16" id="input" type="password"  size="16" name="enterpassword" placeholder="Password" /></td>
                                <td id="input"><input id="clicksignup"  type="submit"  name="submit2" value="Sign Up" /></td>
                            </tr>
                        </table>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>
