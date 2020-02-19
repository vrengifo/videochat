<?php
  session_start();
  include("includes/main.php");
  
  include_once("class/contactxuser.php");
  $ocontactxuser=new contactxuser($conn);
  
  $ocontactxuser->updateGroup($idContact,$tgroup);
  
  $destino="location:favorites.php";
  
  header($destino);
?>