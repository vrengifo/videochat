<?php
//clase para envío de mails

class cMail
{
  //variables principales
  var $mfrom;
  var $mto;
  var $msubject;
  var $mheaders;
  //variables que dependen de otras tablas 
  var $mtext;
  
  //constructor
  function cMail($vfrom,$vto,$vsubject,$vtext,$vurlJoin="www.livevideochat.com")
  {
  	$this->mfrom=$vfrom;
  	$this->mto=$vto;
  	$this->msubject=$vsubject;
  	
  	//$auxtexto="<html><head><style type='text/css'>".$this->css2text("styles.css")."</script></head>";
  	$auxtexto="<html><head></head>";
  	
  	$this->mtext=$auxtexto.$vtext;

	$headers = "Return-Path: <$vfrom>\n"; 
	$headers .= "From: Livevideochat <".$vfrom.">\n"; 
	$headers .= "Reply-To: Livevideochat <".$vfrom.">\n"; 
	$headers .= "MIME-Version: 1.0\n"; 
	$headers .= "X-Sender: Livevideochat <".$vfrom.">\n"; 
	$headers .= "X-Mailer: PHP4\n"; //mailer 
	$headers .= "X-Priority: 3\n"; //1 UrgentMessage, 3 Normal	
	$headers .= "Content-type: text/html\n";
	
	$this->mheaders=$headers;
	
	$by='<br><br><a href="http://'.$vurlJoin.'">Join us - LiveVideoChat</a><br>';
	$this->mtext.=$by."</body></html>";
  }
  
  function sendmail()
  {
  	$res=@mail($this->mto,$this->msubject,$this->mtext,$this->mheaders,"-f $this->mfrom");
  	return ($res);
  }
  
  function css2text($path)
  {
  	$fd = fopen($path,"r");
  	$cad="";
	while (!feof($fd)) 
	{
      $buffer = fgets($fd, 4096);
      $cad.=$buffer;
  	}
  	fclose($fd);
  	return($cad);
  }
  
}
?>