<?php
session_start();
if (session_destroy()) {
    header("Location: ../../layout/view/login.php");
    exit;
}
?>