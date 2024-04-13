
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width = devide-width, iniial-scale = 1.0">
    <title>Coach Login Page</title>
    <link rel = "stylesheet" href = "../css/login.css">
</head>
<body>
    <section>
        <div class = "imgBx">
            <img src = "../images/apllogo.png">
        </div>
        <div class = "contentBx">
            <div class = "formBx">
                <h2>Login Page</h2> 
                <form action="../action/admin_login_action.php" onsubmit= "validateForm(event)" class="form" id="login" method="post" >
                    <div class = "inputBx">
                        <span>Username</span>
                        <input name="email" type="text" id="email" placeholder="Email" autocomplete="off">
                    </div>
                    <div class = "inputBx">
                        <span>Password</span>
                        <input type="password" id="password" name ="password" placeholder="Password" autocomplete="off">
                    </div>
                    <div class = "inputBx">
                        <button class="log" id ="button" type="submit" name="signInbtn">Log In</button>
                    </div>
                    <div class = "inputBx">
                        <p>Don't have an account? <a href = "../login/adminRegister.php">Register!</a></p>
                    </div>
                </form>    
            </div>
        </div>
    </section>

    
</body>
</html>