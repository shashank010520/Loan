<?php
session_start();
unset($_SESSION['user_email']);
session_destroy();
echo "<script>location.href='index.php';</script>";
?>