<?php
class creditcard 
{

    // Attributes
    var $cc_id;
    var $cc_name;

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
    function creditcard($conDb) 
    { 
      $this->con=$conDb;
    } // end operation creditcard 

    /**
     * Does ...
     */
    function add() 
    { 
        // your code here
        return ;
    } // end operation add 

    /**
     * Does ...
     */
    function del() 
    { 
        // your code here
        return ;
    } // end operation del 

    /**
     * Does ...
     * @param id 
     */
    function update($id) 
    { 
        // your code here
        return ;
    } // end operation update 

    /**
     * Does ...
     * @param id 
     */
    function info($id) 
    { 
      $sql="select cc_id,cc_name "
      	  ."from creditcard "
      	  ."where cc_id=$id ";
      $rs=&$this->con->execute($sql);
      if($rs->EOF)
        $res=0;
      else 
      {
      	$res=$id;
      	$this->cc_id=$rs->fiels[0];
      	$this->cc_name=$rs->fiels[1];
      }  	  
        return ;
    } // end operation info 
    
    /**
     * Does ...
     * @param $nombre
     * @param $selected
     * @param $class
     */
    function htmlSelect($nombre,$selected,$class="") 
    { 
      $sql="select cc_id,cc_name from creditcard order by cc_name asc";
      $rs=&$this->con->execute($sql);
      
      $cad='';
      $cad.='<select name="'.$nombre.'" ';
      if(strlen($class)>0)
        $cad.='class="'.$class.'" ';
      $cad.='>';
      while(!$rs->EOF)
      {
        $valor=$rs->fields[0];
        $texto=$rs->fields[1];
      	$cad.='  <option value="'.$valor.'" ';
        if($valor==$selected)
          $cad.='selected';
        $cad.='>'.$texto.'</option>';
        $rs->next();
      }
      $cad.='</select>';
      return($cad);
    } // end operation htmlSelect

} // end class creditcard
?>
