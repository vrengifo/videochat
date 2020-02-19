<?php
  session_start();
  include("includes/main.php");
  
  include_once("class/contactxuser.php");
  $ogrp=new group($conn);
  
  $ogrp->group_name=$tgrp;
  $ogrp->group_public="0";
  $ogrp->user_id=$sUser;
    
  $resAdd=$ogrp->add();
  if($resAdd!=0)
  {
    $destino="location:group.php";
  }
  else
  {
    $destino="location:group.php?error=1";
  }  
  header($destino);
?>