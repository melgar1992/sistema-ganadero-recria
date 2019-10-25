<?php
class inventario_animales_model extends CI_Model
{

    public function buscarInventarioAnimal($id_estancia,$id_tipo_animal,$sexo,$categoria)
    {
        $this->db->select('*');
        $this->db->where('id_estancia',$id_estancia);
        $this->db->where('sexo',$sexo);
        $this->db->where('categoria',$categoria);
        $this->db->where('id_tipo_animal',$id_tipo_animal);
        $resultado = $this->db->get('animal');
        $row = $resultado->row();

        if (isset($row)) {
            return $row;
        } else {
            return false;
        }
    }
    public function actualizarInventario($id_animal,$datos)
    {
        $this->db->where('id_animal',$id_animal);
        return $this->db->update('animal',$datos);
    }
    public function guardarInventario($datosAnimal)
    {
        return $this->db->insert('animal',$datosAnimal);
    }
    public function ultimoID()
    {
        return $this->db->insert_id();
    }
}