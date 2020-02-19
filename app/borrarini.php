<?
  session_start();
  if(!session_is_registered("sUser"))
  {
    echo"prueba no está registrada <br>";
	$sUser="v";
	session_register("sUser");
  }  
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
estas en borrar1
<br>
sUser: <?=$sUser?>
<br>
<a href="borrar.php">vamos a borrar.php</a>
</body>
</html>
