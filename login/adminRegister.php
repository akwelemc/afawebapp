<?php include_once('../settings/select_team_fnx.php');?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width = devide-width, iniial-scale = 1.0">
    <title>Coach Register Page</title>
    <link rel = "stylesheet" href = "../css/login.css">
</head>
<body>
    <section>
        <div class = "imgBx">
            <img src = "../images/apllogo.png">
        </div>
        <div class = "contentBx">
            <div class = "formBx">
                <h2>Register Page</h2> 
                <form action="../action/admin_register_action.php" onsubmit= "return validateForm(event)" class="form" id="register" method="post">
                    
                    <div class = "inputBx">
                        <span>Email</span>
                        <input type = "email" id="email" name="email" placeholder="xyz@whatever.com" required>
                    </div>

                    <div class = "inputBx">
                        <span>Password</span>
                        <input type="password" id="password" name="password" placeholder="Enter your password here" required>>
                    </div>

                    <div class = "inputBx">
                        <span>Confirm Password</span>
                        <input type="password" id="password2" name="password" placeholder="Re-type your password here" required>>
                    </div>

                    <div class = "inputBx">
                        <button class="log" type="submit" name="signInbtn" id="signUpbtn">Register!</button>
                    </div>
                    <div class = "inputBx">
                        <p>Already have an account? <a href = "../login/adminLogin.php">Sign In!</a></p>
                    </div>
                </form>    
            </div>
        </div>
    </section>
</body>
</html>