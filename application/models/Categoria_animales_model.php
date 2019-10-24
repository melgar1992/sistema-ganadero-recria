<?php
class Categoria_animales_model extends CI_Model
{
   
    public function getCategoriaAnimal()
    {
        $this->db->where("estado", "1");
        $resultados = $this->db->get("tipo_animal");
        return $resultados->result();
    }
    public function getCategoriaAnimalBovinos()
    {
        $this->db->where('estado','1');
        $this->db->where('nombre','Bovino');
        $resultados = $this->db->get("tipo_animal");
        return $resultados->result();
    }
    public function guardarCat($data)
    {
        return $this->db->insert("tipo_animal", $data);
    }
    public function getCategoria($id_tipo_animal)
    {
        $this->db->where("id_tipo_animal", $id_tipo_animal);
        $resultado = $this->db->get("tipo_animal");
        return $resultado->row();
    }
    public function actualizar($id_tipo_animal, $data)
    {
        $this->db->where("id_tipo_animal", $id_tipo_animal);
        return $this->db->update("tipo_animal", $data);
    }

    public function validarRaza($raza)
    {
        $this->db->where('estado','1');
        $this->db->where('raza',$raza);
        $resultado = $this->db->get('tipo_animal');

        $row = $resultado->row();
        if (isset($row)) {
            return false;
        } else {
            return true;
        }
    }
  
    

    
}
