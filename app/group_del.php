<?php
  session_start();
  include("includes/main.php");
  
  include_once("class/group.php");
  $ogrp=new group($conn);
  
  for($i=0;$i<$total;$i++)
  {
    if(isset($chkgrp[$i]))
    {
  	  $grpId=$chkgrp[$i];
  	  $ogrp->del($grpId,$sUser);
    }
  } 
  $destino="location:group.php";
  header($destino);
?>