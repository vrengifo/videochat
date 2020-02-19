<?php
  session_start();
  include_once("includes/main.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML><!-- InstanceBegin template="/Templates/pagina_interior.dwt" codeOutsideHTMLIsLocked="false" -->
<HEAD>
<!-- InstanceBeginEditable name="doctitle" -->
<TITLE>LiveVideoChat - Upgrade your plan</TITLE>
<!-- InstanceEndEditable --><META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<LINK HREF="styles.css" REL="stylesheet" TYPE="text/css">
<!-- InstanceBeginEditable name="head" -->
<SCRIPT LANGUAGE="JavaScript" TYPE="text/JavaScript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</SCRIPT>
<!-- InstanceEndEditable -->
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
                      <TD CLASS="user"><DIV ALIGN="center">WELCOME <?=$cuser->user_nickname?></DIV></TD>
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
                      <TD WIDTH="151" VALIGN="TOP"><TABLE WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="0">
                          <TR> 
                            <TD><IMG SRC="images/mycontactstab.jpg" WIDTH="151" HEIGHT="25"></TD>
                          </TR>
                          <TR> 
                            <TD BACKGROUND="images/lat_bg.jpg"><!-- #BeginLibraryItem "/Library/contact_list.lbi" -->
						<TABLE  BORDER="0" CELLPADDING="4" CELLSPACING="0">
                              <?php
								include_once("class/contactxuser.php");
								include_once("class/group.php");								
								$ocontact=new contactxuser($conn);
								$arr=$ocontact->groupbyuserObj($sUser);
								if($arr==0)
								{
								?>
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
								<?
								}
								else
								{  
								  for($i=0;$i<count($arr);$i++)
								  {
								    //antes: echo($ocontact->mycontactHtml($sUser,$arr[$i]));
									//con grupo
									echo($ocontact->groupbyuserHtml($sUser,$arr[$i]));
									
								  }	
								}  
							  ?>
                            </TABLE><!-- #EndLibraryItem --></TD>
                          </TR>
                          <TR>
                            <TD BACKGROUND="images/lat_bottom_line.jpg"><IMG SRC="images/separate.gif" WIDTH="8" HEIGHT="8"></TD>
                          </TR>
                          <TR>
                            <TD BACKGROUND="images/lat_bg.jpg">
							  <TABLE BORDER="0" CELLSPACING="0" CELLPADDING="5">
                                <TR>
                                  <TD><IMG SRC="images/icon_add.gif" WIDTH="21" HEIGHT="19"></TD>
                                  <TD><A HREF="add_contact.php" CLASS="LinkWhosonline">Add Contacts</A></TD>
                                </TR>
                              </TABLE>
						    </TD>
                          </TR>
						  <TR>
                            <TD BACKGROUND="images/lat_bg.jpg">
							  <TABLE BORDER="0" CELLSPACING="0" CELLPADDING="5">
                                <TR>
                                  <TD><IMG SRC="images/icon_grp.gif" WIDTH="21" HEIGHT="19"></TD>
                                  <TD><A HREF="group.php" CLASS="LinkWhosonline">My Groups</A></TD>
                                </TR>
                              </TABLE>
						    </TD>
                          </TR>
                          <TR>
                            <TD BACKGROUND="images/lat_bottom_line.jpg"><IMG SRC="images/separate.gif" WIDTH="8" HEIGHT="8"></TD>
                          </TR>
                          <TR> 
                            <TD HEIGHT="25"><A HREF="search.php"><IMG SRC="images/btn_search_int.gif" WIDTH="151" HEIGHT="25" BORDER="0"></A></TD>
                          </TR>
                      </TABLE></TD>
                      <TD ALIGN="left" VALIGN="top"><TABLE WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="0">
                          <TR>
                            <TD><TABLE WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="0">
                                <TR>
                                  <TD BACKGROUND="images/red_line_bg.jpg"><!-- #BeginLibraryItem "/Library/menu_superior.lbi" --><?php
  session_start();
  include_once("includes/main.php");
?>
<?php
  include_once("class/user.php");
  $ou=new user($conn);
  $ou->info($sUser);
  include_once("class/plan.php");
  $oplan=new plan($conn);
  $oplan->info($ou->plan_id);
  $url=$oplan->plan_url.'?appInstance='.$ou->user_instance.'&username='.$ou->user_nickname;
  $cadurl=' onClick="MM_openBrWindow(\''.$url.'\',\'video'.$oplan->plan_nboxes.'\',\''.$oplan->plan_urlfeatures.'\')"';
?>

<script LANGUAGE="JavaScript" TYPE="text/JavaScript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
</script>
								  <TABLE WIDTH="100%" BORDER="0" ALIGN="center" CELLPADDING="0" CELLSPACING="0">
                                      <TR ALIGN="center">
                                        <TD NOWRAP>
										
										  <A HREF="#" <?=$cadurl?> CLASS="linkstop">
										    MY ROOM
										  </A>
										</TD> 
                                        <TD NOWRAP><A HREF="profile.php" CLASS="linkstop">MY 
                                          PROFILE</A></TD>
                                        <TD NOWRAP><A HREF="favorites.php" CLASS="linkstop">MY 
                                          CONTACTS</A></TD>
                                        <TD NOWRAP><A HREF="invite.php" CLASS="linkstop">INVITE 
                                          FRIENDS</A></TD>
                                        <TD NOWRAP><A HREF="requests.php" CLASS="linkstop">AUTHORIZE 
                                          REQUESTS</A></TD>
                                        <TD NOWRAP><A HREF="logout.php" CLASS="linkstop">LOGOUT</A></TD>
                                      </TR>
                                  </TABLE>
<!-- #EndLibraryItem --></TD>
                                  <TD WIDTH="6" ALIGN="right" VALIGN="top"><IMG SRC="images/bg_redline_lat.jpg" WIDTH="6" HEIGHT="25"></TD>
                                </TR>
                              </TABLE></TD>
                          </TR>
                          <TR>
                            <TD VALIGN="top">
<TABLE WIDTH="100%"  BORDER="0" CELLSPACING="0" CELLPADDING="5">
  <TR>
    <TD><!-- InstanceBeginEditable name="Contenido" -->
      <DIV ALIGN="CENTER">
        <P CLASS="TTLinteriores">UPGRADE YOUR PLAN</P>
        </DIV>
      <TABLE WIDTH="100%"  BORDER="0" ALIGN="CENTER" CELLPADDING="5" CELLSPACING="0">
        <FORM method="post" name="form1" action="upgrade1.php">
		<?php
		  include_once("class/user.php");
		  $ouser=new user($conn);
		  $ouser->info($sUser);
		?>
        <TR>
          <TD WIDTH="120" CLASS="form"><DIV ALIGN="RIGHT">Full Name:</DIV></TD>
          <TD CLASS="TxtDescripciones"><?=$ouser->user_name?></TD>
        </TR>
        <TR>
          <TD CLASS="form"><DIV ALIGN="RIGHT">Nickname:</DIV></TD>
          <TD><SPAN CLASS="TxtDescripciones"><?=$ouser->user_nickname?></SPAN></TD>
        </TR>
        <TR>
          <TD CLASS="form"><DIV ALIGN="RIGHT">Gender:</DIV></TD>
          <TD>
		    <SPAN CLASS="TxtDescripciones">
			  <?php
			    include_once("class/sex.php");
			    $osex=new sex();
			    $osex->info($ouser->sex_id);
			  ?>
			  <?=$osex->sex_name?>
			</SPAN>
		  </TD>
        </TR>
        <TR>
          <TD CLASS="form"><DIV ALIGN="RIGHT">Age:</DIV></TD>
          <TD><SPAN CLASS="TxtDescripciones"><?=$ouser->user_age?></SPAN></TD>
        </TR>
        <TR>
          <TD CLASS="form">
		    <DIV ALIGN="RIGHT">Marital Status:</DIV></TD>
          <TD CLASS="TxtDescripciones">
		    <?php
			    include_once("class/maritalStatus.php");
			    $oms=new maritalStatus();
			    $oms->info($ouser->marsta_id);
			  ?>
			  <?=$oms->marsta_name?>
		  </TD>
        </TR>
        <TR>
          <TD CLASS="form"><DIV ALIGN="RIGHT">Country:</DIV></TD>
          <TD>
		    <SPAN CLASS="TxtDescripciones">
			  <?php
			    include_once("class/country.php");
			    $ocountry=new country($conn);
			    $ocountry->info($ouser->cou_id);
			  ?>
			  <?=$ocountry->cou_name?>
			</SPAN>
		  </TD>
        </TR>
        <TR>
          <TD CLASS="form"><DIV ALIGN="RIGHT">State:</DIV></TD>
          <TD CLASS="TxtDescripciones"><?=$ouser->user_state?></TD>
        </TR>
        <TR>
          <TD CLASS="form"><DIV ALIGN="RIGHT">City:</DIV></TD>
          <TD CLASS="TxtDescripciones"><?=$ouser->user_city?></TD>
        </TR>
        <TR>
          <TD VALIGN="TOP" CLASS="form"><DIV ALIGN="RIGHT">Service plan:            </DIV></TD>
          <TD>
		    <?php
			    include_once("class/plan.php");
				$oplan=new plan($conn);
				echo($oplan->htmlRadio("rplan",$ouser->plan_id,"fields"));
			?>
		  </TD>
        </TR>
        <!-- bill  -->
		<!--
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
		<!--  -->
        <TR>
          <TD COLSPAN="2"><DIV ALIGN="CENTER"></DIV>            <DIV ALIGN="CENTER">
            <TABLE  BORDER="0" CELLSPACING="0" CELLPADDING="15">
              <TR>
                <TD><DIV ALIGN="CENTER">
                  <INPUT NAME="upgradeplan" TYPE="submit" CLASS="boton" VALUE="Upgrade my Plan">
				  &nbsp;&nbsp;
				  <INPUT NAME="cancel" TYPE="button" CLASS="boton" onClick="self.location='profile.php';" VALUE="Cancel">
</DIV></TD>
                </TR>
            </TABLE>
          </DIV></TD>
          </TR>
      </FORM></TABLE>
    <!-- InstanceEndEditable --></TD>
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
<!-- InstanceEnd --></HTML>
