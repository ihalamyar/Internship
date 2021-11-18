<?php
session_start();
unset($_SESSION['loggedin']);  
unset($_SESSION['user_email']);  
unset($_SESSION['user_id']);  
unset($_SESSION['user_role_id']);  
// session_destroy(); 
header("Location: /");