<?php
if (!isset($_SESSION)) {
    session_start();
}
$_SESSION['svid'] = "220001";
if (!isset($_SESSION['svid'])) {
    echo "<script>alert('You are not logged in');</script>";
    header("Location: /login/login.php");
}