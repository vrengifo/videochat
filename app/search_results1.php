<?php
  session_start();
  include_once("includes/main.php");
  include_once("class/authrequestxuser.php");
  
  $oauth=new authrequestxuser($conn);
  $res=$oauth->sendRequest($sUser,$vto,$tcomment);
  
  if($res)
    $msg="Your authorization request was succesfully sent, please wait until your contact accept your request. ";
  else 
    $msg="Error send your authorization request, try again";  
  
  $destino="location:confirmation_authorization.php?msg=".$msg;
  header($destino);
?>