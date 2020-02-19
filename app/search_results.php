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
<TITLE>LiveVideoChat - Search Results</TITLE>
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
      <P ALIGN="CENTER" CLASS="TTLinteriores">SEARCH RESULTS</P>
      <TABLE  BORDER="0" ALIGN="CENTER" CELLPADDING="5" CELLSPACING="0">
		<!-- -->
		<?php
		  include_once("class/user.php");
		  $ouser=new user($conn);		  
		  $result=$ouser->searchContact2chat($sUser,$tname,$tnick,$tmail,$rgender,$agefrom,$ageto,$country,$tzipcode,$tinterest);
		  if($result==0)
		  {
		    echo "<tr><td>Your search did not match any members</td><tr>";
		  }
		  else
		  {
		    for($i=0;$i<count($result);$i++)
			{
			  echo($ouser->searchHtmlUser($result[$i]));
			}
		  }	
		?>        
		<!--
		<TR>
          <TD>
		    <TABLE  BORDER="0" ALIGN="CENTER" CELLPADDING="3" CELLSPACING="0">
              <TR>
                <TD WIDTH="60" ROWSPAN="3">
				  <DIV ALIGN="CENTER"><IMG SRC="images/user.jpg" WIDTH="40" HEIGHT="48"></DIV>
                  <DIV ALIGN="CENTER"></DIV>
                  <DIV ALIGN="CENTER"></DIV>
				</TD>
                <TD WIDTH="100" CLASS="form">
				  <DIV ALIGN="RIGHT">Full Name:</DIV>
				</TD>
                <TD WIDTH="100%" CLASS="user">Cristina Larrea</TD>
              </TR>
              <TR>
                <TD WIDTH="100" CLASS="form">
				  <DIV ALIGN="RIGHT">Nickname:</DIV>
				</TD>
                <TD CLASS="TxtDescripciones">clarrea</TD>
              </TR>
              <TR>
                <TD>
				  <DIV ALIGN="RIGHT" CLASS="form">Country:</DIV>
				</TD>
                <TD CLASS="TxtDescripciones">Ecuador</TD>
              </TR>
              <TR>
                <TD>&nbsp;</TD>
                <TD>&nbsp;</TD>
                <TD><A HREF="confirmation_authorization.html" CLASS="LinkWhosonline">Send an authorization request to chat with this user</A>.</TD>
              </TR>
            </TABLE>
		  </TD>
        </TR>
        <TR>
          <TD><DIV ALIGN="CENTER"><IMG SRC="images/red.gif" WIDTH="400" HEIGHT="1"></DIV></TD>
        </TR>
		-->
		<!-- -->        
      </TABLE>
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
