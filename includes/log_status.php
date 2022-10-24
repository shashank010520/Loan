<?php session_start();

if(!isset($_SESSION['user_email']))
{
    echo "<script>location.href='index.php';</script>";
}
?>
<?php include('includes/connection.php')?>