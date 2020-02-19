<?php
  session_start();
  include("includes/main.php");
  
  include_once("class/user.php");
  $ouser=new user($conn);
  
  $res=$ouser->searchContact($tusername,$tnick);
  
  if($res!="0")
  {
  	include_once("class/contactxuser.php");
    $ocontactuser=new contactxuser($conn);
    
    $ocontactuser->user_id=$sUser;
    $ocontactuser->contact_id=$res;
    
    $resAdd=$ocontactuser->add();
    
    $destino="location:favorites.php";
  }
  else
  {
  	$destino="location:add_contact.php?error=1&tusername=$tusername&tnick=$tnick";
  }  
  header($destino);
  
?>