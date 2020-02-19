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
<TITLE>LiveVideoChat - My Groups</TITLE>
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
    <?php
	  include_once("class/group.php");
	  $ogrp=new group($conn);
	  //$ogrp->con->debug=1;
	  $arrGroup=$ogrp->listPrivateGroup($sUser,"a");
	  //echo($ogrp->htmlSelect("tgrup",$tgrup,"fields",$sUser));
	?>
	<P ALIGN="CENTER" CLASS="TTLinteriores">My Groups </P>
    <P ALIGN="CENTER" CLASS="LinkWhosonline">Manage your own groups </P>
	    <FORM name="form1" method="post" action="group_add1.php">
	  <TABLE WIDTH="100%"  BORDER="1" CELLSPACING="0" CELLPADDING="5">
        <TR>
          <TD width="26%" CLASS="TTLinteriores">
		    <DIV ALIGN="center">New Group</DIV>
		  </TD>
          <TD width="47%" CLASS="TTLinteriores">
		    <input type="text" name="tgrp" value="<?=$tgrp?>" size="40">
		  </TD>
		  <TD width="27%" CLASS="TTLinteriores">
		    <DIV ALIGN="center"><input type="submit" name="addgrp" value="Add New Group" class="boton"></DIV>
		  </TD>
        </TR>
      </TABLE>
	</FORM>
    <FORM name="form2" method="post" action="group_del.php">
	  <TABLE WIDTH="100%"  BORDER="1" CELLSPACING="0" CELLPADDING="5">
        <TR>
          <TD CLASS="TTLinteriores" width="26%"><DIV ALIGN="center">Delete</DIV></TD>
          <TD CLASS="TTLinteriores" width="47%"><DIV ALIGN="center">Groups</DIV></TD>
		  <TD CLASS="TTLinteriores" width="27%"><DIV ALIGN="center">Contacts #</DIV></TD>
        </TR>
        <?php
          if($arrGroup==0)
          {
          	echo'<tr><td colspan="3" CLASS="TTLinteriores" align="center">Don\'t exist groups</td></tr>';
          }
          else 
          {
            $ndatos=count($arrGroup);
            echo'<input type="hidden" name="total" value="'.$ndatos.'" >';
            for($i=0;$i<$ndatos;$i++)
            {
              $ogrp->info($arrGroup[$i]);
              $ncontacts=$ogrp->ncontactxgroup($sUser,$ogrp->group_id);
        ?>
        <TR>
          <TD CLASS="form" align="center">
		    <input type="checkbox" name="chkgrp[<?=$i?>]" value="<?=$ogrp->group_id?>">
		  </TD>
          <TD CLASS="form">&nbsp<?=$ogrp->group_name?></TD>
		  <TD CLASS="form" align="center"><?=$ncontacts?></TD>
        </TR>
		<?php
            }
          }
		?>
		<TR>
          <TD COLSPAN="3">
		    <DIV ALIGN="CENTER">		    </DIV>            
		    <DIV ALIGN="CENTER">
              <TABLE  BORDER="0" CELLSPACING="0" CELLPADDING="15">
                <TR>
                  <TD colspan="3">
				    <DIV ALIGN="CENTER">
                      <INPUT NAME="delgroup" TYPE="submit" CLASS="boton" VALUE="Delete Checked Group(s)">
				    </DIV>
				  </TD>
                </TR>
              </TABLE>
			</DIV>
		  </TD>
        </TR>
      </TABLE>
	</FORM>
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
