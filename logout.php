<?php
session_start();
session_destroy();
setcookie("access","",time-3600);
header("Location:home.php");
?>