<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
    <?php
	  include_once("class/group.php");
	  $ogrp=new group($conn);
	  //echo($ogrp->htmlSelect("tgrup",$tgrup,"fields",$sUser));
	?>
	<P ALIGN="CENTER" CLASS="TTLinteriores">My Groups </P>
    <P ALIGN="CENTER" CLASS="LinkWhosonline">Manage your own groups </P>
	    <FORM name="form1" method="post" action="grp_add1.php">
	  <TABLE WIDTH="100%"  BORDER="0" CELLSPACING="0" CELLPADDING="5">
        <TR>
          <TD width="26%" CLASS="TTLinteriores">
		    <DIV ALIGN="right">New Group</DIV>
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
    <FORM name="form2" method="post" action="grp_del.php">
	  <TABLE WIDTH="100%"  BORDER="0" CELLSPACING="0" CELLPADDING="5">
        <TR>
          <TD CLASS="TTLinteriores" width="26%"><DIV ALIGN="center">Delete</DIV></TD>
          <TD CLASS="TTLinteriores" width="47%"><DIV ALIGN="center">Groups</DIV></TD>
		  <TD CLASS="TTLinteriores" width="27%"><DIV ALIGN="center">Contacts #</DIV></TD>
        </TR>
        <TR>
          <TD CLASS="form" align="center">
		    <input type="checkbox" name="chkgrp[]" value="">
		  </TD>
          <TD CLASS="form">A</TD>
		  <TD CLASS="form">0</TD>
        </TR>
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
</body>
</html>
