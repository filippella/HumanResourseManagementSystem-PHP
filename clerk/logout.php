<?php

session_start();
if (isset($_SESSION['clerk'])) {
    unset($_SESSION['clerk']);
    header("location: index.php");
    exit;
}
?>
