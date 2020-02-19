<?php
  session_start();
  include_once("includes/main.php");
  
  include_once("class/contactxuser.php");
  $ocontact=new contactxuser($conn);
  
  $ocontact->blockunblock($contact,$state);
  header("location:favorites.php");
?>