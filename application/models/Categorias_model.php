<?php
class Categorias_model extends CI_Model
{

public function getCategorias()
{
    $this->db->where("estado","1");
    $resultados = $this->db->get("categorias");
    return $resultados->result();
}

public function guardarCat($data)
{
    return $this->db->insert("categorias",$data);
}
public function getCategoria($id_categorias)
{
   $this->db->where("id_categorias",$id_categorias);
   $resultado = $this->db->get("categorias");
   return $resultado->row();
        
}
public function actualizar($id_categoria,$data)
{
    $this->db->where("id_categorias",$id_categoria);
   return $this->db->update("categorias",$data);
    
}



    
}