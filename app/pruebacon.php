<?php
  include("includes/main.php");

  //include_once("class/c_conecta.php");
  //$ocon=new c_conecta();
  $ocon=$conn;
  
  $sql="select faq_id,faq_question from faq ";
  /*
  //con c_conecta.res.php
  $rs=$ocon->execute($sql);
  $cont=0;
    
  while(!$ocon->EOF)
  {
  	$fila=$ocon->fields;
  	echo "<hr>Fila $cont : <br>";
  	for($i=0;$i<count($fila);$i++)
  	{
  	  echo " $i :".$fila[$i]."<br>";
  	}
  	echo "<hr>";
  	$cont++;
  	$ocon->next();
  }
  */
  
    //con c_conecta.res.php
  $rs=&$ocon->execute($sql);
  $cont=0;
  
  if($rs->EOF)
    echo "<hr>No data<hr>";
  while(!$rs->EOF)
  {
  	$fila=$rs->fields;
  	echo "<hr>Fila $cont : <br>";
  	for($i=0;$i<count($fila);$i++)
  	{
  	  //echo " $i :".$fila[$i]."<br>";
  	  echo " $i :".$rs->fields[$i]."<br>";
  	}
  	echo "<hr>";
  	$cont++;
  	$rs->next();
  }
  
?>