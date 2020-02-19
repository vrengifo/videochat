<?php
  session_start();
  include("includes/main.php");
  
  include_once("class/user.php");
  $ouser=new user($conn);
  
    //$ouser->user_name=$tfullname;
    $ouser->user_firstname=$tfirstname;
    $ouser->user_lastname=$tlastname;
    $ouser->user_nickname=$tnick;
    $ouser->sex_id=$rgender;
    $ouser->user_age=$tage;
    $ouser->marsta_id=$marital;
    $ouser->cou_id=$country;
    $ouser->user_state=$tstate;
    $ouser->user_city=$tcity;
    $ouser->user_zipcode=$tzipcode;
    
    $ouser->user_public=$rpublic;
    
    $resUpdUser=$ouser->updateProfile($sUser);
    if($resUpdUser)
    {
      $destino="location:confirmation_profile.php";
    }
    else
    {
      //variables forma profile
  	  $cadVar="tfirstname=$tfirstname&tlastname=$tlastname&tnick=$tnick&rgender=$rgender"
  		  ."&tage=$tage&marital=$marital&country=$country&tstate=$tstate"
  		  ."&tcity=$tcity&tzipcode=$tzipcode&rpublic=$rpublic";
      $destino="location:profile.php".$cadVar;
    }
    
  header($destino);
?>