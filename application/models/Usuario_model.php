<?php
class Usuario_model extends CI_Model
{

public function login($username, $password)
{
    $this->db->where("username",$username);
    $this->db->where("password",$password);

    $resultado = $this->db->get("usuarios");

    if ($resultado->num_rows()>0) {
        return  $resultado->row();
    }
    else {
        return false;
    }
    
}
public function getUsuarios()
{
        $this->db->select("u.*, r.nombres as roles");
        $this->db->from("usuarios u");
        $this->db->join("roles r", "u.id_roles = r.id_roles");
        $this->db->where("u.estado", "1");
        $resultados = $this->db->get();
        return $resultados->result();
}
public function getRoles()
{
    $resultados= $this->db->get("roles");
    return $resultados->result();
}
public function guardar($data)
{
   return $this->db->insert('usuarios',$data);
}
public function getUsuario($id_usuario)
{
    $this->db->select("u.*, r.nombres as roles");
    $this->db->from("usuarios u");
    $this->db->join("roles r", "u.id_roles = r.id_roles");
    $this->db->where("u.id_usuarios",$id_usuario);
    $this->db->where("u.estado", "1");
    $resultado = $this->db->get();
    return $resultado->row();
}
public function actualizar($idusuario ,$data)
{
    $this->db->where("id_usuarios",$idusuario);
   return $this->db->update("usuarios",$data);
    
}



    
}