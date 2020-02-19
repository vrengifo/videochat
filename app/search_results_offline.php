<?php
  session_start();
  $nolog=1;
  include_once("includes/main.php");  
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<TITLE>LiveVideoChat - Search Results</TITLE>
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
                      <TD CLASS="user"><DIV ALIGN="center"><SPAN CLASS="user">SEARCH RESULTS</SPAN></DIV></TD>
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
                            <TD><TABLE WIDTH="98%" BORDER="0" ALIGN="CENTER" CELLPADDING="0" CELLSPACING="0">
                                <TR>
                                  <TD BACKGROUND="images/red_line_bg.jpg"><TABLE WIDTH="98%" BORDER="0" ALIGN="center" CELLPADDING="0" CELLSPACING="0">
                                    <TR ALIGN="center">
                                      <TD NOWRAP><A HREF="signup.php?nolog=1&vb=0" CLASS="user">JOIN NOW!</A></TD>
                                      <TD NOWRAP><A HREF="aboutus.html" CLASS="linkstop">ABOUT US</A></TD>
                                      <TD NOWRAP><A HREF="terms.html" CLASS="linkstop">LEGAL TERMS</A></TD>
                                      <TD NOWRAP><A HREF="contactus.html" CLASS="linkstop">CONTACT US</A></TD>
                                      <TD NOWRAP>&nbsp;</TD>
                                      <TD NOWRAP>&nbsp;</TD>
                                      <TD NOWRAP><A HREF="index.html" CLASS="linkstop">HOME</A></TD>
                                    </TR>
                                  </TABLE></TD>
                                  <TD WIDTH="6" ALIGN="right" VALIGN="top"><IMG SRC="images/separate.gif" WIDTH="8" HEIGHT="26"></TD>
                                </TR>
                              </TABLE></TD>
                          </TR>
                          <TR>
                            <TD VALIGN="top">
<TABLE WIDTH="100%"  BORDER="0" CELLSPACING="0" CELLPADDING="5">
  <TR>
    <TD>           
    <TABLE  BORDER="0" ALIGN="CENTER" CELLPADDING="5" CELLSPACING="0">
          <!-- -->
		  <?php
		  include_once("class/user.php");
		  $ouser=new user($conn);		  
		  $result=$ouser->searchContact2chat("",$tname,$tnick,$tmail,$rgender,$agefrom,$ageto,$country,$tzipcode,$tinterest);
		  if($result==0)
		  {
		    echo "<tr><td>Your search did not match any members</td><tr>";
		  }
		  else
		  {
		    for($i=0;$i<count($result);$i++)
			{
			  echo($ouser->searchHtmlUser($result[$i],0));
			}
		  }	
		?>
		<!--
		  <TR>
            <TD><TABLE  BORDER="0" ALIGN="CENTER" CELLPADDING="3" CELLSPACING="0">
              <FORM>
                <TR>
                  <TD WIDTH="60" ROWSPAN="3"><DIV ALIGN="CENTER"><IMG SRC="images/user.jpg" WIDTH="40" HEIGHT="48"></DIV>
                      <DIV ALIGN="CENTER"></DIV>
                      <DIV ALIGN="CENTER"></DIV></TD>
                  <TD WIDTH="100" CLASS="form"><DIV ALIGN="RIGHT">Full Name:</DIV></TD>
                  <TD WIDTH="100%" CLASS="user">Cristina Larrea</TD>
                </TR>
                <TR>
                  <TD WIDTH="100" CLASS="form"><DIV ALIGN="RIGHT">Nickname:</DIV></TD>
                  <TD CLASS="TxtDescripciones">clarrea</TD>
                </TR>
                <TR>
                  <TD><DIV ALIGN="RIGHT" CLASS="form">Country:</DIV></TD>
                  <TD CLASS="TxtDescripciones">Ecuador</TD>
                </TR>
                <TR>
                  <TD>&nbsp;</TD>
                  <TD>&nbsp;</TD>
                  <TD><A HREF="confirmation_authorization.html" CLASS="LinkWhosonline">Send an authorization request to chat with this user</A>.</TD>
                </TR>
              </FORM>
            </TABLE></TD>
          </TR>
          <TR>
            <TD><DIV ALIGN="CENTER"><IMG SRC="images/red.gif" WIDTH="400" HEIGHT="1"></DIV></TD>
          </TR>
		  
          <TR>
            <TD><TABLE  BORDER="0" ALIGN="CENTER" CELLPADDING="3" CELLSPACING="0">
              <FORM>
                <TR>
                  <TD WIDTH="60" ROWSPAN="3"><DIV ALIGN="CENTER"><IMG SRC="images/user.jpg" WIDTH="40" HEIGHT="48"></DIV>
                      <DIV ALIGN="CENTER"></DIV>
                      <DIV ALIGN="CENTER"></DIV></TD>
                  <TD WIDTH="100" CLASS="form"><DIV ALIGN="RIGHT">Full Name:</DIV></TD>
                  <TD WIDTH="100%" CLASS="user">Pablo Barahona</TD>
                </TR>
                <TR>
                  <TD WIDTH="100" CLASS="form"><DIV ALIGN="RIGHT">Nickname:</DIV></TD>
                  <TD CLASS="TxtDescripciones">clarrea</TD>
                </TR>
                <TR>
                  <TD><DIV ALIGN="RIGHT" CLASS="form">Country:</DIV></TD>
                  <TD CLASS="TxtDescripciones">Ecuador</TD>
                </TR>
                <TR>
                  <TD>&nbsp;</TD>
                  <TD>&nbsp;</TD>
                  <TD><A HREF="confirmation_authorization.html" CLASS="LinkWhosonline">Send an authorization request to chat with this user</A>.</TD>
                </TR>
              </FORM>
            </TABLE></TD>
          </TR>
          <TR>
            <TD><IMG SRC="images/red.gif" WIDTH="400" HEIGHT="1"></TD>
          </TR>
          <TR>
            <TD><TABLE  BORDER="0" ALIGN="CENTER" CELLPADDING="3" CELLSPACING="0">
              <FORM>
                <TR>
                  <TD WIDTH="60" ROWSPAN="3"><DIV ALIGN="CENTER"><IMG SRC="images/user.jpg" WIDTH="40" HEIGHT="48"></DIV>
                      <DIV ALIGN="CENTER"></DIV>
                      <DIV ALIGN="CENTER"></DIV></TD>
                  <TD WIDTH="100" CLASS="form"><DIV ALIGN="RIGHT">Full Name:</DIV></TD>
                  <TD WIDTH="100%" CLASS="user">Otro usuario</TD>
                </TR>
                <TR>
                  <TD WIDTH="100" CLASS="form"><DIV ALIGN="RIGHT">Nickname:</DIV></TD>
                  <TD CLASS="TxtDescripciones">clarrea</TD>
                </TR>
                <TR>
                  <TD><DIV ALIGN="RIGHT" CLASS="form">Country:</DIV></TD>
                  <TD CLASS="TxtDescripciones">Ecuador</TD>
                </TR>
                <TR>
                  <TD>&nbsp;</TD>
                  <TD>&nbsp;</TD>
                  <TD><A HREF="confirmation_authorization.html" CLASS="LinkWhosonline">Send an authorization request to chat with this user</A>.</TD>
                </TR>
              </FORM>
            </TABLE></TD>
          </TR>
          <TR>
            <TD><IMG SRC="images/red.gif" WIDTH="400" HEIGHT="1"></TD>
          </TR>
          <TR>
            <TD><TABLE  BORDER="0" ALIGN="CENTER" CELLPADDING="3" CELLSPACING="0">
              <FORM>
                <TR>
                  <TD WIDTH="60" ROWSPAN="3"><DIV ALIGN="CENTER"><IMG SRC="images/user.jpg" WIDTH="40" HEIGHT="48"></DIV>
                      <DIV ALIGN="CENTER"></DIV>
                      <DIV ALIGN="CENTER"></DIV></TD>
                  <TD WIDTH="100" CLASS="form"><DIV ALIGN="RIGHT">Full Name:</DIV></TD>
                  <TD WIDTH="100%" CLASS="user">Another user </TD>
                </TR>
                <TR>
                  <TD WIDTH="100" CLASS="form"><DIV ALIGN="RIGHT">Nickname:</DIV></TD>
                  <TD CLASS="TxtDescripciones">clarrea</TD>
                </TR>
                <TR>
                  <TD><DIV ALIGN="RIGHT" CLASS="form">Country:</DIV></TD>
                  <TD CLASS="TxtDescripciones">Ecuador</TD>
                </TR>
                <TR>
                  <TD>&nbsp;</TD>
                  <TD>&nbsp;</TD>
                  <TD><A HREF="confirmation_authorization.html" CLASS="LinkWhosonline">Send an authorization request to chat with this user</A>.</TD>
                </TR>
              </FORM>
            </TABLE></TD>
          </TR>
		  --> 
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
                      <TD COLSPAN="3" ALIGN="left" VALIGN="top">&nbsp;</TD>
                    </TR>
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
