<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Password Manager</title>
</head>
<body>
    <nav>
        <div class="logo">Password Manager</div>
    <ul>
        <li><a href="#">SignIn</a></li>
    </ul>
    <ul>
        <li><a href="#">About</a></li>
    </ul>
    <ul>
        <li><a href="#">Contact</a></li>
    </ul>
</nav>
<!-- ============================************************ LogInBox ****************======================== -->
<form action="includes/login.php" method="post" class="login">
    <div class="login-box">
        <div class="container">
            <h1>Login Form</h1>
            <div class="form_input">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="form_input">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <button name="loginsubmit" class="btn">Login</button>
            <button type="reset" name="reset" class="btn">Reset</button>
        </div>
    </div>
</form>
<!--======================******************** SignInBox **************================================ -->

<form action="includes/signin.php" method="post" class="signin" name="signin">
<input type="checkbox" id="openSidebar" >
        <label for="openSidebar" class="SidebarToggle" >
            <div class="SignInButton"></div>
    </label>
<div class="sidebar">
    <div class="SignInBox">
        <div class="container">
            <h1>SignIn Form</h1>
            <div class="form_input">
                <input type="text" name="username" id="username" required>
                <label>Username</label>
            </div>
            <div class="form_input">
                <input type="tel" name="phno" id="phno" required>
                <label>Phone no:</label>
            </div>
            <div class="form_input">
                <input type="email" name="email" id="email" required>
                <label>E-mail</label>
            </div>
            <div class="form_input">
                <input type="password" name="password" id="password"  
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                <label>Password</label>
            </div> 
            <div class="form_input">
                <input type="password" name="confirm_password" id="confirm_password" required>
                <label>Confirm Password</label>
            </div>            
            <button name="signinsubmit" class="btn" onmousemove="passwordMatch();">Submit</button>
            <button type="reset" name="reset" class="btn">Reset</button>
        </div>
    </div>
</div>
</form>
    </body>
    <script src="script.js"></script>
</html>
