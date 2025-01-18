<?php
session_start();
if (session_destroy()) {
    header("Location: ../../layout/login.php");
    exit;
}
?>