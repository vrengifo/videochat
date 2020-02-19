<?php
class billxUser 
{
    var $user_id;
    var $billuser_id;
    var $cc_id;
    var $billuser_holdername;
    var $billuser_number;
    var $billuser_expmonth;
    var $billuser_expyear;
    var $billuser_address;

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
    function billxUser($conDb) 
    { 
      $this->con=$conDb;
    } // end operation billxUser 
    
    /**
     * Does ...
     */
    function exist() 
    { 
      $sql="select billuser_id from billxuser "
      	  ."where user_id='$this->user_id' and cc_id='$this->cc_id' "
      	  ."and billuser_number='$this->billuser_number' ";
      $rs=&$this->con->execute($sql);
      if($rs->EOF)
        $res=0;
      else 
        $res=$rs->fields[0];  	  
      return($res);
    } // end operation exist
     
    /**
     * Does ...
     */
    function validate() 
    { 
      $noerror=1; 
       if(strlen($this->user_id)==0)
       {
         $this->user_id="-";
         $noerror=0;//tiene errores
       }
       if(strlen($this->billuser_holdername)==0)
       {
         $this->billuser_holdername="-";
         $noerror=0;
       }
       if(strlen($this->billuser_number)==0)
       {
         $this->billuser_number="-";
         $noerror=0;
       }  
      return($noerror);
    } // end operation validate

    /**
     * Does ...
     */
    function add() 
    { 
      $existe=$this->exist();
      if((!$existe)&&($this->validate()))
      {
        $sql="insert into billxuser "
      	  ."("
      	  ."user_id,cc_id,billuser_holdername,billuser_number,"
      	  ."billuser_expmonth,billuser_expyear,billuser_address "
      	  .") "
      	  ."values "
      	  ."("
      	  ."'$this->user_id','$this->cc_id','$this->billuser_holdername','$this->billuser_number',"
      	  ."'$this->billuser_expmonth','$this->billuser_expyear','$this->billuser_address' "
      	  .")";
        $rs=&$this->con->execute($sql);
        if($rs)
          $res=$this->exist();
        else
          $res=0;
      }
      else
        $res=$existe;
      	  
      return($res);
    } // end operation add 

    /**
     * Does ...
     * @param id 
     */
    function del($id) 
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
      $sql="select "
      	  ."user_id,cc_id,billuser_holdername,billuser_number,"
      	  ."billuser_expmonth,billuser_expyear,billuser_address "
      	  ."from billxuser "
      	  ."where billuser_id='$id' ";
      $rs=&$this->con->execute($sql);
      if(!$rs->EOF)
      {
      	$res=$this->billuser_id=$id;
      	$this->user_id=$rs->fields[0];
      	$this->cc_id=$rs->fields[1];
      	$this->billuser_holdername=$rs->fields[2];
      	$this->billuser_number=$rs->fields[3];
      	$this->billuser_expmonth=$rs->fields[4];
      	$this->billuser_expyear=$rs->fields[5];
      	$this->billuser_address=$rs->fields[6];
      }
      else
      {
      	$res=0;
      }
      return($res);
    } // end operation info 
    
    /**
     * Does ...
     * @param $nombre
     * @param $selected 
     */
    function htmlSelectMonth($nombre,$selected,$class="") 
    {          	
      		
      $cad='';
      $cad.='<select name="'.$nombre.'" ';
      if(strlen($class)>0)
        $cad.='class="'.$class.'"';
      $cad.=' >';
      //enero
      $cad.='  <option value="01" ';
      if($selected=="01")
        $cad.='selected';
      $cad.='>January</option>';
      //febrero
      $cad.='  <option value="02" ';
      if($selected=="02")
        $cad.='selected';
      $cad.='>February</option>';
      //marzo
      $cad.='  <option value="03" ';
      if($selected=="03")
        $cad.='selected';
      $cad.='>March</option>';
      //abril
      $cad.='  <option value="04" ';
      if($selected=="04")
        $cad.='selected';
      $cad.='>April</option>';
      //mayo
      $cad.='  <option value="05" ';
      if($selected=="05")
        $cad.='selected';
      $cad.='>May</option>';
      //junio
      $cad.='  <option value="06" ';
      if($selected=="06")
        $cad.='selected';
      $cad.='>June</option>';
      //julio
      $cad.='  <option value="07" ';
      if($selected=="07")
        $cad.='selected';
      $cad.='>July</option>';
      //agosto
      $cad.='  <option value="08" ';
      if($selected=="08")
        $cad.='selected';
      $cad.='>August</option>';
      //septiembre
      $cad.='  <option value="09" ';
      if($selected=="09")
        $cad.='selected';
      $cad.='>September</option>';
      //octubre
      $cad.='  <option value="10" ';
      if($selected=="10")
        $cad.='selected';
      $cad.='>October</option>';
      //noviembre
      $cad.='  <option value="11" ';
      if($selected=="11")
        $cad.='selected';
      $cad.='>November</option>';
      //diciembre
      $cad.='  <option value="12" ';
      if($selected=="12")
        $cad.='selected';
      $cad.='>December</option>';
      
      $cad.='</select>';
      return($cad);
    } // end operation htmlSelectMonth
    
    /**
     * Does ...
     * @param $nombre
     * @param $selected 
     */
    function htmlSelectYear($nombre,$selected,$class="",$intervalo=5) 
    {          	
      		
      $cad='';
      $cad.='<select name="'.$nombre.'" ';
      if(strlen($class)>0)
        $cad.='class="'.$class.'"';
      $cad.=' >';
      $anioact=date("Y");
      for($i=$anioact;$i<($anioact+$intervalo);$i++)
      {
        //
        $cad.='  <option value="'.$i.'" ';
        if($selected==$i)
          $cad.='selected';
        $cad.='>'.$i.'</option>';
      }
      
      $cad.='</select>';
      return($cad);
    } // end operation htmlSelectYear

} // end class billxUser
?>
