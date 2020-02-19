<?php
  session_start();
  
  if((!session_is_registered("sUser"))&&(!isset($nolog)))
    header("location:index.html");
  
  include_once("class/c_conecta.php");
  
  $tipo="MySQL";
  $server="localhost";
  $user="root";  
  $pass="";
  $db="videochat";
  
  $conn=new c_conecta($tipo,$server,$user,$pass,$db);
  //$pathUpload="/var/www/html/chatsite/";//linux
  $pathUpload="";//win
  
  include_once("class/parameter.php");
  $parameter=new parameter($conn);
  $parameter->info();
?>