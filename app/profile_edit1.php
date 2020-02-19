<?php
  session_start();
  
  include("includes/main.php");
  
  include_once("class/user.php");
  $ouser=new user($conn);
  
  //password
  if($tpass==$tpass1)
  {
    $ouser->user_id=$sUser;
    $ouser->user_password=$tpass;
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
    $ouser->user_email=$tmail;
    $ouser->user_blog=$tblog;
    $ouser->user_interest=$tinterest;
    $ouser->plan_id=$rplan;
    
    //upload and save photo
	$abpath="photouser/";
	$sizelim = "yes"; //Tamaño limite ... yes or no
	$size = "2000000"; //tamaño en bytes ... 5 mb
	$archivo2Up=$foto_name;

	//checks if file exists
	if ($archivo2Up== "none") 
	{
	  $log= "No file selected for upload<br>";
    }
    else 
	{
	  $extension=substr($archivo2Up,strpos($archivo2Up,"."));
	  $namenewfile=$ouser->user_id.$extension;
	  $upfile=$pathUpload.$abpath.$namenewfile;//win
	  if(file_exists($upfile))
		unlink($upfile);//elimina el archivo para actualizar el nuevo
	  if (!copy($foto,$upfile))
	  {
		$ouser->user_photo="";
	  }
	  else
	  {
		$ouser->user_photo=$abpath.$namenewfile;
	  }
    }
    //end upload and save photo
    
    $resUpdUser=$ouser->update($sUser);
    if($resUpdUser)
    {
      $destino="location:profile.php";
    }
    else
    {
      //variables forma profile_edit
  	  $cadVar="tusername=$tusername&tfirstname=$tfirstname&tlastname=$tlastname&tnick=$tnick&rgender=$rgender"
  		  ."&tage=$tage&marital=$marital&country=$country&tstate=$tstate"
  		  ."&tcity=$tcity&tzipcode=$tzipcode&tmail=$tmail&rplan=$rplan"
  		  ."&tblog=$tblog&tinterest=$tinterest"
  		  ."&cc=$cc&ccname=$ccname&ccnumber=$ccnumber&ccexpmonth=$ccexpmonth"
  		  ."&ccexpyear=$ccexpyear&ccaddress=$ccaddress";
  	  $destino="location:profile_edit.php?".$cadVar;
    }
    
  }
  else
  {
  	//variables forma profile_edit
  	$cadVar="tusername=$tusername&tfirstname=$tfirstname&tlastname=$tlastname&tnick=$tnick&rgender=$rgender"
  		  ."&tage=$tage&marital=$marital&country=$country&tstate=$tstate"
  		  ."&tcity=$tcity&tzipcode=$tzipcode&tmail=$tmail&rplan=$rplan"
  		  ."&tblog=$tblog&tinterest=$tinterest"
  		  ."&cc=$cc&ccname=$ccname&ccnumber=$ccnumber&ccexpmonth=$ccexpmonth"
  		  ."&ccexpyear=$ccexpyear&ccaddress=$ccaddress";
  	$destino="location:profile_edit.php?".$cadVar;
  }
  
  header($destino);
?>