<?php
session_start();
session_unset();
session_destroy();
header('Location: /DA1_NHOM2/index.php'); 
exit();
?>
