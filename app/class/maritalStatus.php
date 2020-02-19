<?php
class maritalStatus 
{
    // Attributes
    var $marsta_id;
    var $marsta_name;

    // Operations
        
    /**
     * Does ...
     */
    function single() 
    { 
      $this->marsta_id="S";
      $this->marsta_name="Single";
      return($this->marsta_id);
    } // end operation single 
    
    /**
     * Does ...
     */
    function married() 
    { 
      $this->marsta_id="C";
      $this->marsta_name="Married";
      return($this->marsta_id);
    } // end operation married 
    
    /**
     * Does ...
     */
    function divorced() 
    { 
      $this->marsta_id="D";
      $this->marsta_name="Divorced";
      return($this->marsta_id);
    } // end operation divorced 
    
    /**
     * Does ...
     * @param id 
     */
    function info($id) 
    { 
      $oaux=new maritalStatus();
      if($id==$oaux->single())
      	$this->single();
      if($id==$oaux->married())
        $this->married();
      if($id==$oaux->divorced())
        $this->divorced();  
      return($this->marsta_id);
    } // end operation info 

    /**
     * Does ...
     */
    function htmlRadio($nombre,$selected,$class="") 
    { 
      $cad='';
      if(strlen($class)>0)
        $cad.='<span class="'.$class.'" >';
      //radio de single
      $cad.='<input type="radio" name="'.$nombre.'" value="'.$this->single().'" ';
      if($this->marsta_id==$selected)
        $cad.=' checked';
      $cad.=' > '.$this->marsta_name.' &nbsp&nbsp';
      //radio de married
      $cad.='<input type="radio" name="'.$nombre.'" value="'.$this->married().'" ';
      if($this->marsta_id==$selected)
        $cad.=' checked';
      $cad.=' > '.$this->marsta_name.' &nbsp&nbsp';
      //radio de divorced
      $cad.='<input type="radio" name="'.$nombre.'" value="'.$this->divorced().'" ';
      if($this->marsta_id==$selected)
        $cad.=' checked';
      $cad.=' > '.$this->marsta_name.' &nbsp&nbsp';
      
      if(strlen($class)>0)
        $cad.='</span>';
      
      return($cad);
    } // end operation htmlRadio
    
    /**
     * Does ...
     * @param $nombre
     * @param $selected 
     */
    function htmlSelect($nombre,$selected,$class="") 
    { 
      $cad='';
      $cad.='<select name="'.$nombre.'" ';
      if(strlen($class)>0)
        $cad.='class="'.$class.'"';
      $cad.=' >';
      //single
      $cad.='  <option value="'.$this->single().'" ';
      if($this->marsta_id==$selected)
        $cad.='selected';
      $cad.='>'.$this->marsta_name.'</option>';
      //married
      $cad.='  <option value="'.$this->married().'" ';
      if($this->marsta_id==$selected)
        $cad.='selected';
      $cad.='>'.$this->marsta_name.'</option>';
      //divorced
      $cad.='  <option value="'.$this->divorced().'" ';
      if($this->marsta_id==$selected)
        $cad.='selected';
      $cad.='>'.$this->marsta_name.'</option>';
      $cad.='</select>';
      return($cad);
    } // end operation htmlSelect

} // end class maritalStatus
?>
