<?php
  session_start();
  $nolog=1;  
  include_once("includes/main.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<HTML>
<HEAD>
<TITLE>Untitled Document</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<STYLE TYPE="text/css">
<!--
body {
	margin-left: 2px;
	margin-top: 2px;
	margin-right: 2px;
	margin-bottom: 2px;

}
-->
</STYLE>
<LINK HREF="styles.css" REL="stylesheet" TYPE="text/css">
</HEAD>

<BODY>
<TABLE  BORDER="0" CELLPADDING="3" CELLSPACING="0">
  <?php
	include_once("class/status.php");
	$osta=new status($conn);
	
	include_once("class/statusxuser.php");
	$ostause=new statusxuser($conn);
	
	include_once("class/contactxuser.php");								
	$ocontact=new contactxuser($conn);
	
	$arr=$ostause->userbystatus($osta->online());	
	if($arr!=0)
	{
	  for($i=0;$i<count($arr);$i++)
	  {
	    echo($ocontact->mycontactHtml($sUser,$arr[$i],0));
	  }	
	}
  ?>
  <!--
  <TR>
    <TD WIDTH="16"><IMG SRC="images/icon_online.gif" WIDTH="16" HEIGHT="16"></TD>
    <TD><A HREF="#" CLASS="LinkWhosonline">Prueba</A></TD>
  </TR>
  <TR>
    <TD WIDTH="16"><IMG SRC="images/icon_online.gif" WIDTH="16" HEIGHT="16"></TD>
    <TD><A HREF="#" CLASS="LinkWhosonline">Cristina</A></TD>
  </TR>
  <TR>
    <TD><IMG SRC="images/icon_offline.gif" WIDTH="16" HEIGHT="16"></TD>
    <TD><A HREF="#" CLASS="LinkWhosonline">Barahondas</A></TD>
  </TR>
  <TR>
    <TD><IMG SRC="images/icon_waiting.gif" WIDTH="16" HEIGHT="16"></TD>
    <TD><A HREF="#" CLASS="LinkWhosonline">Pablo C </A></TD>
  </TR>
  <TR>
    <TD><IMG SRC="images/icon_blocked.gif" WIDTH="16" HEIGHT="16"></TD>
    <TD><A HREF="#" CLASS="LinkWhosonline">Paul Gilbert </A></TD>
  </TR>
  <TR>
    <TD><IMG SRC="images/icon_online.gif" WIDTH="16" HEIGHT="16"></TD>
    <TD><A HREF="#" CLASS="LinkWhosonline">Cristina</A></TD>
  </TR>
  <TR>
    <TD><IMG SRC="images/icon_waiting.gif" WIDTH="16" HEIGHT="16"></TD>
    <TD><A HREF="#" CLASS="LinkWhosonline">Pablo C </A></TD>
  </TR>
  <TR>
    <TD><IMG SRC="images/icon_blocked.gif" WIDTH="16" HEIGHT="16"></TD>
    <TD><A HREF="#" CLASS="LinkWhosonline">Paul Gilbert </A></TD>
  </TR>
  <TR>
    <TD><IMG SRC="images/icon_online.gif" WIDTH="16" HEIGHT="16"></TD>
    <TD><A HREF="#" CLASS="LinkWhosonline">Cristina</A></TD>
  </TR>
  <TR>
    <TD><IMG SRC="images/icon_waiting.gif" WIDTH="16" HEIGHT="16"></TD>
    <TD><A HREF="#" CLASS="LinkWhosonline">Pablo C </A></TD>
  </TR>
  <TR>
    <TD><IMG SRC="images/icon_offline.gif" WIDTH="16" HEIGHT="16"></TD>
    <TD><A HREF="#" CLASS="LinkWhosonline">Barahondas</A></TD>
  </TR>
  -->
</TABLE>
</BODY>
</HTML>
