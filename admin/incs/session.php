<?php
session_start();
 
if($_SESSION["AUTH"] == false){
header("location: index.php");
}
?>