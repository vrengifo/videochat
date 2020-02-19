<?php
  //parametro contact que contiene el id del contacto
  session_start();
  include("includes/main.php");  
  
  include_once("class/user.php");
  $ouser=new user($conn);
  $ouser->info($uid);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<TITLE>LiveVideoChat - Contact Profile</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<LINK HREF="styles.css" REL="stylesheet" TYPE="text/css">

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
                      <TD CLASS="user"><DIV ALIGN="center"><SPAN CLASS="user"><?=$ouser->user_name?></SPAN></DIV></TD>
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
                            <TD VALIGN="top">
<TABLE WIDTH="100%"  BORDER="0" CELLSPACING="0" CELLPADDING="5">
  <TR>
    <TD>        <DIV ALIGN="CENTER">
          </DIV>        <TABLE WIDTH="100%"  BORDER="0" CELLSPACING="0" CELLPADDING="5">
          <FORM>
          <TR>
            <TD ROWSPAN="9"><DIV ALIGN="CENTER"><IMG SRC="<?=$ouser->user_photo?>" WIDTH="<?=$parameter->photo_width?>" HEIGHT="<?=$parameter->photo_height?>"></DIV></TD>
            <TD WIDTH="130" CLASS="form"><DIV ALIGN="RIGHT">Username:</DIV></TD>
            <TD CLASS="TxtDescripciones"><?=$ouser->user_id?></TD>
          </TR>
          <TR>
            <TD CLASS="form"><DIV ALIGN="RIGHT">Nickname:</DIV></TD>
            <TD><SPAN CLASS="TxtDescripciones"><?=$ouser->user_nickname?></SPAN></TD>
          </TR>
          <TR>
            <TD CLASS="form"><DIV ALIGN="RIGHT">Gender:</DIV></TD>
            <TD>
			  <?php
			  include_once("class/sex.php");
			  $osex=new sex();
			  $osex->info($ouser->sex_id);
			  ?>
			<?=$osex->sex_name?>
			</TD>
          </TR>
          <TR>
            <TD CLASS="form"><DIV ALIGN="RIGHT">Age:</DIV></TD>
            <TD><SPAN CLASS="TxtDescripciones"><?=$ouser->user_age?></SPAN></TD>
          </TR>
          <TR>
            <TD CLASS="form"><DIV ALIGN="RIGHT">Marital Status:</DIV></TD>
            <TD CLASS="TxtDescripciones">
			  <?php
			    include_once("class/maritalStatus.php");
				$omarita=new maritalStatus();
				$omarita->info($ouser->marsta_id);
				echo($omarita->marsta_name);
			  ?>
			</TD>
          </TR>
          <TR>
            <TD CLASS="form"><DIV ALIGN="RIGHT">Country:</DIV></TD>
            <TD>
			  <?php
			    include_once("class/country.php");
				$ocountry=new country($conn);
				$ocountry->info($ouser->cou_id);
				echo($ocountry->cou_name);
			  ?>
			</TD>
          </TR>
          <TR>
            <TD CLASS="form"><DIV ALIGN="RIGHT">State:</DIV></TD>
            <TD CLASS="TxtDescripciones">
			  <?=$ouser->user_state?>
			</TD>
          </TR>
          <TR>
            <TD CLASS="form"><DIV ALIGN="RIGHT">City:</DIV></TD>
            <TD CLASS="TxtDescripciones"><?=$ouser->user_city?></TD>
          </TR>
          <TR>
            <TD CLASS="form"><DIV ALIGN="RIGHT">E-mail:</DIV></TD>
            <TD><SPAN CLASS="TxtDescripciones"><?=$ouser->user_email?></SPAN></TD>
          </TR>
        </FORM>
        </TABLE></TD>
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
