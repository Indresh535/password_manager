
<?php
session_start();
include 'includes/design.php';
if($_SESSION['username']==true)                                    //checks user's session is same or not
{
      
     $admin_name=$_SESSION['username'];
}else{
   header('location:../index.php');//after logout don't come back

}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
    <title>Password Generator</title>
  </head>
  <body>
<form>
  <?php echo "<h2 style=color:blue;>WELCOME: ". $admin_name."</h2>"; ?>
    <div class="PasswordGenerator">   
    <div class="container"> 
      <h2>Password Generator</h2>
      <div class="result-container">
        <span id="result"></span>
        <button titlt="Copy" class="clipboard" id="clipboard">
          <i class="far fa-clipboard"></i>
        </button>
      </div>
      <div class="settings">
          <div class="setting">
              <label>Password Length</label>
              <input type="number" id="length" min="4" max="20" value="20">
          </div>
          <div class="setting">
            <label>Include UpperCase Letters</label>
            <input type="checkbox" id="uppercase" checked>
        </div>
        <div class="setting">
            <label>Include LowerCase Letters</label>
            <input type="checkbox" id="lowercase" checked>
        </div>
        <div class="setting">
            <label>Include Numbers</label>
            <input type="checkbox" id="numbers" checked>
        </div>
        <div class="setting">
            <label>Include Symbols</label>
            <input type="checkbox" id="symbols" checked>
        </div>
      </div>
      <button type="button" class="btn" id="generate">Generate Password</button>
      <button type="button" class="btn" ><a href="save_password.php"> Save Password </a></button>
    </div>
    </div>
    </form>
    <script src="script.js"></script>
  </body>
</html>
