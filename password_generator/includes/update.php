<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>Update Record</title>
</head>
<body>
<!-- ===================*************** To PopUp Box for Update Password in Table **********************===================== -->

      
<?php
include 'config.php';

$UpdateWebsiteRow=$_GET['WEBSITE'];
$sql="select * from save_password where WEBSITE='$UpdateWebsiteRow'";
$result=mysqli_query($con,$sql);


if($result)
{
    while($rows=mysqli_fetch_array($result))
    {
        ?>
  


<form action="" method="post">
    <div class="popup" id="popup" style=" visibility: visible;">
        <div class="popupContent">
            <h2>Update Details</h2>
            <div class="inputBox">
                <input type="text" name="website_name" id="website_name" value="<?php echo $rows['WEBSITE']; ?>"  required>
                <label for="website_name">WebSite</label>
            </div>
            <div class="inputBox">
                <input type="text" name="website_url" id="website_url" value="<?php echo $rows['URL']; ?>"  required>
                <label for="website_url">URL</label>
            </div>
            <div class="inputBox">
                <input type="text" name="website_username" id="website_username" value="<?php echo $rows['USERNAME']; ?>"  required>
                <label for="website_username">Username</label>
            </div>
            <div class="inputBox">
                <input type="password" name="website_password" id="website_password" value="<?php echo $rows['PASSWORD']; ?>"  required>
                <label for="website_password">Password</label>
            </div>
               
        </div>  
            <div class="SavePasswordButton">
                <button title="update" name="UpdatePasswordButton" type="submit">Update</button>
            </div>
            <div class="SavePasswordButton">
                <button title="reset" type="reset">Reset</button>
            </div>
               
    </div>    
</form>



<?php
}
}else{
    echo"<script type='text/javascript'>alert('Record Not Found');
    window.location.href='../save_password.php';</script>"; 
}

?>

</body>
</html>


<!-- ===================*************** Php Code for Update Password in Table **********************===================== -->

<?php

if(isset($_POST['UpdatePasswordButton']))
{ 
$website_name=$_POST['website_name'];
$website_url=$_POST['website_url'];
$website_username=$_POST['website_username'];
$website_password=$_POST['website_password'];

// $update="UPDATE table_name SET column_name1='$value1',column_name2='$value2',column_name3='$value3',column_name4='$value4' WHERE column_name='$value'";
$Updatesql="update save_password 
set WEBSITE='$website_name',URL='$website_url',USERNAME='$website_username',PASSWORD='$website_password' 
where WEBSITE='$UpdateWebsiteRow'";

$Updatesql_run=mysqli_query($con,$Updatesql);
if($Updatesql_run)
{
    echo"<script type='text/javascript'>alert('Record Updated Sucessfully');
    window.location.href='../save_password.php';</script>"; 
}
}
?>