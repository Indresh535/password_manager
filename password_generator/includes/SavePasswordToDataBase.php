<?php

// error_reporting(E_ERROR | E_PARSE);

include 'config.php';
if(isset($_POST['SavePasswordButton']))
{ 
$admin_name=$_SESSION['username'];
$website_name=$_POST['website_name'];
$website_url=$_POST['website_url'];
$website_username=$_POST['website_username'];
$website_password=$_POST['website_password'];

// $s="select * from table_name where column_name='$value'";
$sql="select * from save_password where ADMIN='$admin_name'";


// To avoid Duplicate Entry of Column having same website_name and url
$duplicate="select * from save_password where WEBSITE='$website_name'  and ADMIN='$admin_name'";
$duplicateresult=mysqli_query($con,$duplicate);
$duplicateCount=mysqli_num_rows($duplicateresult);


 
$result=mysqli_query($con,$sql);
$num =mysqli_num_rows($result);

if($duplicateCount >=1){
      echo"<script type='text/javascript'>alert('Password already Saved');
      window.location.href='../save_password.php';</script>"; 
   } else{
    // insert into table_name(column_name1,column_name2,column_name3,column_name4) values('$value1','$value12','$value3','$value4')";
    $reg="insert into save_password(ADMIN,WEBSITE,URL,USERNAME,PASSWORD) values('$admin_name','$website_name','$website_url','$website_username','$website_password')";
    mysqli_query($con,$reg);
  echo"<script type='text/javascript'>alert('Password Saved Sucessfully');
  window.location.href='../save_password.php';</script>"; 
  
}
}

     ?>