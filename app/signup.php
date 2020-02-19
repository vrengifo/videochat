<?php
  include_once("includes/main.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<TITLE>LiveVideoChat - New Member Registration</TITLE>
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
                      <TD CLASS="user"><DIV ALIGN="center"><SPAN CLASS="user">NEW MEMBER REGISTRATION</SPAN></DIV></TD>
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
          <TD><TABLE WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="0">
              <TR>
                <TD ALIGN="left" VALIGN="top" BACKGROUND="images/bg_big.jpg"><TABLE WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="0">
                    <TR>
                      <TD ALIGN="left" VALIGN="top"><TABLE WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="0">
                          <TR>
                            <TD>&nbsp;</TD>
                          </TR>
                          <TR>
                            <TD VALIGN="top">
<TABLE WIDTH="100%"  BORDER="0" CELLSPACING="0" CELLPADDING="5">
  <TR>
    <TD>        <DIV ALIGN="CENTER">
        </DIV>        <TABLE WIDTH="100%"  BORDER="0" ALIGN="CENTER" CELLPADDING="5" CELLSPACING="0">
          <FORM name="form1" method="post" action="signup1.php" ENCTYPE="multipart/form-data">
<script language="javascript">
function valida()
{
  vdefine('tusername', 'string', 'Username','1','20',document);
  vdefine('tfullname', 'string', 'Full name',1,200,document);
  vdefine('tnick', 'string', 'Nickname',1,100,document);
  vdefine('rgender', 'string', 'Gender',1,10,document);
  //vdefine('tage', 'num', 'Age',1,3,document);
  vdefine('marital', 'string', 'Marital Status',1,10,document);
  vdefine('tstate', 'string', 'State',1,200,document);
  vdefine('tcity', 'string', 'City',1,200,document);
  vdefine('tmail', 'email', 'E-mail',3,200,document);
  //vdefine('rplan', 'num', 'Service Plan',1,3,document);
  var respuesta;
  respuesta=validate();
  alert(respuesta);
  return(respuesta);
}

</script>		  
          <TR>
            <TD CLASS="form"><DIV ALIGN="RIGHT">Username:</DIV></TD>
            <TD><INPUT NAME="tusername" TYPE="text" CLASS="fields" SIZE="40" value="<?=$tusername?>"></TD>
          </TR>
          <TR>
            <TD CLASS="form"><DIV ALIGN="RIGHT">Password:</DIV></TD>
            <TD><INPUT NAME="tpass" TYPE="password" CLASS="fields" SIZE="40"></TD>
          </TR>
          <TR>
            <TD CLASS="form"><DIV ALIGN="RIGHT">Confirm Password:</DIV></TD>
            <TD><INPUT NAME="tpass1" TYPE="password" CLASS="fields" SIZE="40"></TD>
          </TR>
          <!--
		  <TR>
            <TD WIDTH="40%" CLASS="form"><DIV ALIGN="RIGHT">Full Name:</DIV></TD>
            <TD><INPUT NAME="tfullname" TYPE="text" CLASS="fields" SIZE="40" value="<?=$tfullname?>"></TD>
          </TR>
		  -->
		  <TR>
            <TD WIDTH="40%" CLASS="form"><DIV ALIGN="RIGHT">First Name:</DIV></TD>
            <TD><INPUT NAME="tfirstname" TYPE="text" CLASS="fields" SIZE="40" value="<?=$tfirstname?>"></TD>
          </TR>
		  <TR>
            <TD WIDTH="40%" CLASS="form"><DIV ALIGN="RIGHT">Last Name:</DIV></TD>
            <TD><INPUT NAME="tlastname" TYPE="text" CLASS="fields" SIZE="40" value="<?=$tlastname?>"></TD>
          </TR>
          <TR>
            <TD CLASS="form"><DIV ALIGN="RIGHT">Nickname:</DIV></TD>
            <TD><INPUT NAME="tnick" TYPE="text" CLASS="fields" SIZE="40" value="<?=$tnick?>"></TD>
          </TR>
          <TR>
            <TD CLASS="form"><DIV ALIGN="RIGHT">Gender:</DIV></TD>
            <TD>
			  <?php
			    include_once("class/sex.php");
				$osex=new sex();
				echo($osex->htmlRadio("rgender",$rgender,"fields"));
			  ?>
			</TD>
			  
          </TR>
          <TR>
            <TD CLASS="form"><DIV ALIGN="RIGHT">Age:</DIV></TD>
            <TD><INPUT NAME="tage" TYPE="text" CLASS="fields" SIZE="40" value="<?=$tage?>"></TD>
          </TR>
          <TR>
            <TD CLASS="form"><DIV ALIGN="RIGHT">Marital Status:</DIV></TD>
            <TD>
			  <?php
			    include_once("class/maritalStatus.php");
				$omarita=new maritalStatus();
				echo($omarita->htmlSelect("marital",$marital,"fields"));
			  ?>
			</TD>
          </TR>
          <TR>
            <TD CLASS="form"><DIV ALIGN="RIGHT">Country:</DIV></TD>
            <TD>
			  <?php
			    include_once("class/country.php");
				$ocountry=new country($conn);
				echo($ocountry->htmlSelect("country",$country,"fields"));
			  ?>
			</TD>
          </TR>
          <TR>
            <TD CLASS="form"><DIV ALIGN="RIGHT">State:</DIV></TD>
            <TD><INPUT NAME="tstate" TYPE="text" CLASS="fields" SIZE="40" value="<?=$tstate?>"></TD>
          </TR>
          <TR>
            <TD CLASS="form"><DIV ALIGN="RIGHT">City:</DIV></TD>
            <TD><INPUT NAME="tcity" TYPE="text" CLASS="fields" SIZE="40" value="<?=$tcity?>"></TD>
          </TR>
          <TR>
            <TD WIDTH="40%" CLASS="form"><DIV ALIGN="RIGHT">Zip code:</DIV></TD>
            <TD><INPUT NAME="tzipcode" TYPE="text" CLASS="fields" SIZE="40" value="<?=$tzipcode?>"></TD>
          </TR>
		  <TR>
            <TD CLASS="form"><DIV ALIGN="RIGHT">E-mail:</DIV></TD>
            <TD><INPUT NAME="tmail" TYPE="text" CLASS="fields" SIZE="40" value="<?=$tmail?>"></TD>
          </TR>
		  <TR>
            <TD CLASS="form"><DIV ALIGN="RIGHT">Url to my blog:</DIV></TD>
            <TD><INPUT NAME="tblog" TYPE="text" CLASS="fields" SIZE="40" value="<?=$tblog?>"></TD>
          </TR>
		  <TR>
            <TD WIDTH="40%" CLASS="form"><DIV ALIGN="RIGHT">Interest:</DIV></TD>
            <TD>			 
			 <textarea name="tinterest" cols="40" rows="5" CLASS="fields"><?=$tinterest?></textarea>
		    </TD>
          </TR>
          <TR>
            <TD CLASS="form"><DIV ALIGN="RIGHT">Upload Photo:</DIV></TD>
            <TD><INPUT NAME="foto" TYPE="file" CLASS="fields"></TD>
          </TR>
          <TR>
            <TD VALIGN="TOP" CLASS="form"><DIV ALIGN="RIGHT">Service plan:            </DIV></TD>
            <TD>
			  <?php
			    include_once("class/plan.php");
				$oplan=new plan($conn);
				if(isset($rplan))
				  $planselec=$rplan;
				else
				{
				  $planselec=$oplan->buscarxnbox($vb);
				}  
				echo($oplan->htmlRadio("rplan",$planselec,"fields"));
			  ?>
			</TD>
          </TR>
          <!-- -->
		  <!-- parte de bill
		  <TR>
            <TD VALIGN="TOP" CLASS="form">&nbsp;</TD>
            <TD CLASS="TTLinteriores">Billing Information </TD>
          </TR>
          <TR>
            <TD VALIGN="TOP" CLASS="form"><DIV ALIGN="RIGHT">Credit card </DIV></TD>
            <TD>
			  <?php
			    include_once("class/creditcard.php");
				$occ=new creditcard($conn);
				echo($occ->htmlSelect("cc",$cc,"fields"));
			  ?>
			</TD>
          </TR>
          <TR>
            <TD VALIGN="TOP" CLASS="form"><DIV ALIGN="RIGHT">Card Holder Name:</DIV></TD>
            <TD><INPUT NAME="ccname" TYPE="text" CLASS="fields" SIZE="40" value="<?=$ccname?>"></TD>
          </TR>
          <TR>
            <TD VALIGN="TOP" CLASS="form"><DIV ALIGN="RIGHT">Credit Card Number:</DIV></TD>
            <TD><INPUT NAME="ccnumber" TYPE="text" CLASS="fields" SIZE="40" value="<?=$ccnumber?>"></TD>
          </TR>
          <TR>
            <TD VALIGN="TOP" CLASS="form"><DIV ALIGN="RIGHT">Expiration Date </DIV></TD>
            <TD>
			  <?php
			    include_once("class/billxUser.php");
				$obill=new billxUser($conn);
				echo($obill->htmlSelectMonth("ccexpmonth",$ccexpmonth,"fields"));
				echo($obill->htmlSelectYear("ccexpyear",$ccexpyear,"fields"));
			  ?>
			</TD>
          </TR>
          <TR>
            <TD VALIGN="TOP" CLASS="form"><DIV ALIGN="RIGHT">Address:</DIV></TD>
            <TD><INPUT NAME="ccaddress" TYPE="text" CLASS="fields" SIZE="40" value="<?=$ccaddress?>"></TD>
          </TR>		  
		  -->
		  <!-- -->
          <TR>
            <TD COLSPAN="2">
			<DIV ALIGN="CENTER"></DIV>
			<DIV ALIGN="CENTER">
              <TABLE  BORDER="0" CELLSPACING="0" CELLPADDING="15">
                <TR>
                  <TD>
				    <DIV ALIGN="CENTER">
					  <INPUT NAME="Submit2" TYPE="submit" CLASS="boton"  VALUE="Create my Account" onclick="return valida();" >
					  &nbsp;&nbsp;
					  <input name="cancel" type="button" class="boton" value="Cancel" onClick="self.location='index.html';">
					</DIV>
				  </TD>
                </TR>
              </TABLE>
            </DIV>
			</TD>
          </TR>
        </FORM>
      </TABLE>
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
</BODY>
</HTML>
