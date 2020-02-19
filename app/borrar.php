<?
  session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<script language="javascript">
//otra prueba
function onBUnload ()
{
  var oEvent = window.event; // DOMEvent();

  // Si no se usa la botonera del browser 
  if ( oEvent.clientY > 0 )
  {
    alert("oEvent.clientY > 0");
	return (true);
  }	
  else
    return (false);	

  oEvent.returnValue = "Puede perder las modificaciones que no haya guardado.";
}
//fin otra prueba

function cerrar()
{
  alert("vas a cerrar");
  <?php
  /*
    include_once("includes/main.php");
    //genera estado online
    include_once("class/status.php");
    $ostatus=new status($conn);
    include_once("class/statusxuser.php");
    $ostaxuser=new statusxuser($conn);
    $ostaxuser->crearoactualizar($sUser,$ostatus->offline());
    //fin genera estado
  
    session_unregister("sUser");
  */	
  ?>
}
</script>
<body onunLoad="cerrar();">
sUser: <?=$sUser?>
<a href="borrarini.php">Atrás</a>
<a href="javascript:lockU=0;self.close()">Close This</a>
</body>
</html>
