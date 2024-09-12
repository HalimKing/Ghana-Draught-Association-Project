<?php  

  session_start();
  if(!isset($_SESSION["SESS_ROLE"]) && empty($_SESSION["SESS_ROLE"])){
    header("location: ../logout.php");
  }
  if($_SESSION["SESS_ROLE"] != 'User') {
 
    header("location: ../403.html");
  }




?>