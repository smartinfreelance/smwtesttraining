<?php
class LoginCRUD extends CI_Model {

    function LoginCRUD()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function intentaLoggear($usuario,$password)
	{
		/*
        $this->db->where("usuario = '".$usuario."'");
        $this->db->where("password = md5('".$password."')");
        return $this->db->get('usuarios')->result();  */
        $query = $this->db->query("select
										*
									from
										usuarios
									where 
										usuarios.usuario = '".$usuario."'
									and
										usuarios.password = md5('".$password."')
									and
										usuarios.estado = 0");
        var_dump($query);
		return $query->result();
    }
	
	function setLog($id,$accion){
		$query= $this->db->query("insert into 
									log(
										id_user,
										action
									)
									values (
										".$id.",
										'".$accion."'
										)
									");
		return 0;
	}
}
?>