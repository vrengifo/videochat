<?php
class parameter
{
  //variables principales
  var $con;
  var $photo_width;
  var $photo_height;
  var $exp_session;
  var $dominio;
  var $mail_authrequest;
  //constructor
  function parameter($conDB)
  {
  	$this->con=$conDB;
  }
  
  function info()
  {
  	$sql="select id,photo_width,photo_height,exp_session,"
  		."dominio,mail_authrequest "
  		."from parameter ";
  	$rs=&$this->con->execute($sql);
  	if($rs->EOF)
  	{	
  	  $this->photo_width=100;
  	  $this->photo_height=120;
  	  $this->exp_session=84600;
  	  $this->dominio="livevideochat.com";
  	  $this->mail_authrequest="no-reply@".$this->dominio;
  	}
  	else 
  	{	
  	  $this->photo_width=$rs->fields[1];
  	  $this->photo_height=$rs->fields[2];
  	  $this->exp_session=$rs->fields[3];
  	  $this->dominio=$rs->fields[4];
  	  $this->mail_authrequest=$rs->fields[5];
  	}
  	return (1);
  }
  
}
?>