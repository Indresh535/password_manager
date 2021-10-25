<?php
    include 'config.php';
    if(isset($_POST['loginsubmit']))
{
$name= $_POST['username'];
$pass=$_POST['password'];
$pass=md5($pass);

// $s="select * from table_name where column_name1='$value' && column_name2='$value'";
$sql="select * from user_details where admin='$name' && password='$pass'";
 $result=mysqli_query($con,$sql);
 $num=mysqli_num_rows($result);
   
if($num==1)
   {
    $_SESSION['username']=$name;
    $name=$_POST['username'];
    echo"<script type='text/javascript'>
    alert('LogedIn Sucessfully');
    window.location.href='../password_generator/index.php';
    </script>";
   } else{
    echo"<script type='text/javascript'>
    alert('Invalid Username or Password!');
    window.location.href='../index.php';
    </script>";
}
}
?>
