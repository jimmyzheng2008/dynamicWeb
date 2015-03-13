<?php
# Start session
session_start();

# Delete the username
unset($_SESSION['username']);

# or destroy session
//session_destroy();

# Redirection 
header('Location: login.php');
?>