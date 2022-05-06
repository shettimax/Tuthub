<?php
session_start();

session_unset();
unset($_SESSION["idx"]);
unset($_SESSION["id"]);
unset($_SESSION["walletid"]);
unset($_SESSION["name"]);
session_destroy($_SESSION['id']);
header("Location:log.php");
?>
