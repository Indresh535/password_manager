<?php

// error_reporting(E_ERROR | E_PARSE);

include 'config.php';
if(isset($_POST['signinsubmit']))
{ 
$name=$_POST['username'];
$phoneno=$_POST['phno'];
$email=$_POST['email'];
$confirm_pass=$_POST['confirm_password'];
$confirm_pass =md5($confirm_pass);

// $s="select * from table_name where column_name='$value'";
$sql="select * from user_details where admin='$name'";
 
$result=mysqli_query($con,$sql);
$num =mysqli_num_rows($result);

if($num ==1){

        echo"<script type='text/javascript'>alert('Username already Exist');</script>"; 
        
   } else{
    // insert into table_name(column_name1,column_name2,column_name3,column_name4) values('$value1','$value12','$value3','$value4')";
    $reg="insert into user_details(admin,phoneno,email,password) values('$name','$phoneno','$email','$confirm_pass')";
    mysqli_query($con,$reg);
    
    echo"<script type='text/javascript'>
    alert('Registered Sucessfully');
    window.location.href='../index.php';
    </script>";
  
}
}

     ?>