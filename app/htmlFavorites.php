<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
      <P ALIGN="CENTER" CLASS="TTLinteriores">MY CONTACTS</P>
	  <TABLE  BORDER="0" ALIGN="CENTER" CELLPADDING="5" CELLSPACING="0">
		<?php
		  include_once("class/contactxuser.php");
		  include_once("class/user.php");
		  
		  $ocontact=new contactxuser($conn);
		  
		  $arrContact=$ocontact->contactbyuserId($sUser);
		  //echo "<hr>count: ".count($arrUser)." <hr>";
		  for($i=0;$i<count($arrContact);$i++)
		  {
		    echo($ocontact->favoritesHtml($sUser,$arrContact[$i]));
		  }
		?>
      </TABLE>
	</TD>
  </TR>
</TABLE>
</body>
</html>
