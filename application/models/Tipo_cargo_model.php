<?php
class Tipo_cargo_model extends CI_Model
{
    public function getTipoCargos()
    {
        $this->db->where("estado", "1");
        $resultados = $this->db->get("tipos_cargos");
        return $resultados->result();
    }

    public function guardarCat($data)
    {
        return $this->db->insert("tipos_cargos", $data);
    }
    public function getTipoCargo($id_tipo_cargo)
    {
        $this->db->where("id_tipo_cargo", $id_tipo_cargo);
        $resultado = $this->db->get("tipos_cargos");
        return $resultado->row();
    }
    public function actualizar($id_tipo_cargo, $data)
    {
        $this->db->where("id_tipo_cargo", $id_tipo_cargo);
        return $this->db->update("tipos_cargos", $data);
    }
}
