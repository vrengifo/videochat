<?php
class group 
{

    // Attributes
    var $group_id;
    var $group_name;
    var $group_public;
    var $user_id;

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
    function group($conDb) 
    { 
      $this->con=$conDb;
    } // end operation group 
    
    /**
     * existe
     */
    function exist($name,$user)
    { 
      $esPublico=$this->isPublic($name);
      if(!$esPublico)
      {
        $sql="select group_id from `group` "
      	    ."where group_name='$name' "
      	    ."and user_id='$user' ";
        $rs=&$this->con->execute($sql);
        if($rs)
          $res=$rs->fields[0];
        else
          $res=0;  
      }
      else 
      {
        $res=$esPublico;
      }
      return($res);
    } // end operation exist 
    
    /**
     * es publico
     */
    function isPublic($name)
    { 
      $sql="select group_id from `group` "
      	  ."where group_name='$name' "
      	  ."and group_public='1' ";
      $rs=&$this->con->execute($sql);
      if($rs)
        $res=$rs->fields[0];
      else
        $res=0;  	  
      return($res);
    } // end operation isPublic 
    
    /**
     * Añade a base de datos un nuevo grupo
     */
    function add() 
    { 
      $existe=$this->exist($this->group_name,$this->user_id);
      if(!$existe)
      {
        $sql="insert into `group` "
      	    ."(group_name,group_public,user_id) "
      	    ."values "
      	    ."('$this->group_name','$this->group_public','$this->user_id')";
        $rs=&$this->con->execute($sql);
        $newId=$this->exist($this->group_name,$this->user_id);
        $res=$newId;
      }
      else 
      {
      	$res=$existe;
      }
      return($res);
    } // end operation add 

    /**
     * Elimina solo grupos privados
     */
    function del($id,$user) 
    { 
      $sql="delete from `group` where group_id=$id and user_id='$user' ";
      $rs=&$this->con->execute($sql);
      if($rs)
        $res=$id;
      else
        $res=0;  
      return($res);
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
      $sql="select group_id,group_name,group_public,user_id "
      	  ."from `group` "
      	  ."where group_id=$id ";
      $rs=&$this->con->execute($sql);
      if($rs->EOF)
        $res=0;
      else
      {
      	$res=$id;
      	$this->group_id=$rs->fields[0];
      	$this->group_name=$rs->fields[1];
      	$this->group_public=$rs->fields[2];
      	$this->user_id=$rs->fields[3];
      }
      return($res);
    } // end operation info 
    
    /**
     * Genera un arreglo o una cadena de los grupos creados x el usuario
     * $arregloOcad si tiene "c" retorna como cadena, si tiene "a" retornar arreglo
     * @param $user
     * @param $arregloOcad
     */
    function listPrivateGroup($user,$arregloOcad="c")
    {
      $sql="select group_id,group_name from `group` "
      	  ."where user_id='$user' "
      	  ."order by group_name";
      $rs=&$this->con->execute($sql);
      
      if($arregloOcad=="a")//arreglo
      {
      	$cont=0;
      	$arreglo=array();
      }
      else 
      {
      	$cad="";
      	$sep=",";
      }
      if($rs->EOF)
      {
      	return(0);
      }
      else
      {
        while(!$rs->EOF)
        {
      	  $vgroup=$rs->fields[0];
      	  if($arregloOcad=="a")
      	  {  
      	    $arreglo[$cont]=$vgroup;
      	    $cont++;
      	  }
      	  else 
      	  {
      	    $cad.=$vgroup.$sep;
      	  }
      	  $rs->next();
        }
        if($arregloOcad=="a")
        {
          return($arreglo);
        }
        else
        {
          $cad=substr($cad,0,(strlen($cad)-1));
          return($cad);
        }
      }
    }
    
    /**
     * Hace el html necesario para mostrar un campo select
     * @param $nombre
     * @param $selected
     * @param $class
     * @param $user
     */
    function htmlSelect($nombre,$selected,$class="",$user="") 
    { 
      if(strlen($user)==0)//solo grupos públicos
      {
        $sql="select group_id,group_name from `group` "
        	."where group_public='1' "
        	."order by group_name asc";
      }
      else//todos los grupos
      { 
        $sql="select group_id,group_name from `group` "
        	."where group_public='1' ";
        //grupos privados
        $cadGrupo=$this->listPrivateGroup($user,"c");//retorna cadena para hacer group_id in ($cadGrupo)
        if($cadGrupo!=0)
          $sql.="or group_id in ($cadGrupo) ";
        $sql.="order by group_name asc";
      }  
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
    
    function ncontactxgroup($user,$grp_id)
    {
      //echo "<hr>grp_id: $grp_id <hr>";
      $sql="select count(user_id) from contactxuser "
      	  ."where user_id='$user' and group_id=$grp_id ";
      $rs=&$this->con->execute($sql);
      $res=$rs->fields[0];
      return($res);	  
    }
    
    function listarGrupos($user)
    {
      $sql="select group_id,group_name from `group` "
        	."where group_public='1' ";
        //grupos privados
      $cadGrupo=$this->listPrivateGroup($user,"c");//retorna cadena para hacer group_id in ($cadGrupo)
      if($cadGrupo!=0)
        $sql.="or group_id in ($cadGrupo) ";
      $sql.="order by group_name asc";
      $rs=&$this->con->execute($sql);
      if($rs->EOF)
        return(0);
      else
      {  
        $cont=0;
        $res=array();
        $aux=new group($this->con);
        while(!$rs->EOF)
        {
          $idG=$rs->fields[0];
          $aux->info($idG);
          $res[$cont]=$aux;
          $rs->next();
          $cont++;
        }
        return($res);
      }
    }

} // end class group
?>
