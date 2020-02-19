<?php
include_once("class/country.php");
include_once("class/contactxuser.php");
include_once("class/authrequestxuser.php");
include_once("class/parameter.php");
class user {

    // Attributes
    var $user_id;
    var $user_password;
    var $user_name;
    var $user_nickname;
    var $sex_id;
    var $user_age;
    var $marsta_id;
    var $cou_id;
    var $user_state;
    var $user_city;
    var $user_email;
    var $user_photo;
    var $plan_id;
    var $user_public;
    
    var $user_date;
    var $user_instance;
    
    //nuevos campos
    var $user_zipcode;
    var $user_interest;
    var $user_firstname;
    var $user_lastname;
    var $user_blog;

    /**
     * Represent ...
     */
    var $con;
    var $photo_width;
    var $photo_height;

    // Operations
    // Constructor
    /**
     * Does ...
     * @param conDb 
     */
    function user($conDb) 
    { 
      $this->con=$conDb;
      $this->user_date=date("Y-m-d");
      
      $oparameter=new parameter($this->con);
      $oparameter->info();
      $this->photo_width=$oparameter->photo_width;
      $this->photo_height=$oparameter->photo_height;
    } // end operation user 

    /**
     * Does ...
     */
    function validate() 
    {
     $noerror=1; 
     if(strlen($this->user_id)==0)
     {
        $this->user_id="-";
        $noerror=0;//tiene errores
     }
      if(strlen($this->user_name)==0)
        $this->user_name="-";
      if(strlen($this->user_nickname)==0)
      {
        $this->user_nickname="-";
        $noerror=0;
      }  

      return($noerror);
    } // end operation validate
    
    
    /**
     * Does ...
     */
    function exist() 
    {
      $sql="select user_id "
      	  ."from user "
      	  ."where "
      	  ."user_id='$this->user_id' "
      	  ."or user_nickname='$this->user_nickname' "
      	  ."or user_email='$this->user_email' ";
      $rs=&$this->con->execute($sql);
      if($rs->EOF)
        $res=0;
      else 
        $res=$rs->fields[0];  
      return($res);
    } // end operation exist
    
    /**
     * Does ...
     */
    function existNickname() 
    {
      $sql="select user_id "
      	  ."from user "
      	  ."where "
      	  ."user_nickname='$this->user_nickname' ";
      $rs=&$this->con->execute($sql);
      if($rs->EOF)
        $res=0;
      else 
        $res=$rs->fields[0];  
      return($res);
    } // end operation existNickname
    
    function generateName($first,$last)
    {
      $res=$first." ".$last;
      return($res);
    }
    
    /**
     * Does ...
     */
    function add() 
    { 
      $existe=$this->exist();
      if((!$existe)&&($this->validate()))
      {
        $this->user_name=$this->generateName($this->user_firstname,$this->user_lastname);
      	
      	$sql="insert into user "
      	  ."("
      	  ."user_id,user_password,user_name,user_nickname,"
      	  ."sex_id,user_age,marsta_id,cou_id,"
      	  ."user_state,user_city,user_email,user_photo,"
      	  ."user_public,plan_id,user_date,"
      	  ."user_zipcode,user_interest,user_firstname,user_lastname,user_blog "
      	  .") "
      	  ."values "
      	  ."("
      	  ."'$this->user_id','$this->user_password','$this->user_name','$this->user_nickname',"
      	  ."'$this->sex_id','$this->user_age','$this->marsta_id','$this->cou_id',"
      	  ."'$this->user_state','$this->user_city','$this->user_email','$this->user_photo',"
      	  ."'$this->user_public','$this->plan_id','$this->user_date',"
      	  ."'$this->user_zipcode','$this->user_interest','$this->user_firstname','$this->user_lastname','$this->user_blog' "
      	  .")";
        $rs=&$this->con->execute($sql);
        if($rs)
          $res=$this->exist();
        else
          $res=0;  	  
      }
      else 
        $res=0;
      return($res);
    } // end operation add 

    /**
     * Does ...
     * @param id 
     */
    function del($id) 
    { 
      $sql="delete from user where user_id='$id' ";
      $rs=&$this->con->execute($sql);
      return($id);
    } // end operation del 

    /**
     * Does ...
     * @param id 
     */
    function update($id) 
    { 
      $oaux=new user($this->con);
      $existe=$oaux->info($id);
      //verificar si el nickname se puede cambiar
      $existeNick=$this->existNickname();
      if($existe)
      {
        $this->user_name=$this->generateName($this->user_firstname,$this->user_lastname);
        
      	$sql="update user "
      	    ."set "
      	    ."user_password='$this->user_password',user_name='$this->user_name',";
      	if(!$existeNick)
      	  $sql.="user_nickname='$this->user_nickname',";
      	$sql.="marsta_id='$this->marsta_id',cou_id='$this->cou_id',"
      	    ."user_state='$this->user_state',user_city='$this->user_city',"
      	    ."user_email='$this->user_email',"
      	    ."user_zipcode='$this->user_zipcode',user_interest='$this->user_interest',"
      	    ."user_firstname='$this->user_firstname',user_lastname='$this->user_lastname',"
      	    ."user_blog='$this->user_blog' ";
      	if(strlen($this->user_photo)==0)
      	  $uphoto=$oaux->user_photo;
      	else   
      	  $uphoto=$this->user_photo; 
      	$sql.=",user_photo='$uphoto' ";
      	$sql.="where user_id='$id' ";
      $rs=&$this->con->execute($sql);
      if($rs)
        $res=$id;
      else
        $res=0;	  
      }
      else
        $res=0;
      return($res);
    } // end operation update 
    
    /**
     * Does ...
     * @param id 
     */
    function updateProfile($id) 
    { 
      $oaux=new user($this->con);
      $existe=$oaux->info($id);
      //verificar si el nickname se puede cambiar
      $existeNick=$this->existNickname();
      if($existe)
      {
        $this->user_name=$this->generateName($this->user_firstname,$this->user_lastname);
      	
      	$sql="update user "
      	    ."set "
      	    ."user_name='$this->user_name',sex_id='$this->sex_id',"
      	    ."user_age='$this->user_age',";
      	if(!$existeNick)
      	  $sql.="user_nickname='$this->user_nickname',";
      	$sql.="marsta_id='$this->marsta_id',cou_id='$this->cou_id',"
      	    ."user_state='$this->user_state',user_city='$this->user_city',"
      	    ."user_public='$this->user_public',"
      	    ."user_zipcode='$this->user_zipcode',"
      	    //."user_interest='$this->user_interest',"
      	    ."user_firstname='$this->user_firstname',user_lastname='$this->user_lastname' "
      	    //."user_blog='$this->user_blog' "
      	    ."where user_id='$id' ";
      $rs=&$this->con->execute($sql);
      if($rs)
        $res=$id;
      else
        $res=0;	  
      }
      else
        $res=0;
      return($res);
    } // end operation update 
    
    /**
     * Does ...
     * @param id 
     */
    function updatePlan($id,$planId) 
    { 
        $sql="update user "
      	    ."set "
      	    ."plan_id='$planId',user_date='$this->user_date' "
      	    ."where user_id='$id' ";
      $rs=&$this->con->execute($sql);
      if($rs)
        $res=$id;
      else
        $res=0;
      return($res);
    } // end operation updatePlan

    /**
     * Does ...
     * @param id 
     */
    function info($id) 
    { 
      $sql="select "
      	  ."user_id,user_password,user_name,user_nickname,"
      	  ."sex_id,user_age,marsta_id,cou_id,"
      	  ."user_state,user_city,user_email,user_photo,"
      	  ."user_public,plan_id,user_instance,"
      	  ."user_zipcode,user_interest,user_firstname,user_lastname,user_blog "
      	  ."from user "
      	  ."where user_id='$id' ";
      $rs=&$this->con->execute($sql);
      if(!$rs->EOF)
      {
      	$res=$id;
      	$this->user_id=$rs->fields[0];
      	$this->user_password=$rs->fields[1];
      	$this->user_name=$rs->fields[2];
      	$this->user_nickname=$rs->fields[3];
      	$this->sex_id=$rs->fields[4];
      	$this->user_age=$rs->fields[5];
      	$this->marsta_id=$rs->fields[6];
      	$this->cou_id=$rs->fields[7];
      	$this->user_state=$rs->fields[8];
      	$this->user_city=$rs->fields[9];
      	$this->user_email=$rs->fields[10];
      	$this->user_photo=$rs->fields[11];
      	$this->user_public=$rs->fields[12];
      	$this->plan_id=$rs->fields[13];
      	$this->user_instance=$rs->fields[14];
      	
      	$this->user_zipcode=$rs->fields[15];
      	$this->user_interest=$rs->fields[16];
      	$this->user_firstname=$rs->fields[17];
      	$this->user_lastname=$rs->fields[18];
      	$this->user_blog=$rs->fields[19];
      }
      else
      {
      	$res=0;
      }
      return($res);
    } // end operation info 
    
    /**
     * Does ...
     */
    function login($user,$pass) 
    {
      $sql="select user_id "
      	  ."from user "
      	  ."where "
      	  ."user_id='$user' "
      	  ."and user_password='$pass' ";
      $rs=&$this->con->execute($sql);
      if($rs->EOF)
        $res=0;
      else 
        $res=$rs->fields[0];  
      return($res);
    } // end operation login
    
    /**
     * Does ...
     */
    function searchContact($user,$nick) 
    {
      $sql="select user_id "
      	  ."from user "
      	  ."where "
      	  ."user_id='$user' or user_nickname='$nick' ";
      $rs=&$this->con->execute($sql);
      if($rs->EOF)
        $res="0";
      else 
        $res=$rs->fields[0];  
      return($res);
    } // end operation searchContact
    
    /**
     * Does ...
     */
    function searchContact2chat($user,$name,$nick,$mail,$rgender,$agefrom,$ageto,$country,$zipcode,$keywords)
    {
      if(strlen($user)>0)
        $concontact=1;
      else
        $concontact=0;
          
      if($concontact==1)
      {
        $ocontact=new contactxuser($this->con);
        $arrContact=$ocontact->contactbyuserId($user);
        $cadContact="";
        if($arrContact!=0)
        {
      	  $cadContact="";
      	  for($i=0;$i<count($arrContact);$i++)
      	  {
      	    $cadContact.="'".$arrContact[$i]."',";	
      	  }
      	  $cadContact=substr($cadContact,0,(strlen($cadContact)-1));
        }
      }
      
      $sql="select user_id,user_name,user_nickname "
      	  ."from user "
      	  ."where user_id=user_id ";
      if($concontact)
        $sql.="and user_id<>'$user' ";	  
      if(strlen($name)>0)
        $sql.="and user_name like '$name%' ";
      if(strlen($nick)>0)
        $sql.="and user_nickname like '$nick%' ";
      if(strlen($mail)>0)
        $sql.="and user_email like '$mail%' ";
      if(strlen($rgender)>0)
        $sql.="and sex_id='$rgender' ";
      if((strlen($agefrom)>0)&&($agefrom!=0))
        $sql.="and user_age>=$agefrom ";
      if((strlen($ageto)>0)&&($ageto!=0))
        $sql.="and user_age<=$ageto ";
      if(strlen($country)>0)
        $sql.="and cou_id=$country ";
      if(strlen($zipcode)>0)
        $sql.="and user_zipcode like '$zipcode%' ";
      if(strlen($keywords)>0)
        $sql.="and user_interest like '%$keywords%' ";
      if((strlen($cadContact)>0)&&($concontact))
        $sql.="and user_id not in ($cadContact) "; 
      //usuarios públicos  
      $sql.="and user_public='1' ";   
      $sql.="order by user_name,user_nickname ";  
      
      $rs=&$this->con->execute($sql);
      if($rs->EOF)
        $res=0;
      else
      { 
        $res=array();
        $cont=0;
      	while(!$rs->EOF)
        {
      	  $res[$cont]=$rs->fields[0];  
      	  $cont++;
      	  $rs->next();
        }
      }
      return($res);
    } // end operation searchContact
    
    function searchHtmlUser($user,$online=1)
    {
    	
      $oaux=new user($this->con);
      $oaux->info($user);
      
	  $ocountry=new country($this->con);
	  $ocountry->info($oaux->cou_id);
	  
	  if($online)
	  {
	    $url="search_results1.php";
	  	//$cadurl="search_results1.php?vto=".$oaux->user_id;
	  	$cadurl="#";
	  	$cadurlAction=' onClick="submit();"';
	    $msgurl="Send an authorization request to chat with this user";
	    $rowspan=4;
	    $cadComment= <<<comentario
			  <TR>
                <TD>
				  <DIV ALIGN="RIGHT" CLASS="form">Comment:</DIV>
				</TD>
                <TD CLASS="TxtDescripciones">
                  <input type="hidden" name="vto" value="$oaux->user_id">
                  <textarea name="tcomment" cols="20" rows="3"></textarea>
                </TD>
              </TR>	    
comentario;
	  }
	  else
	  {
	  	$url="";
	  	$cadurl="signup.php?nolog=1&vb=0";
	  	$cadurlAction="";
	  	$msgurl="Sign up to send an authorization request with this user";
	  	$rowspan=3;
	  	$cadComment="";
	  }
      
      $cad= <<<mya
	  <FORM NAME="form$user" METHOD="POST" ACTION="$url">	
        <TR>
          <TD>
		    <TABLE  BORDER="0" ALIGN="CENTER" CELLPADDING="3" CELLSPACING="0">
              <TR>
                <TD WIDTH="60" ROWSPAN="$rowspan">
				  <DIV ALIGN="CENTER"><IMG SRC="$oaux->user_photo" WIDTH="$this->photo_width" HEIGHT="$this->photo_height"></DIV>
                  <DIV ALIGN="CENTER"></DIV>
                  <DIV ALIGN="CENTER"></DIV>
				</TD>
                <TD WIDTH="100" CLASS="form">
				  <DIV ALIGN="RIGHT">Nickname:</DIV>
				</TD>
                <TD WIDTH="100%" CLASS="user">
                  <A HREF="#" CLASS="user" onClick="MM_openBrWindow('contact_profile.php?uid=$oaux->user_id','contactprofile','width=800,height=600')">
				    $oaux->user_nickname
				  </A>
                </TD>
              </TR>
              <TR>
                <TD WIDTH="100" CLASS="form">
				  <DIV ALIGN="RIGHT">Age:</DIV>
				</TD>
                <TD CLASS="TxtDescripciones">$oaux->user_age</TD>
              </TR>
              <TR>
                <TD>
				  <DIV ALIGN="RIGHT" CLASS="form">Country:</DIV>
				</TD>
                <TD CLASS="TxtDescripciones">$ocountry->cou_name</TD>
              </TR>
              $cadComment
              <TR>
                <TD>&nbsp;</TD>
                <TD>&nbsp;</TD>
                <TD><A HREF="$cadurl" $cadurlAction CLASS="LinkWhosonline">$msgurl</A>.</TD>
              </TR>
            </TABLE>
		  </TD>
        </TR>
        <TR>
          <TD><DIV ALIGN="CENTER"><IMG SRC="images/red.gif" WIDTH="400" HEIGHT="1"></DIV></TD>
        </TR>
      </FORM>      
mya;
      
      return($cad);	
    }
    
    
    /**
     * Does ...
     */
    function searchAuthReq($user) 
    {
      $oauth=new authrequestxuser($this->con);
      $res=$oauth->authpending($user);
      return($res);
    } // end operation searchAuthReq
    
    /**
     * $user es fromuser_id y $touser=touser_id en authrequestxuser
     *
     * @param $user
     * @param $touser
     * @return html
     */
    function authHtmlUser($user,$touser)
    {
      $oaux=new user($this->con);
      $oaux->info($user);      
      
	  $ocountry=new country($this->con);
	  $ocountry->info($oaux->cou_id);
	  
	  $oauthreq=new authrequestxuser($this->con);
	  $oauthreq->info($oauthreq->id2cad($user,$touser));
      
      $cad= <<<mya
		<TR>
          <TD>
		    <TABLE  BORDER="0" ALIGN="CENTER" CELLPADDING="3" CELLSPACING="0">            
              <TR>
                <TD WIDTH="60" ROWSPAN="4">
				  <DIV ALIGN="CENTER"><IMG SRC="$oaux->user_photo" WIDTH="$this->photo_width" HEIGHT="$this->photo_height"></DIV>
                  <DIV ALIGN="CENTER"></DIV>
                  <DIV ALIGN="CENTER"></DIV>
				</TD>
                <TD WIDTH="100" CLASS="form">
				  <DIV ALIGN="RIGHT">Full Name:</DIV>
				</TD>
                <TD WIDTH="100%" CLASS="user">$oaux->user_name</TD>
              </TR>
              <TR>
                <TD WIDTH="100" CLASS="form">
				  <DIV ALIGN="RIGHT">Nickname:</DIV>
				</TD>
                <TD CLASS="TxtDescripciones">
                  <A HREF="#" CLASS="user" onClick="MM_openBrWindow('contact_profile.php?uid=$oaux->user_id','contactprofile','width=800,height=600')">
				    $oaux->user_nickname
				  </A>
                </TD>
              </TR>
              <TR>
                <TD>
				  <DIV ALIGN="RIGHT" CLASS="form">Country:</DIV>
				</TD>
                <TD CLASS="TxtDescripciones">$ocountry->cou_name</TD>
              </TR>
              <TR>
                <TD>
				  <DIV ALIGN="LEFT" CLASS="form">
                    <DIV ALIGN="RIGHT">Comment:</DIV>
                  </DIV>
				</TD>
                <TD CLASS="TxtDescripciones">
				  $oauthreq->autrequser_comment
				</TD>
              </TR>
              <TR>
                <TD>&nbsp;</TD>
                <TD>&nbsp;</TD>
                <TD>
				  <TABLE WIDTH="80%"  BORDER="0" ALIGN="CENTER" CELLPADDING="0" CELLSPACING="0">
                    <TR>
                      <TD WIDTH="50%">
					    <A HREF="request1.php?vto=$user&aord=1" CLASS="user">
						  <IMG SRC="images/visto.gif" WIDTH="16" HEIGHT="13" BORDER="0"> Allow user
						</A>
					  </TD>
                      <TD WIDTH="50%">
					    <A HREF="request1.php?vto=$user&aord=0" CLASS="user">
						  <IMG SRC="images/equis.gif" WIDTH="16" HEIGHT="15" BORDER="0"> Deny User
						</A>
					  </TD>
                    </TR>
				  </TABLE>
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
    
    /**
     * Does ...
     * @param $from
     * @param $to
     */
    function forgotPassword($username,$email) 
    { 
      $sql="select user_id from user "
      	  ."where user_id='$username' and user_email='$email' ";
      $rs=&$this->con->execute($sql);
      //echo "<hr>$sql<hr>";
      if($rs->EOF)
      {	  
      	$res="0";
      }
      else
      {
      	$oaux=new user($this->con);
      	$res=$rs->fields[0];
      	$oaux->info($res);

        //envío de mail
        include_once("class/parameter.php");
        $opar=new parameter($this->con);
        $opar->info();
      
        include_once("class/cMail.php");
        $subject="Livevideochat - Password to ".$oaux->user_nickname;
        $texto="Hi <b>".$oaux->user_name."</b>, your password is : ".$oaux->user_password."<br>";
        $omail=new cMail($opar->mail_authrequest,$oaux->user_email,$subject,$texto,$opar->dominio);
        @$omail->sendmail();
        $res=$oaux->user_id;
      }
      return($res);
    } // end operation sendRequest


} // end class user
?>
