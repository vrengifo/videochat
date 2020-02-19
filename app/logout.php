<?
  session_start();
  include_once("includes/main.php");
  //genera estado online
  include_once("class/status.php");
  $ostatus=new status($conn);
  include_once("class/statusxuser.php");
  $ostaxuser=new statusxuser($conn);
  $ostaxuser->crearoactualizar($sUser,$ostatus->offline());
  //fin genera estado
  
  session_unregister("sUser");
  header("location:index.html");
?>