<?php
  session_start();
  include("includes/main.php");
  
  //$conn->debug=1;
  
  include_once("class/authrequestxuser.php");
  $oauth=new authrequestxuser($conn);
  
  $res=$oauth->allowdeny($vto,$sUser,$aord);
  
  //if($res==0)
  if(!$res)
  {
  	$destino="location:confirmation_request.php?error=1";
  }
  else
  {
    $destino="location:confirmation_request.php";
  }
  if($conn->debug==1)
    echo "<br>$destino";

  header($destino);
?>