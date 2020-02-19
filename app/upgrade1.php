<?php
  session_start();
  
  include("includes/main.php");
  
  /*
  //add billinfo
  include_once("class/billxUser.php");
  $obill=new billxUser($conn);
  $obill->user_id=$sUser;
  $obill->cc_id=$cc;
  $obill->billuser_holdername=$ccname;
  $obill->billuser_number=$ccnumber;
  $obill->billuser_expmonth=$ccexpmonth;
  $obill->billuser_expyear=$ccexpyear;
  $obill->billuser_address=$ccaddress;
      
  $resAddBill=$obill->add();
  if(!$resAddBill)
  {
    //variables forma signup
  	$cadVar="rplan=$rplan"
  		  ."&cc=$cc&ccname=$ccname&ccnumber=$ccnumber&ccexpmonth=$ccexpmonth"
  		  ."&ccexpyear=$ccexpyear&ccaddress=$ccaddress";
  	$destino="location:upgrade.php?".$cadVar;
  }
  else
  {
    include_once("class/user.php");
    $ouser=new user($conn);
    $ouser->updatePlan($sUser,$rplan);
  	$destino="location:profile.php";
  }
  */
  include_once("class/user.php");
  $ouser=new user($conn);
  $ouser->updatePlan($sUser,$rplan);
  $destino="location:profile.php";
  	
  header($destino);
?>