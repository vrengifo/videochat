<?php
include_once("class/user.php");
include_once("class/group.php");
class contactxuser 
{
    // Attributes
    var $user_id;
    var $contact_id;
    var $contact_blocked;
    var $group_id;

    var $con;
    var $separador;


    // Operations
    // Constructor
    /**
     * Does ...
     * @param conDb 
     */
    function contactxuser($conDb) 
    { 
      $this->contact_blocked='0';
    	
      $this->con=$conDb;
      $this->separador=":";
    } // end operation contactxuser 

    function cad2id($id)
    {
      list($this->user_id,$this->contact_id)=explode($this->separador,$id);
    }
    
    function id2cad($user,$contact)
    {
      $res=$user.$this->separador.$contact;
      return($res);	
    }
    
    /**
     * Does ...
     */
    function exist()
    { 
      $sql="select user_id,contact_id from contactxuser "
      	  ."where user_id='$this->user_id' "
      	  ."and contact_id='$this->contact_id'";
      $rs=&$this->con->execute($sql);
      if($rs->EOF)
        $res=0;
      else
      { 
        $res=$this->id2cad($this->user_id,$this->contact_id);  
      }  
      return($res);
    } // end operation exist 
    
    /**
     * Does ...
     */
    function addContact()
    { 
      $ouno=new contactxuser($this->con);
      $odos=new contactxuser($this->con);
      
      $ouno->user_id=$this->user_id;
      $ouno->contact_id=$this->contact_id;
      $res1=$ouno->add();
      
      $odos->contact_id=$this->user_id;
      $odos->user_id=$this->contact_id;
      $res2=$odos->add();
      
      return($res1);
    } // end operation addContact
    
    /**
     * Does ...
     */
    function add()
    { 
      $existe=$this->exist();
      if(!$existe)
      {
        $sql="insert into contactxuser "
      	  ."(user_id,contact_id,contact_blocked) "
      	  ."values "
      	  ."('$this->user_id','$this->contact_id','$this->contact_blocked')";
        $rs=&$this->con->execute($sql);
        $res=$this->exist();
      }
      else
        $res=$existe;
      return($res);
    } // end operation add 

    /**
     * Does ...
     * @param id 
     */
    function del($id) 
    { 
        // your code here
        return ;
    } // end operation del 

    /**
     * Does ...
     * @param id 
     * @param string 
     */
    function info($id) 
    { 
      $oaux=new contactxuser($this->con);
      $oaux->cad2id($id);
      $sql="select user_id,contact_id,contact_blocked,group_id "
      	  ."from contactxuser "
      	  ."where user_id='$oaux->user_id' and contact_id='$oaux->contact_id' ";
      $rs=&$this->con->execute($sql);
      if($rs->EOF)
        $res="0";
      else
      {
      	$res=$id;
      	$this->user_id=$rs->fields[0];
      	$this->contact_id=$rs->fields[1];
      	$this->contact_blocked=$rs->fields[2];
      	$this->group_id=$rs->fields[3];
      }
      return($res);
    } // end operation info 
    
    /**
     * Does ...
     * @param id 
     */
    function blockunblock($id,$state) 
    { 
      $oaux=new contactxuser($this->con);
      $oaux->cad2id($id);
      $sql="update contactxuser "
      	  ."set contact_blocked='$state' "
      	  ."where "
      	  ."user_id='$oaux->user_id' and contact_id='$oaux->contact_id' ";
      $rs=&$this->con->execute($sql);
      return ;
    } // end operation blockunblock
    
    /**
     * Does ...
     * @param id 
     */
    function updateGroup($id,$grp) 
    { 
      $oaux=new contactxuser($this->con);
      $oaux->cad2id($id);
      $sql="update contactxuser "
      	  ."set group_id=$grp "
      	  ."where "
      	  ."user_id='$oaux->user_id' and contact_id='$oaux->contact_id' ";
      $rs=&$this->con->execute($sql);
      return ;
    } // end operation updateGroup
    
   /**
     * Does ...
     * @param $user 
     */
    function contactbyuserId($user) 
    { 
      $sql="select contact_id "
      	  ."from contactxuser "
      	  ."where user_id='$user' "
      	  ."order by contact_id ";

      $rs=&$this->con->execute($sql);
      $res=array();
      $cont=0;
      while(!$rs->EOF)
      {
      	$res[$cont]=$rs->fields[0];
      	$rs->next();
      	$cont++;
      }
      return($res);
    } // end operation contactbyuserId 
    
    /**
     * Does ...
     * @param id 
     * @param string 
     */
    function contactbyuserObj($user) 
    { 
      $sql="select contact_id "
      	  ."from contactxuser "
      	  ."where user_id='$user' "
      	  ."order by contact_id ";
      //echo "<hr>$sql<hr>";
      $rs=&$this->con->execute($sql);
      
      $ouser=new user($this->con);
      $res=array();
      $cont=0;
      while(!$rs->EOF)
      {
      	$ouser->info($rs->fields[0]);
      	$res[$cont]=$ouser;
      	$rs->next();
      	$cont++;
      }
      return($res);
    } // end operation contactbyuserObj 
    
    /**
     * Does ...
     * @param $user 
     */
    function groupbyuserObj($user) 
    { 
      $arrGrp=array();
      $ogrp=new group($this->con);
      $arrGrp=$ogrp->listarGrupos($user);
    	
      return($arrGrp);
    } // end operation groupbyuserObj
    
    /**
     * Does ...
     * @param $user 
     */
    function contactbyUserGroup($user,$group) 
    { 
      $sql="select contact_id "
      	  ."from contactxuser "
      	  ."where user_id='$user' and group_id=$group "
      	  ."order by contact_id ";

      $rs=&$this->con->execute($sql);
      if($rs->EOF)
        return(0);
      else
      {
      	$res=array();
        $cont=0;
        while(!$rs->EOF)
        {
      	  $res[$cont]=$rs->fields[0];
      	  $rs->next();
      	  $cont++;
        }
        return($res);
      }
    } // end operation contactbyUserGroup 
    
    /**
     * Does ...
     * @param $user 
     */
    function groupbyuserHtml($user,$group) 
    { 
      $cadimgGroup="images/icon_grp.gif";
      
      $oaux=new contactxuser($this->con);
      $arrContact=$oaux->contactbyUserGroup($user,$group->group_id);
      if($arrContact==0)//no hay contactos
      {
        $cadContact="";
        $cadContactHtml="";	
      }
      else
      {
      	$auxcad="";
      	for($i=0;$i<count($arrContact);$i++)
      	{
      	  $auxcad.=$oaux->mycontactHtml($user,$arrContact[$i]);
      	}
      	$cadContact=$auxcad;
      	
      	$cadContactHtml=<<<vars
  <tr>
    <td>&nbsp;&nbsp;</td>
	<td>
	  <table width="100%">
	    $cadContact
	  </table>
	</td>
  </tr>  
vars;
      }
      
      $cadHtml=<<<mya
  <tr>
    <td colspan="2" CLASS="LinkWhosonline">
	  <IMG SRC="$cadimgGroup"  WIDTH="16" HEIGHT="16"> $group->group_name
	</td>
  </tr>
  $cadContactHtml
mya;
      return($cadHtml);
    } // end operation groupbyuserHtml
    
    function favoritesHtml($user,$contact)
    {
      $ouser=new user($this->con);
      $ocontact=new contactxuser($this->con);
      
      $idContact=$this->id2cad($user,$contact);
      $ocontact->info($idContact);
      
      $ouser->info($contact);
      
      if($ocontact->contact_blocked=="0")
      {  
      	$cadblocked="Block User";
      	$cadstate="1";
      	$cadimgblocked="images/visto.gif";
      }
      if($ocontact->contact_blocked=="1")
      {  
      	$cadblocked="Unblock User";
      	$cadstate="0";
      	$cadimgblocked="images/equis.gif";
      }
      $url="contact_blockunblock.php?contact=".$idContact."&state=".$cadstate;
      
      include_once("class/country.php");
	  $ocountry=new country($this->con);
	  $ocountry->info($ouser->cou_id);
	  
	  //usuario propio
	  $ouserOwn=new user($this->con);
	  $ouserOwn->info($user);
	  
	  
	  //room de usuario
	  include_once("class/plan.php");
      $oplan=new plan($this->con);
      $oplan->info($ouser->plan_id);
      $urlChat=$oplan->plan_url.'?appInstance='.$ouser->user_instance.'&username='.$ouserOwn->user_nickname;
      $cadurlChat=' onClick="MM_openBrWindow(\''.$urlChat.'\',\'video'.$oplan->plan_nboxes.'\',\''.$oplan->plan_urlfeatures.'\')"';
      
      include_once("class/parameter.php");
      $oparameter=new parameter($this->con);
      $oparameter->info();
            
      $ogrp=new group($this->con);
      $ogrp->info($ocontact->group_id);
      $cadSelectGroup=$ogrp->htmlSelect("tgroup",$ocontact->group_id,"form",$user);
      
$cad= <<<mya
    	<TR>
          <TD>
		    <TABLE  BORDER="0" ALIGN="CENTER" CELLPADDING="3" CELLSPACING="0">            
              <TR>
                <TD WIDTH="60" ROWSPAN="4">
				  <DIV ALIGN="CENTER"><IMG SRC="$ouser->user_photo" WIDTH="$oparameter->photo_width" HEIGHT="$oparameter->photo_height"></DIV>
                  <DIV ALIGN="CENTER"></DIV>
                  <DIV ALIGN="CENTER"></DIV></TD>
                <TD WIDTH="100" CLASS="form">
				  <DIV ALIGN="RIGHT">Full Name:</DIV>
				</TD>
                <TD WIDTH="100%">
				  <A HREF="#" CLASS="user" onClick="MM_openBrWindow('contact_profile.php?uid=$ouser->user_id','contactprofile','width=800,height=600')">
				    $ouser->user_name
				  </A>
				  <SPAN CLASS="user">
				    <A HREF="$url" CLASS="LinkWhosonline">($cadblocked) </A>
				  </SPAN>
				</TD>
              </TR>
              <TR>
                <TD WIDTH="100" CLASS="form">
				  <DIV ALIGN="RIGHT">Nickname:</DIV>
				</TD>
                <TD CLASS="TxtDescripciones">$ouser->user_nickname</TD>
              </TR>
              <TR>
                <TD>
				  <DIV ALIGN="RIGHT" CLASS="form">Country:</DIV>
				</TD>
                <TD CLASS="TxtDescripciones">
				  $ocountry->cou_name
				</TD>
              </TR>
              <TR>
                <!-- 
                <TD>
				  <DIV ALIGN="RIGHT" CLASS="form">Group:</DIV>
				</TD>
				-->
                <TD CLASS="TxtDescripciones" colspan="2">
				  <form method="post" name="form_$contact" action="groupUser_upd1.php">
				    <input type="hidden" name="idContact" value="$idContact">
					<input type="submit" name="change" value="Move Contact to " class="boton"> $cadSelectGroup 
				  </form>
				</TD>
              </TR>
              <TR>
                <TD>
				  <DIV ALIGN="CENTER"><IMG SRC="$cadimgblocked" WIDTH="16" HEIGHT="13"></DIV>
				</TD>
                <TD>
				  <DIV ALIGN="LEFT"></DIV>
				</TD>
                <TD>
				  <A HREF="#" $cadurlChat CLASS="LinkWhosonline">
				    Click here to enter video chat room
				  </A>
				</TD>
              </TR>
			</TABLE>
		  </TD>
        </TR>
        <TR>
          <TD><DIV ALIGN="CENTER"><IMG SRC="images/red.gif" WIDTH="400" HEIGHT="1"></DIV></TD>
        </TR>
mya;

      return($cad);
    }
    
    function mycontactHtml($user,$contact,$online=1)
    {
      if($this->con->debug==1)
      {
      	echo"<hr>mycontactHtml($user,$contact)<hr>";
      }
      $ouser=new user($this->con);
      $ouser->info($contact);
      
      $ouserOwn=new user($this->con);
      $ouserOwn->info($user);
      
      $ocontact=new contactxuser($this->con);
      include_once("class/statusxuser.php");
      $ostaxuser=new statusxuser($this->con);
      include_once("class/status.php");
      $ostatus=new status($this->con);
      
      $idcontact=$ocontact->id2cad($user,$contact);
      $ocontact->info($idcontact);
      //estado del contacto
      $resStatus=$ostaxuser->info($contact);
      if($resStatus=="0")
        $estado=$ostatus->offline();
      else  
        $estado=$ostaxuser->sta_id;
      if($this->con->debug==1)
      {
      	echo"<hr>estado=$estado<hr>";
      }
      
      //chequeo si no está bloqueado el contacto al reves
      if($estado==$ostatus->online())
      {
      	$ocontactReves=new contactxuser($this->con);
      	$idcontactReves=$ocontactReves->id2cad($contact,$user);
        $ocontactReves->info($idcontactReves);
        if($ocontactReves->contact_blocked=="1")
          $estado=$ostatus->offline();
      }
      
      if($ocontact->contact_blocked=="1")
        $estado=$ostatus->blocked();
      
      if($this->con->debug==1)
      {
      	echo"<hr>estado=$estado<hr>";
      }  
        
      $ostatus->info($estado);
      
      if($online)
      {
        include_once("class/plan.php");
        $oplan=new plan($this->con);
        $oplan->info($ouser->plan_id);
      
        $url=$oplan->plan_url.'?appInstance='.$ouser->user_instance.'&username='.$ouserOwn->user_nickname;
        $cadurl=' onClick="MM_openBrWindow(\''.$url.'\',\'video'.$oplan->plan_nboxes.'\',\''.$oplan->plan_urlfeatures.'\')"';
      }
      else
      {
      	$cadurl='';
      }
        
      $cad=<<<mya
<TR>
  <TD WIDTH="16"><IMG SRC="$ostatus->sta_icon" WIDTH="16" HEIGHT="16"></TD>
  <TD><A CLASS="LinkWhosonline" HREF="#" $cadurl >$ouser->user_nickname</A></TD>
</TR>      
mya;
      return($cad);
    }

} // end class contactbyuser
?>
