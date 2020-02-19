<?php
  session_start();
  include("includes/main.php");
  
  include_once("class/user.php");
  $ouser=new user($conn);
  //echo "<hr>tuser: $tuser --- tpass: $tpass <hr>";
  $res=$ouser->login($tuser,$tpass);
  //echo "res: $res ";
  if($res!="0")
  {
  	//echo "res dif 0";
  	$sUser=$res;
  	session_register("sUser");
  	//genera estado online
  	include_once("class/status.php");
  	$ostatus=new status($conn);
  	include_once("class/statusxuser.php");
  	$ostaxuser=new statusxuser($conn);
  	$ostaxuser->crearoactualizar($sUser,$ostatus->online());
  	//fin genera estado
  	
  	header("location:favorites.php");
  }
  else
  {
  	//echo "res igual 0";
  	header("location:index.html?error=1");
  }  
?>