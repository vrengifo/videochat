<?php
class statusxuser 
{
    // Attributes
    var $user_id;
    var $sta_id;
    var $staxuser_date;

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
    function statusxuser($conDb) 
    { 
      $this->con=$conDb;
      $this->separador=":";
      $this->staxuser_date=date("Y-m-d H:i:s");
    } // end operation statusxuser 

    /*
    function cad2id($id)
    {
      list($this->user_id,$this->sta_id)=explode($this->separador,$id);
    }
    
    function id2cad($user,$sta)
    {
      $res=$user.$this->separador.$sta;
      return($res);	
    }
    */
    
    /**
     * Does ...
     */
    function add() 
    { 
      $sql="insert into statusxuser "
      	  ."(user_id,sta_id,staxuser_date) "
      	  ."values "
      	  ."('$this->user_id',$this->sta_id,'$this->staxuser_date')";
      $rs=&$this->con->execute($sql);
      if($rs)
        $res=$this->user_id;
      else
        $res="0";  	  
      return($res);
    } // end operation add 
    
    /**
     * Does ...
     */
    function update($user) 
    { 
      $sql="update statusxuser "
      	  ."set sta_id=$this->sta_id,staxuser_date='$this->staxuser_date' "
      	  ."where user_id='$user' ";
      $rs=&$this->con->execute($sql);
      if($rs)
        $res=$user;
      else
        $res="0";  
      return($res);
    } // end operation add 

    /**
     * Does ...
     * @param userId 
     */
    function info($user) 
    { 
      $sql="select user_id,sta_id,staxuser_date "
      	  ."from statusxuser "
      	  ."where user_id='$user' ";
      $rs=&$this->con->execute($sql);
      if($rs->EOF)
        $res="0";
      else
      {
      	$res=$id;
      	$this->user_id=$rs->fields[0];
      	$this->sta_id=$rs->fields[1];
      	$this->staxuser_date=$rs->fields[2];
      }  
      return($res);
    } // end operation info 
    
    /**
     * Does ...
     * @param userId 
     */
    function crearoactualizar($user,$state) 
    { 
      $oaux=new statusxuser($this->con);
      $existe=$oaux->info($user);
      
      $this->user_id=$user;
      $this->sta_id=$state;
      
      if($existe=="0")
      {
      	$res=$this->add();
      }
      else
      {
      	$res=$this->update($this->user_id);
      }
      return($res);
    } // end operation actual
    
    /**
     * Does ...
     * @param userId 
     */
    function userbystatus($estado) 
    { 
      $sql="select user_id "
      	  ."from statusxuser "
      	  ."where sta_id='$estado' ";
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
      	  $rs->next();
      	  $cont++;	
      	}
      }  
      return($res);
    } // end operation userbystatus 
    
} // end class statusxuser
?>
