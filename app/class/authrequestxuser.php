<?php
class authrequestxuser 
{
    // Attributes
    var $fromuser_id;
    var $touser_id;
    var $autrequser_comment;
    var $autrequser_date;

    /**
     * Represent ...
     */
    var $con;
    var $separador;


    // Operations
    // Constructor
    /**
     * Does ...
     * @param conDb 
     */
    function authrequestxuser($conDb) 
    { 
      $this->con=$conDb;
      $this->separador=":";
    } // end operation authrequestxuser 
    
    function cad2id($id)
    {
      list($this->fromuser_id,$this->touser_id)=explode($this->separador,$id);
    }
    
    function id2cad($fromuser,$touser)
    {
      $res=$fromuser.$this->separador.$touser;
      return($res);	
    }
    
    function exist()
    {
      $sql="select fromuser_id,touser_id "
      	  ."from authrequestxuser "
      	  ."where fromuser_id='$this->fromuser_id' "
      	  ."and touser_id='$this->touser_id' ";
      $rs=&$this->con->execute($sql);
      if($rs->EOF)
        $res=0;
      else
        $res=$this->id2cad($this->fromuser_id,$this->touser_id);
      return($res);
    }

    /**
     * Does ...
     */
    function add() 
    { 
      $existe=$this->exist();
      if(!$existe)
      {
        $sql="insert into authrequestxuser "
      	  ."(fromuser_id,touser_id,autrequser_comment,autrequser_date) "
      	  ."values "
      	  ."('$this->fromuser_id','$this->touser_id','$this->autrequser_comment','$this->autrequser_date')";
        $rs=&$this->con->execute($sql);
        if(!$rs)
          $res=0;
        else
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
      $oaux=new authrequestxuser($this->con);
      $oaux->cad2id($id);
      $sql="delete from authrequestxuser "
      	  ."where fromuser_id='$oaux->fromuser_id' and touser_id='$oaux->touser_id' ";
      $rs=&$this->con->execute($sql);
      return($id);  
    } // end operation del 
    
    /**
     * Does ...
     * @param id 
     */
    function info($id) 
    { 
      $oaux=new authrequestxuser($this->con);
      $oaux->cad2id($id);
      $sql="select fromuser_id,touser_id,autrequser_comment,autrequser_date "
      	  ."from authrequestxuser "
      	  ."where fromuser_id='$oaux->fromuser_id' and touser_id='$oaux->touser_id' ";
      $rs=&$this->con->execute($sql);
      if($rs->EOF)
        $res=0;
      else
      {
      	$res=$id;
      	$this->fromuser_id=$rs->fields[0];
      	$this->touser_id=$rs->fields[1];
      	$this->autrequser_comment=$rs->fields[2];
      	$this->autrequser_date=$rs->fields[3];
      }
      return($res);  
    } // end operation info 

    /**
     * Does ...
     * @param $from
     * @param $to
     */
    function sendRequest($from,$to,$comment) 
    { 
      $oaux=new authrequestxuser($this->con);
      $oaux->fromuser_id=$from;
      $oaux->touser_id=$to;
      $oaux->autrequser_comment=$comment;
      $oaux->autrequser_date=date("Y-m-d");
      
      $res=$oaux->add();
      //envío de mail
      include_once("class/user.php");
      $oUfrom=new user($this->con);
      $oUto=new user($this->con);
      
      $oUfrom->info($from);
      $oUto->info($to);
      
      include_once("class/parameter.php");
      $opar=new parameter($this->con);
      $opar->info();
      
      include_once("class/cMail.php");
      $subject="Livevideochat - Request to ".$oUto->user_nickname;
      $texto="Hi <b>".$oUto->user_name."</b>, ".$oUfrom->user_nickname." send an authorization request to chat with you and say: <br>";
      $texto.=$comment;
      $omail=new cMail($opar->mail_authrequest,$oUto->user_email,$subject,$texto,$opar->dominio);
      @$omail->sendmail();
      
      return($res);
    } // end operation sendRequest
    
    /**
     * Does ...
     * @param $from
     * @param $to
     */
    function authpending($user) 
    { 
      $oaux=new authrequestxuser($this->con);
      $sql="select fromuser_id,autrequser_date "
      	  ."from authrequestxuser "
      	  ."where touser_id='$user' "
      	  ."order by autrequser_date,fromuser_id ";
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
    } // end operation sendRequest
    
    /**
     * Does ...
     * @param $fromuser
     * @param $touser
     * @param $aord
     */
    function allowdeny($fromuser,$touser,$aord) 
    { 
      if($this->con->debug==1)
        echo "<hr>authrequestxuser->allowdeny($fromuser,$touser,$aord)<hr>";
      $oaux=new authrequestxuser($this->con);
      $id=$oaux->id2cad($fromuser,$touser);
      
      $existe=$oaux->info($id);
      
      if($existe)
      {
        if($aord==1)//allow
        {
          include_once("class/contactxuser.php");
          $ocontact=new contactxuser($this->con);
      
          $ocontact->user_id=$fromuser;
          $ocontact->contact_id=$touser;
          $ocontact->contact_blocked="0";
          $resAddContact=$ocontact->addContact();
          
          if($this->con->debug==1)
          {
          	echo "resAddContact: $resAddContact";
          }
          $res=$oaux->del($id);  
        }
        else
          $res=$oaux->del($id);
      }
      else
        $res="0";
      if($this->con->debug==1)
        echo "<hr>authrequestxuser.allowdeny.res: $res <hr>";
      return($res);
    } // end operation allowdeny

} // end class authrequestxuser
?>
