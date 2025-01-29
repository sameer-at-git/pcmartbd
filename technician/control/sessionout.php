<?php
session_start();
if (session_destroy()) {
    header("Location: ../view/sign_up/technician_registration.php");
}
