<?
  session_start();
  $nolog=1;
  include_once("includes/main.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<TITLE>LiveVideoChat - Members Search</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<LINK HREF="styles.css" REL="stylesheet" TYPE="text/css">
<SCRIPT LANGUAGE="JavaScript" TYPE="text/JavaScript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
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
                      <TD CLASS="user"><DIV ALIGN="center"><SPAN CLASS="TTLinteriores">SEARCH FOR MEMBERS</SPAN></DIV></TD>
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
                            <TD VALIGN="top"><TABLE WIDTH="100%"  BORDER="0" CELLSPACING="0" CELLPADDING="5">
  <TR>
    <TD>          <TABLE WIDTH="100%"  BORDER="0" CELLSPACING="0" CELLPADDING="5">
        <FORM method="post" name="form1" action="search_results_offline.php">
          <TR>
            <TD COLSPAN="2" CLASS="form"><TABLE WIDTH="98%" BORDER="0" ALIGN="CENTER" CELLPADDING="0" CELLSPACING="0">
              <TR>
                <TD BACKGROUND="images/red_line_bg.jpg"><TABLE WIDTH="98%" BORDER="0" ALIGN="center" CELLPADDING="0" CELLSPACING="0">
                  <TR ALIGN="center">
                    <TD NOWRAP><A HREF="signup.php" CLASS="user">JOIN NOW!</A></TD>
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
            <TD WIDTH="40%" CLASS="form"><DIV ALIGN="RIGHT">Name:</DIV></TD>
            <TD><INPUT NAME="tname" TYPE="text" CLASS="fields" SIZE="40" value="<?=$tname?>"></TD>
          </TR>
          <TR>
            <TD CLASS="form"><DIV ALIGN="RIGHT">Nickname:</DIV></TD>
            <TD><INPUT NAME="tnick" TYPE="text" CLASS="fields" SIZE="40" value="<?=$tnick?>"></TD>
          </TR>
          <TR>
          <TD CLASS="form"><DIV ALIGN="RIGHT">Zip Code:</DIV></TD>
          <TD><INPUT NAME="tzipcode" TYPE="text" CLASS="fields" SIZE="40" value="<?=$tzipcode?>"></TD>
        </TR>
		  <TR>
            <TD CLASS="form"><DIV ALIGN="RIGHT">E-mail:</DIV></TD>
            <TD><INPUT NAME="tmail" TYPE="text" CLASS="fields" SIZE="40" value="<?=$tmail?>"></TD>
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
            <TD CLASS="form"><DIV ALIGN="RIGHT">Age range</DIV></TD>
            <TD><SPAN CLASS="TxtDescripciones">From</SPAN>
			<SELECT NAME="agefrom" CLASS="fields">
              <OPTION VALUE="0" SELECTED>select</OPTION>
              <OPTION VALUE="1">1</OPTION>
              <OPTION VALUE="2">2</OPTION>
              <OPTION VALUE="3">3</OPTION>
              <OPTION VALUE="4">4</OPTION>
              <OPTION VALUE="5">5</OPTION>
              <OPTION VALUE="6">6</OPTION>
              <OPTION VALUE="7">7</OPTION>
              <OPTION VALUE="8">8</OPTION>
              <OPTION VALUE="9">9</OPTION>
              <OPTION VALUE="10">10</OPTION>
              <OPTION VALUE="11">11</OPTION>
              <OPTION VALUE="12">12</OPTION>
              <OPTION VALUE="13">13</OPTION>
              <OPTION VALUE="14">14</OPTION>
              <OPTION VALUE="15">15</OPTION>
              <OPTION VALUE="16">16</OPTION>
              <OPTION VALUE="17">17</OPTION>
              <OPTION VALUE="18">18</OPTION>
              <OPTION VALUE="19">19</OPTION>
              <OPTION VALUE="20">20</OPTION>
              <OPTION VALUE="21">21</OPTION>
              <OPTION VALUE="22">22</OPTION>
              <OPTION VALUE="23">23</OPTION>
              <OPTION VALUE="24">24</OPTION>
              <OPTION VALUE="25">25</OPTION>
              <OPTION VALUE="26">26</OPTION>
              <OPTION VALUE="27">27</OPTION>
              <OPTION VALUE="28">28</OPTION>
              <OPTION VALUE="29">29</OPTION>
              <OPTION VALUE="30">30</OPTION>
              <OPTION VALUE="31">31</OPTION>
              <OPTION VALUE="32">32</OPTION>
              <OPTION VALUE="33">33</OPTION>
              <OPTION VALUE="34">34</OPTION>
              <OPTION VALUE="35">35</OPTION>
              <OPTION VALUE="36">36</OPTION>
              <OPTION VALUE="37">37</OPTION>
              <OPTION VALUE="38">38</OPTION>
              <OPTION VALUE="39">39</OPTION>
              <OPTION VALUE="40">40</OPTION>
              <OPTION VALUE="41">41</OPTION>
              <OPTION VALUE="42">42</OPTION>
              <OPTION VALUE="43">43</OPTION>
              <OPTION VALUE="44">44</OPTION>
              <OPTION VALUE="45">45</OPTION>
              <OPTION VALUE="46">46</OPTION>
              <OPTION VALUE="47">47</OPTION>
              <OPTION VALUE="48">48</OPTION>
              <OPTION VALUE="49">49</OPTION>
              <OPTION VALUE="50">50</OPTION>
              <OPTION VALUE="51">51</OPTION>
              <OPTION VALUE="52">52</OPTION>
              <OPTION VALUE="53">53</OPTION>
              <OPTION VALUE="55">54</OPTION>
              <OPTION VALUE="56">56</OPTION>
              <OPTION VALUE="57">57</OPTION>
              <OPTION VALUE="58">58</OPTION>
              <OPTION VALUE="59">59</OPTION>
              <OPTION VALUE="60">60</OPTION>
              <OPTION VALUE="61">61</OPTION>
              <OPTION VALUE="62">62</OPTION>
              <OPTION VALUE="63">63</OPTION>
              <OPTION VALUE="64">64</OPTION>
              <OPTION VALUE="65">65</OPTION>
              <OPTION VALUE="66">66</OPTION>
              <OPTION VALUE="67">67</OPTION>
              <OPTION VALUE="68">68</OPTION>
              <OPTION VALUE="69">69</OPTION>
              <OPTION VALUE="70">70</OPTION>
            </SELECT>
              <SPAN CLASS="TxtDescripciones"> &nbsp;To
              <SELECT NAME="ageto" CLASS="fields">
            <OPTION VALUE="0" SELECTED>select</OPTION>
                <OPTION VALUE="1">1</OPTION>
                <OPTION VALUE="2">2</OPTION>
                <OPTION VALUE="3">3</OPTION>
                <OPTION VALUE="4">4</OPTION>
                <OPTION VALUE="5">5</OPTION>
                <OPTION VALUE="6">6</OPTION>
                <OPTION VALUE="7">7</OPTION>
                <OPTION VALUE="8">8</OPTION>
                <OPTION VALUE="9">9</OPTION>
                <OPTION VALUE="10">10</OPTION>
                <OPTION VALUE="11">11</OPTION>
                <OPTION VALUE="12">12</OPTION>
                <OPTION VALUE="13">13</OPTION>
                <OPTION VALUE="14">14</OPTION>
                <OPTION VALUE="15">15</OPTION>
                <OPTION VALUE="16">16</OPTION>
                <OPTION VALUE="17">17</OPTION>
                <OPTION VALUE="18">18</OPTION>
                <OPTION VALUE="19">19</OPTION>
                <OPTION VALUE="20">20</OPTION>
                <OPTION VALUE="21">21</OPTION>
                <OPTION VALUE="22">22</OPTION>
                <OPTION VALUE="23">23</OPTION>
                <OPTION VALUE="24">24</OPTION>
                <OPTION VALUE="25">25</OPTION>
                <OPTION VALUE="26">26</OPTION>
                <OPTION VALUE="27">27</OPTION>
                <OPTION VALUE="28">28</OPTION>
                <OPTION VALUE="29">29</OPTION>
                <OPTION VALUE="30">30</OPTION>
                <OPTION VALUE="31">31</OPTION>
                <OPTION VALUE="32">32</OPTION>
                <OPTION VALUE="33">33</OPTION>
                <OPTION VALUE="34">34</OPTION>
                <OPTION VALUE="35">35</OPTION>
                <OPTION VALUE="36">36</OPTION>
                <OPTION VALUE="37">37</OPTION>
                <OPTION VALUE="38">38</OPTION>
                <OPTION VALUE="39">39</OPTION>
                <OPTION VALUE="40">40</OPTION>
                <OPTION VALUE="41">41</OPTION>
                <OPTION VALUE="42">42</OPTION>
                <OPTION VALUE="43">43</OPTION>
                <OPTION VALUE="44">44</OPTION>
                <OPTION VALUE="45">45</OPTION>
                <OPTION VALUE="46">46</OPTION>
                <OPTION VALUE="47">47</OPTION>
                <OPTION VALUE="48">48</OPTION>
                <OPTION VALUE="49">49</OPTION>
                <OPTION VALUE="50">50</OPTION>
                <OPTION VALUE="51">51</OPTION>
                <OPTION VALUE="52">52</OPTION>
                <OPTION VALUE="53">53</OPTION>
                <OPTION VALUE="55">54</OPTION>
                <OPTION VALUE="56">56</OPTION>
                <OPTION VALUE="57">57</OPTION>
                <OPTION VALUE="58">58</OPTION>
                <OPTION VALUE="59">59</OPTION>
                <OPTION VALUE="60">60</OPTION>
                <OPTION VALUE="61">61</OPTION>
                <OPTION VALUE="62">62</OPTION>
                <OPTION VALUE="63">63</OPTION>
                <OPTION VALUE="64">64</OPTION>
                <OPTION VALUE="65">65</OPTION>
                <OPTION VALUE="66">66</OPTION>
                <OPTION VALUE="67">67</OPTION>
                <OPTION VALUE="68">68</OPTION>
                <OPTION VALUE="69">69</OPTION>
                <OPTION VALUE="70">70</OPTION>
                          </SELECT>
              </SPAN></TD>
          </TR>
          <TR>
            <TD><DIV ALIGN="RIGHT" CLASS="form">Country:</DIV></TD>
            <TD>
			  <?php
			    include_once("class/country.php");
				$ocountry=new country($conn);
				echo($ocountry->htmlSelect("country",$country,"fields",1));
			  ?>
			</TD>
          </TR>
		  <TR>
          <TD CLASS="form"><DIV ALIGN="RIGHT">Keywords:</DIV></TD>
          <TD><INPUT NAME="tinterest" TYPE="text" CLASS="fields" SIZE="40" value="<?=$tinterest?>"></TD>
        </TR>
          <TR>
            <TD COLSPAN="2"><DIV ALIGN="CENTER"></DIV>            <DIV ALIGN="CENTER">
              <TABLE  BORDER="0" CELLSPACING="0" CELLPADDING="15">
                <TR>
                  <TD><DIV ALIGN="CENTER">
                    <INPUT NAME="Submit2" TYPE="submit" CLASS="boton" VALUE="Search">
  </DIV></TD>
                  </TR>
              </TABLE>
            </DIV></TD>
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
