<?php
  session_start();
  $nolog=1;
  include("includes/main.php");
  
  include_once("class/user.php");
  $ouser=new user($conn);
  
  $res=$ouser->forgotPassword($tusername,$tmail);
  
  if($res=="0")
  {
  	$cadVar="?nolog=1&error=1&tusername=".$tusername."&tmail=".$tmail;
  	$destino="location:forgot.php".$cadVar;
  }
  else 
  {
  	$cadVar="?nolog=1&error=0&tusername=".$tusername."&tmail=".$tmail;
  	$destino="location:forgot.php".$cadVar;
  }
  header($destino);
?>