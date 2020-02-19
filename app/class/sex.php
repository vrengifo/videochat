<?php
class sex 
{
    var $sex_id;
    var $sex_name;

    // Operations
    /**
     * Does ...
     */
    function male() 
    { 
      $this->sex_id="M";
      $this->sex_name="Male";
      return($this->sex_id);
    } // end operation male 
    
    /**
     * Does ...
     */
    function female() 
    { 
      $this->sex_id="F";
      $this->sex_name="Female";
      return($this->sex_id);
    } // end operation female
    
    /**
     * Does ...
     * @param sexId 
     */
    function info($sexId) 
    { 
      $oaux=new sex();
      if($sexId==$oaux->male())
      	$this->male();
      if($sexId==$oaux->female())
        $this->female();
      return($this->sex_id);
    } // end operation info 

    /**
     * Does ...
     * @param $nombre
     * @param $selected
     * @param $class
     */
    function htmlRadio($nombre,$selected,$class="") 
    { 
      $cad='';
      if(strlen($class)>0)
        $cad.='<span class="'.$class.'" >';
      //radio de male
      $cad.='<input type="radio" name="'.$nombre.'" value="'.$this->male().'" ';
      if($this->sex_id==$selected)
        $cad.=' checked';
      $cad.=' > '.$this->sex_name.' &nbsp&nbsp';
      //radio de female
      $cad.='<input type="radio" name="'.$nombre.'" value="'.$this->female().'" ';
      if($this->sex_id==$selected)
        $cad.=' checked';
      $cad.=' > '.$this->sex_name.' &nbsp&nbsp';
      
      if(strlen($class)>0)
        $cad.='</span>';
      
      return($cad);
    } // end operation htmlRadio
    
    /**
     * Does ...
     * @param $nombre
     * @param $selected
     * @param $class
     */
    function htmlSelect($nombre,$selected,$class="") 
    { 
      $cad='';
      //radio de male
      $cad.='<select name="'.$nombre.'" ';
      if(strlen($class)>0)
        $cad.='class="'.$class.'" ';
      $cad.='>';
      //male
      $cad.='  <option value="'.$this->male().'" ';
      if($this->sex_id==$selected)
        $cad.='selected';
      $cad.='>'.$this->sex_name.'</option>';
      //female
      $cad.='  <option value="'.$this->female().'" ';
      if($this->sex_id==$selected)
        $cad.='selected';
      $cad.='>'.$this->sex_name.'</option>';
      $cad.='</select>';
      return($cad);
    } // end operation htmlSelect
    
} // end class sex
?>
