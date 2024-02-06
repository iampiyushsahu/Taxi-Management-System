<?php
session_start();

// $_SESSION['a'];
session_destroy();

 header('location:home.php');


?>