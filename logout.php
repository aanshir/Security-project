<?php 

session_start();
session_destroy();
unset($_session['username']);
header("location: signin.php");

 ?>