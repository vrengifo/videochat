<?php
 class c_conecta
 {
    // Variables de la conexión a la BD
 	var $dbtype;
	var $dbserver;
    var $user;
	var	$password;
	var	$dbname;
	var $dbconnection;
	
	var $debug;

	
	//constructor
	function c_conecta($tipo="MySQL",$server="localhost",$user="root",$password="",$db="videochat")
	{
	  $this->dbtype=$tipo;
	  $this->dbserver=$server;
	  $this->user=$user;
	  $this->password=$password;
	  $this->dbname=$db;
	 
	  $this->dbconnection=$this->connect();
	  
	  $this->debug=0;
	} 
	
 	function connect()
	{
		switch ($this->dbtype) 
		{
			case "MySQL":
        			$ebase_datos=mysql_pconnect($this->dbserver, $this->user, $this->password);
        			mysql_select_db($this->dbname);
					//$this->dbconnection=$ebase_datos;
        			return $ebase_datos;
    				break;;
  
   			default:
					$ebase_datos=@mysql_pconnect($this->dbserver, $this->user, $this->password);				
        			mysql_select_db($this->dbname);
					//$this->dbconnection=$ebase_datos;
    	            return $ebase_datos;
    				break;;
        }
    }
    
    function execute($sql)
	{
	  $rs=new recordset($this->dbconnection);
	  if($this->debug)
	  {
	    echo "<hr>mysql: $sql <hr>";
	  }
	  $rs->execute($sql);
	  return($rs);
	}
    
    function close() 
	{
		return mysql_close($this->dbconnection);
	}
 }
 
 class recordset
 {
	var $dbconnection;
 	var $dbres;
	
	var $EOF;
	var $fields;
	
	function recordset($con)
	{
	  $this->dbconnection=$con;
	  $this->EOF=0;
	  $this->dbres=0;	
	}
 	
	function execute($sql)
	{
	  $rs=@mysql_query($sql, $this->dbconnection) or die(mysql_error());
      $this->dbres=$rs;
      if($this->total_records()==0)
        $this->EOF=1;
      else
      {
        $this->EOF=0;
        $this->fields=$this->retrieve();
      }
	  return($rs);
	}

	function retrieve_value($row,$query_atribute)
	{
		if($query_atribute != "")
			return mysql_result($this->dbres,$row,$query_atribute);
		else
			return mysql_result($this->dbres,$row);
	}
	
	function total_records() 
	{
		return @mysql_num_rows($this->dbres);
	}
	
	function retrieve()
	{
	  if(!$this->EOF)
	  {
		$row=$this->fields=mysql_fetch_row($this->dbres);
	    if($this->fields==0)
	    {
	      $this->EOF=1;
	      mysql_free_result($this->dbres);
	    }
	  }
	  else
	  {
	  	mysql_free_result($this->dbres);
	  	$row=0;
	  }
	  return($row);
	}
	
	function next()
	{
	  return($this->retrieve());	
	}
}
?>
