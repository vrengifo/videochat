<?php
  session_start();
  include_once("includes/main.php");
  include_once("class/user.php");
  $cuser=new user($conn);
  $cuser->info($sUser);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML><!-- InstanceBegin template="/Templates/pagina_interior.dwt" codeOutsideHTMLIsLocked="false" -->
<HEAD>
<!-- InstanceBeginEditable name="doctitle" -->
<TITLE>LiveVideoChat</TITLE>
<!-- InstanceEndEditable --><META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<LINK HREF="styles.css" REL="stylesheet" TYPE="text/css">
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
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
      <TABLE WIDTH="100%"  BORDER="0" CELLSPACING="0" CELLPADDING="5">
	  <FORM name="form1" method="post" action="profile1.php">
	  <?php
	    include_once("class/user.php");
		$ouser=new user($conn);
		$ouser->info($sUser);
	  ?>
        <TR>
          <TD ROWSPAN="11"><DIV ALIGN="CENTER"><IMG SRC="<?=$ouser->user_photo?>" WIDTH="<?=$parameter->photo_width?>" HEIGHT="<?=$parameter->photo_height?>"></DIV></TD>
          <TD CLASS="form"><DIV ALIGN="RIGHT">First Name:</DIV></TD>
          <TD><INPUT NAME="tfirstname" TYPE="text" CLASS="fields" SIZE="40" value="<?=$ouser->user_firstname?>"></TD>
        </TR>
        <TR>
          <TD CLASS="form"><DIV ALIGN="RIGHT">Last Name:</DIV></TD>
          <TD><INPUT NAME="tlastname" TYPE="text" CLASS="fields" SIZE="40" value="<?=$ouser->user_lastname?>"></TD>
        </TR>
		<TR>
          <TD CLASS="form"><DIV ALIGN="RIGHT">Nickname:</DIV></TD>
          <TD><INPUT NAME="tnick" TYPE="text" CLASS="fields" SIZE="40" value="<?=$ouser->user_nickname?>"></TD>
        </TR>
        <TR>
          <TD CLASS="form"><DIV ALIGN="RIGHT">Gender:</DIV></TD>
          <TD>
		    <?php
			    include_once("class/sex.php");
				$osex=new sex();
				echo($osex->htmlRadio("rgender",$ouser->sex_id,"fields"));
			  ?>
		  </TD>
        </TR>
        <TR>
          <TD CLASS="form"><DIV ALIGN="RIGHT">Age:</DIV></TD>
          <TD><INPUT NAME="tage" TYPE="text" CLASS="fields" SIZE="40" value="<?=$ouser->user_age?>"></TD>
        </TR>
        <TR>
          <TD CLASS="form"><DIV ALIGN="RIGHT">Marital Status:</DIV></TD>
          <TD>
		    <?php
			    include_once("class/maritalStatus.php");
				$omarita=new maritalStatus();
				echo($omarita->htmlSelect("marital",$ouser->marsta_id,"fields"));
			  ?>
		  </TD>
        </TR>
        <TR>
          <TD CLASS="form"><DIV ALIGN="RIGHT">Country:</DIV></TD>
          <TD>
		    <?php
			    include_once("class/country.php");
				$ocountry=new country($conn);
				echo($ocountry->htmlSelect("country",$ouser->cou_id,"fields"));
			  ?>
		  </TD>
        </TR>
        <TR>
          <TD CLASS="form"><DIV ALIGN="RIGHT">State:</DIV></TD>
          <TD><INPUT NAME="tstate" TYPE="text" CLASS="fields" SIZE="40" value="<?=$ouser->user_state?>"></TD>
        </TR>
        <TR>
          <TD CLASS="form"><DIV ALIGN="RIGHT">City:</DIV></TD>
          <TD><INPUT NAME="tcity" TYPE="text" CLASS="fields" SIZE="40" value="<?=$ouser->user_city?>"></TD>
        </TR>
		<TR>
          <TD CLASS="form"><DIV ALIGN="RIGHT">Zip code:</DIV></TD>
          <TD><INPUT NAME="tzipcode" TYPE="text" CLASS="fields" SIZE="40" value="<?=$ouser->user_zipcode?>"></TD>
        </TR>
        <TR>
          <TD CLASS="form"><DIV ALIGN="RIGHT">Service plan:            </DIV></TD>
          <TD>
		    <SPAN CLASS="LinkWhosonline">
			  <?php
			    include_once("class/plan.php");
				$oplan=new plan($conn);
				$oplan->info($ouser->plan_id);
			  ?>
			  <?=$oplan->plan_name?>
			</SPAN>
			<INPUT NAME="Submit22" TYPE="button" CLASS="boton" VALUE="Upgrade"  onClick="self.location='upgrade.php';" >
		  </TD>
        </TR>
        <TR>
          <TD COLSPAN="2" CLASS="form">
		    <INPUT NAME="rpublic" TYPE="radio" VALUE="1" <?php
			if(($ouser->user_public=="1")||($rpublic=="1")||(!isset($rpublic)))
			  echo "checked";
			?>>
            All Users can see my profile 
		  </TD>
          <TD>&nbsp;</TD>
        </TR>
        <TR>
          <TD COLSPAN="2" CLASS="form">
		    <INPUT NAME="rpublic" TYPE="radio" VALUE="0" <?php
			if(($ouser->user_public=="0")||($rpublic=="0"))
			  echo "checked";
			?>>
            Only authorized users can see my profile
		  </TD>
          <TD>&nbsp;</TD>
        </TR>
        <TR>
          <TD COLSPAN="3"><DIV ALIGN="CENTER"></DIV>            <DIV ALIGN="CENTER">
            <TABLE  BORDER="0" CELLSPACING="0" CELLPADDING="15">
              <TR>
                <TD><DIV ALIGN="CENTER">
                  <INPUT NAME="savechanges" TYPE="submit" CLASS="boton" VALUE="Save changes">
</DIV></TD>
                <TD><DIV ALIGN="CENTER">
                  <INPUT NAME="Submit" TYPE="button" CLASS="boton" VALUE="Edit profile" onClick="self.location='profile_edit.php';">
                </DIV></TD>
                <TD><DIV ALIGN="CENTER">
                  <!--<INPUT NAME="Submit23" TYPE="submit" CLASS="boton" VALUE="Cancel">-->
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
