<?php
  $nolog=1;
  include_once("includes/main.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<TITLE>LiveVideoChat - Forgot your passwrd</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<script language="JavaScript" src="js/validation.js"></script>
<LINK HREF="styles.css" REL="stylesheet" TYPE="text/css">
<SCRIPT LANGUAGE="JavaScript" TYPE="text/JavaScript">

function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}

</SCRIPT>

</HEAD>

<BODY BGCOLOR="#CCCCCC">
<script language="javascript">
function valida()
{
 
}
</script>
<FORM name="form1" method="post" action="forgot1.php" ENCTYPE="multipart/form-data">
<TABLE WIDTH="766" BORDER="0" ALIGN="center" CELLPADDING="0" CELLSPACING="0">
  <TR>
    <TD ALIGN="left" VALIGN="top"><TABLE WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="0">
        <TR>
          <TD ALIGN="left" VALIGN="top"><TABLE WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="0">
              <TR> 
                <TD WIDTH="283" ROWSPAN="2" ALIGN="left" VALIGN="top"><IMG SRC="images/int_top_left.jpg" WIDTH="283" HEIGHT="141"></TD>
                <TD WIDTH="326" ALIGN="left" VALIGN="top"><IMG SRC="images/int_top_center.jpg" WIDTH="326" HEIGHT="96"></TD>
                <TD ROWSPAN="2" ALIGN="left" VALIGN="top"><IMG SRC="images/int_top_right.jpg" WIDTH="157" HEIGHT="141"></TD>
              </TR>
              <TR> 
                <TD HEIGHT="45" ALIGN="left" VALIGN="middle" BACKGROUND="images/bkg_red.gif" BGCOLOR="#FFFFFF" CLASS="LinkWhosonline"> 
                  <TABLE WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="0">
                    <TR> 
                      <TD WIDTH="26"><IMG SRC="images/tab_left.jpg" WIDTH="26" HEIGHT="36"></TD>
                      <TD CLASS="user"><DIV ALIGN="center"><SPAN CLASS="user">FORGOT YOUR PASSWORD</SPAN></DIV></TD>
                      <TD WIDTH="26"><IMG SRC="images/tab_right.jpg" WIDTH="26" HEIGHT="36"></TD>
                    </TR>
                    <TR BGCOLOR="#CC0000"> 
                      <TD COLSPAN="3"><IMG SRC="images/red.gif" WIDTH="9" HEIGHT="9"></TD>
                    </TR>
                  </TABLE> </TD>
              </TR>
            </TABLE></TD>
        </TR>
        <TR>
          <TD>
		    <TABLE WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="0">
              <TR>
                <TD ALIGN="left" VALIGN="top" BACKGROUND="images/bg_big.jpg">
				  <TABLE WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="0">
                    <TR>
                      <TD ALIGN="left" VALIGN="top">
					    <TABLE WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="0">
                          <TR>
                            <TD>&nbsp;</TD>
                          </TR>
                          <TR>
                            <TD VALIGN="top">
							  <TABLE WIDTH="100%"  BORDER="0" CELLSPACING="0" CELLPADDING="5">
							    <TR>
								  <TD>
								    <DIV ALIGN="CENTER">
        
									</DIV>
									<!-- table -->
		<?php
		if(!isset($error))
		{
		?>
		<TABLE WIDTH="100%"  BORDER="0" ALIGN="CENTER" CELLPADDING="5" CELLSPACING="0">		  
          <TR>
            <TD colspan="2" CLASS="form">
			  <DIV ALIGN="center">Please, fill your data to retrieve the password </DIV>
			</TD>
          </TR>
		  <TR>
            <TD width="40%" CLASS="form"><DIV ALIGN="RIGHT">Username:</DIV></TD>
            <TD><INPUT NAME="tusername" TYPE="text" CLASS="fields" SIZE="40" value="<?=$tusername?>"></TD>
          </TR>
		  <TR>
            <TD CLASS="form"><DIV ALIGN="RIGHT">E-mail:</DIV></TD>
            <TD><INPUT NAME="tmail" TYPE="text" CLASS="fields" SIZE="40" value="<?=$tmail?>"></TD>
          </TR>
          <TR>
            <TD COLSPAN="2">
			<DIV ALIGN="CENTER"></DIV>
			<DIV ALIGN="CENTER">
              <TABLE  BORDER="0" CELLSPACING="0" CELLPADDING="15">
                <TR>
                  <TD>
				    <DIV ALIGN="CENTER">
					  <INPUT NAME="Submit2" TYPE="submit" CLASS="boton"  VALUE="Send E-mail" >
					  &nbsp;&nbsp;
					  <input name="cancel" type="button" class="boton" value="Cancel" onClick="self.location='index.html';">
					</DIV>
				  </TD>
                </TR>
              </TABLE>
            </DIV>
			</TD>
          </TR>
      </TABLE>
	  <?php
	  }
	  ?>
	  	<?php
		if(isset($error)&&($error==1))
		{
		?>
		<TABLE WIDTH="100%"  BORDER="0" ALIGN="CENTER" CELLPADDING="5" CELLSPACING="0">		  
          <TR>
            <TD colspan="2" CLASS="form">
			  <DIV ALIGN="center">Please, check your username and E-mail and fill your data to retrieve the password </DIV>
			</TD>
          </TR>
		  <TR>
            <TD width="40%" CLASS="form"><DIV ALIGN="RIGHT">Username:</DIV></TD>
            <TD><INPUT NAME="tusername" TYPE="text" CLASS="fields" SIZE="40" value="<?=$tusername?>"></TD>
          </TR>
		  <TR>
            <TD CLASS="form"><DIV ALIGN="RIGHT">E-mail:</DIV></TD>
            <TD><INPUT NAME="tmail" TYPE="text" CLASS="fields" SIZE="40" value="<?=$tmail?>"></TD>
          </TR>
          <TR>
            <TD COLSPAN="2">
			<DIV ALIGN="CENTER"></DIV>
			<DIV ALIGN="CENTER">
              <TABLE  BORDER="0" CELLSPACING="0" CELLPADDING="15">
                <TR>
                  <TD>
				    <DIV ALIGN="CENTER">
					  <INPUT NAME="Submit2" TYPE="submit" CLASS="boton"  VALUE="Send E-mail" >
					  &nbsp;&nbsp;
					  <input name="cancel" type="button" class="boton" value="Cancel" onClick="self.location='index.html?nolog=1';">
					</DIV>
				  </TD>
                </TR>
              </TABLE>
            </DIV>
			</TD>
          </TR>
      </TABLE>
	  <?php
	  }
	  ?>
	  	<?php
		if(isset($error)&&($error==0))
		{
		?>
		<TABLE WIDTH="100%"  BORDER="0" ALIGN="CENTER" CELLPADDING="5" CELLSPACING="0">		  
          <TR>
            <TD colspan="2" CLASS="form">
			  <DIV ALIGN="center">
			    <br>
				<?=$tusername?>, your password has been send to e-mail: <?=$tmail?> .<br>
				<a href="index.html?nolog=1">Click here to continue</a>
			  </DIV>
			</TD>
          </TR>          
      </TABLE>
	  <?php
	  }
	  ?>
	  <!-- table -->
	</TD>
  </TR>
</TABLE></TD>
                          </TR>
                        </TABLE></TD>
                    </TR>
                  </TABLE></TD>
              </TR>
              <TR>
                <TD BACKGROUND="images/bg_big.jpg"><TABLE WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="0">
                    <TR>
                      <TD WIDTH="42" ALIGN="left" VALIGN="top"><IMG SRC="images/bottom_left.jpg" WIDTH="42" HEIGHT="38"></TD>
                      <TD BACKGROUND="images/bottom_bg.jpg">&nbsp;</TD>
                      <TD WIDTH="42" ALIGN="right" VALIGN="top"><IMG SRC="images/bottom_right.jpg" WIDTH="42" HEIGHT="38"></TD>
                    </TR>
                  </TABLE></TD>
              </TR>
            </TABLE></TD>
        </TR>
      </TABLE></TD>
  </TR>
</TABLE>
<P ALIGN="CENTER"><SPAN CLASS="copyright">Copyright 2005 (c) LiveVideoChat</SPAN></P>
</FORM>
</BODY>
</HTML>
