<?php
  session_start();
  
  include("includes/main.php");
  
  include_once("class/user.php");
  $ouser=new user($conn);
  
  //password
  if($tpass==$tpass1)
  {
    $ouser->user_id=$tusername;
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
	//session_register("namefileinfo");
	//$namefileinfo=$prueba;
	//echo "abpath: $abpath<br> archivo: $archivo";
	//begin upload 1

	//checks if file exists
	if ($archivo2Up== "none") 
	{
	  $log= "No file selected for upload<br>";
    }
    else 
	{
	  $extension=substr($archivo2Up,strpos($archivo2Up,"."));
	  $namenewfile=$ouser->user_id.$extension;
	  $upfile=$pathUpload.$abpath.$namenewfile;
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
    
    $resAddUser=$ouser->add();
    if($resAddUser)
    {
      $destino="location:profile.php";
      $sUser=$ouser->user_id;
      $sNickname=$ouser->user_nickname;
      session_register("sUser");
      
      //genera estado online
  	  include_once("class/status.php");
  	  $ostatus=new status($conn);
  	  include_once("class/statusxuser.php");
  	  $ostaxuser=new statusxuser($conn);
  	  $ostaxuser->crearoactualizar($sUser,$ostatus->online());
  	  //fin genera estado
      
      //session_register("sNickname");
      
      /*      
      //add billinfo
      include_once("class/billxUser.php");
      $obill=new billxUser($conn);
      $obill->user_id=$ouser->user_id;
      $obill->cc_id=$cc;
      $obill->billuser_holdername=$ccname;
      $obill->billuser_number=$ccnumber;
      $obill->billuser_expmonth=$ccexpmonth;
      $obill->billuser_expyear=$ccexpyear;
      $obill->billuser_address=$ccaddress;
      
      $resAddBill=$obill->add();
      if(!$resAddBill)
      {
      	$ouser->del($ouser->user_id);
      	$flagError=1;
      }
      else
      {
      	$destino="location:profile.php";
      	$sUser=$ouser->user_id;
      	$sNickname=$ouser->user_nickname;
      	session_register("sUser");
      	session_register("sNickname");
      }
      */
    }
    else
    {
      $flagError=1;
    }
    
  }
  else
  {
  	$flagError=1;
  }
  if($flagError)
  {
  	//variables forma signup
  	$cadVar="tusername=$tusername&tfirstname=$tfirstname&tlastname=$tlastname&tnick=$tnick&rgender=$rgender"
  		  ."&tage=$tage&marital=$marital&country=$country&tstate=$tstate"
  		  ."&tcity=$tcity&tmail=$tmail&tblog=$tblog&rplan=$rplan"
  		  ."&tzipcode=$tzipcode&tinterest=$tinterest"
  		  ."&cc=$cc&ccname=$ccname&ccnumber=$ccnumber&ccexpmonth=$ccexpmonth"
  		  ."&ccexpyear=$ccexpyear&ccaddress=$ccaddress"  		  
  		  ."&nolog=1";
  	$destino="location:signup.php?".$cadVar;
  }
  header($destino);
?>