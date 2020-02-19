<?php
class status 
{
    // Attributes
    var $sta_id;
    var $sta_name;
    var $sta_icon;

    /**
     * Represent ...
     */
    var $con;

    // Operations
    // Constructor
    /**
     * Does ...
     * @param conDb 
     */
    function status($conDb) 
    { 
      $this->con=$conDb;
    } // end operation status 
    
    /**
     * Does ...
     */
    function online() 
    { 
      $sta_id=1;
      $this->info($sta_id);
      return($sta_id);
    } // end operation online 
    
    /**
     * Does ...
     */
    function offline() 
    { 
      $sta_id=2;
      $this->info($sta_id);
      return($sta_id);
    } // end operation online 

	/**
     * Does ...
     */
    function waiting() 
    { 
      $sta_id=3;
      $this->info($sta_id);
      return($sta_id);
    } // end operation online 
    
    /**
     * Does ...
     */
    function blocked() 
    { 
      $sta_id=4;
      $this->info($sta_id);
      return($sta_id);
    } // end operation online 
    
    /**
     * Does ...
     * @param id 
     */
    function info($id) 
    { 
      $sql="select sta_id,sta_name,sta_icon "
      	  ."from status "
      	  ."where sta_id=$id ";
      $rs=&$this->con->execute($sql);
      if($rs->EOF)
        $res=0;
      else
      {
      	$res=$id;
      	$this->sta_id=$rs->fields[0];
      	$this->sta_name=$rs->fields[1];
      	$this->sta_icon=$rs->fields[2];
      }  	  
      return($res);
    } // end operation info 

} // end class status
?>
