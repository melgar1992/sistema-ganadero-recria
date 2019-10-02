<?php
class Tipo_transporte_model extends CI_Model
{
    public function getTipoTransporte()
    {
        $this->db->where("estado", "1");
        $resultados = $this->db->get("tipo_transporte");
        return $resultados->result();
    }
    public function guardarTipoTransp($data)
    {

        return $this->db->insert('tipo_transporte', $data);
    }
    public function getTipo_transporte($id_tipo_transporte)
    {
        $this->db->where("id_tipo_transporte", $id_tipo_transporte);
        $resultado = $this->db->get("tipo_transporte");
        return $resultado->row();
    }
    public function actualizar($id_tipo_transporte, $data)
    {
        $this->db->where("id_tipo_transporte", $id_tipo_transporte);
        return $this->db->update("tipo_transporte", $data);
    }

    public function borrar($id_tipo_transporte, $data)
    {

        $this->db->where('id_tipo_transporte', $id_tipo_transporte);
        $this->db->update('tipo_transporte', $data);
    }

    public function validarNombre($nombre)
    {
        $this->db->where("estado", "1");
        $this->db->where('nombres',$nombre);
        $resultado = $this->db->get("tipo_transporte");

        $row = $resultado->row();

        if (isset($row)) {
            return false;
        } else {
            return true;
        }
    }
}
