<?php
class country 
{
    // Attributes
    var $cou_id;
    var $cou_name;
    var $con;

    // Operations
    
    // Constructor
    /**
     * Does ...
     * @param conDb 
     */
    function country($conDb) 
    { 
      $this->con=$conDb;
    } // end operation country 
    
    /**
     * Does ...
     * @param id 
     */
    function info($id) 
    { 
      $sql="select cou_id,cou_name from country where cou_id=$id ";
      $rs=&$this->con->execute($sql);
      
      if($rs->EOF)
        $res=0;
      else
      {
      	$res=$id;
      	$this->cou_id=$rs->fields[0];
      	$this->cou_name=$rs->fields[1];
      }
      return($res);
    } // end operation info 
    
    /**
     * Does ...
     * @param $nombre
     * @param $selected
     * @param $class
     */
    function htmlSelect($nombre,$selected,$class="",$choose=0) 
    { 
      $sql="select cou_id,cou_name from country order by cou_name asc";
      $rs=&$this->con->execute($sql);
      
      $cad='';
      $cad.='<select name="'.$nombre.'" ';
      if(strlen($class)>0)
        $cad.='class="'.$class.'" ';
      $cad.='>';
      if($choose==1)
        $cad.='<option value="">Choose country</option>';
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

} // end class country
?>
