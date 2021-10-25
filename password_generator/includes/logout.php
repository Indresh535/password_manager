<?php

session_start();
session_destroy();

echo"<script type='text/javascript'>
alert('LogedOut Sucessfully');
window.location.href='../../index.php';
</script>";
?>