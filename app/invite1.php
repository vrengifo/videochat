<?php
  include_once("class/cMail.php");
  $subject="Livevideochat with ".$friendname;
  $texto="Hi <b>".$friendname."</b>\n\n".$yourmsg;
  $omail=new cMail($yourmail,$friendmail,$subject,$texto,$parameter->dominio);
  $omail->sendmail();
  header("location:confirmation.php");
?>