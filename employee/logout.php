<?php

session_start();
if (isset($_SESSION['employee'])) {
    unset($_SESSION['employee']); 
    header("location: ../index.php");
    exit;
}
?>
