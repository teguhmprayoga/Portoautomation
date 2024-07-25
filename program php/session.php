<?php
session_start();
if(!isset($_SESSION['id_peg'])){
    header("location:login.php");
}
?>
