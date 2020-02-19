<?php
class plan 
{
    // Attributes
    var $plan_id;
    var $plan_name;
    var $plan_cost;
    var $plan_duration;
    var $plan_nboxes;
    var $plan_url;
    var $plan_urlfeatures;

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
    function plan($conDb) 
    { 
      $this->con=$conDb;
    } // end operation plan 

    /**
     * Does ...
     */
    function add() 
    { 
      $sql="insert into plan "
      	  ."("
      	  ."plan_name,plan_cost,"
      	  ."plan_duration,plan_nboxes,plan_url,plan_urlfeatures "
      	  .") "
      	  ."values "
      	  ."("
      	  ."'$this->plan_name','$this->plan_cost',"
      	  ."'$this->plan_duration','$this->plan_nboxes','$this->plan_url','$this->plan_urlfeatures' "
      	  .") ";
      $rs=&$this->con->execute($sql);
      	  
      return($res) ;
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
      $sql="select plan_name,plan_cost,"
      	  ."plan_duration,plan_nboxes,plan_url,plan_urlfeatures "
      	  ."from plan "
      	  ."where plan_id=$id ";
      $rs=&$this->con->execute($sql);
      if($rs->EOF)
        $res=0;
      else
      {
      	$res=$this->plan_id=$id;
      	$this->plan_name=$rs->fields[0];
      	$this->plan_cost=$rs->fields[1];
      	$this->plan_duration=$rs->fields[2];
      	$this->plan_nboxes=$rs->fields[3];
      	$this->plan_url=$rs->fields[4];
      	$this->plan_urlfeatures=$rs->fields[5];
      }
      return($res);
    } // end operation info 
    
    /**
     * Does ...
     * @param $nboxes 
     */
    function buscarxnbox($nboxes) 
    { 
      $sql="select plan_id "
      	  ."from plan "
      	  ."where plan_nboxes=$nboxes ";
      $rs=&$this->con->execute($sql);
      if($rs->EOF)
        $res=0;
      else
      {
      	$res=$rs->fields[0];
      }
      return($res);
    } // end operation buscarxnbox
    
    /**
     * Does ...
     * @param $nombre
     * @param $selected
     * @param $class
     */
    function htmlRadio($nombre,$selected,$class="") 
    { 
      $oaux=new plan($this->con);
      
      $sql="select plan_id,plan_name,plan_cost,plan_nboxes from plan order by plan_nboxes,plan_cost,plan_name";
      $rs=&$this->con->execute($sql);
      
      $cad='';
      if(strlen($class)>0)
        $cad.='<span class="'.$class.'" >';
        
      $cad.='<TABLE BORDER="0" CELLSPACING="0" CELLPADDING="5" ';
      if(strlen($class)>0)
        $cad.=' class="'.$class.'" ';
      $cad.='>';
      while(!$rs->EOF)
      {
        $vid=$rs->fields[0];
        $oaux->info($vid);
      	
        $cad.='<tr>';        
        //radio
      	$cad.='  <td>';
      	$cad.='    <input type="radio" name="'.$nombre.'" value="'.$oaux->plan_id.'" ';
        if($oaux->plan_id==$selected)
          $cad.='   checked';
        $cad.='    > ';
        $cad.='  </td>';
        //nombre
        $cad.='  <td>'.$oaux->plan_name.' </td>';
        //texto info
        if($oaux->plan_nboxes==0)
          $info='Free';
        else
          $info='$ '.$oaux->plan_cost." / ".$oaux->plan_duration." days";  
        $cad.='  <td>'.$info.' </td>';
        
        $cad.='</tr>';
        $rs->next();
      }
      $cad.='</TABLE>';
      
      if(strlen($class)>0)
        $cad.='</span>';
      
      return($cad);
    } // end operation htmlSelect
    
    /**
     * Does ...
     * @param $nombre
     * @param $selected
     * @param $class
     */
    function htmlSelect($nombre,$selected,$class="") 
    { 
      $oaux=new plan($this->con);
      
      $sql="select plan_id,plan_name,plan_cost,plan_nboxes from plan order by plan_nboxes,plan_cost,plan_name";
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

} // end class plan
?>
