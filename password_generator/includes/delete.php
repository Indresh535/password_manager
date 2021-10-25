<?php
include '../includes/config.php';
$DeleteWebsiteRow=$_GET['WEBSITE'];

// $sql="DELETE FROM TABLE_NAME WHERE Column_name=$value";
$sql="DELETE FROM save_password WHERE WEBSITE='$DeleteWebsiteRow'";
$result=mysqli_query($con,$sql);
if($result)
{
    echo"<script type='text/javascript'>
    alert('Deleted Sucessfully');
    window.location.href='../save_password.php';
    </script>"; 
}
?>
