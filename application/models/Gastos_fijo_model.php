<?php
class Gastos_fijo_model extends CI_Model
{
    public function getGastosFijos()
    {
        $this->db->where('estado','1');
        $resultados = $this->db->get('gastos_fijos');
        return $resultados->result();
    }
    
    public function guardarGastoFijo($data)
    {
        return $this->db->insert('gastos_fijos',$data);
    }
    public function validarCuenta($nombre)
    {
        $this->db->where("estado", "1");
        $this->db->where('nombre', $nombre);
        $resultados = $this->db->get("gastos_fijos");
        $resultados->result(); 
        $row = $resultados->row();
        if (isset($row)) {
            return false;
        } else {
            return true;
        }
    }
    public function getGastoFijo($id_gastos_fijos)
    {
        $this->db->where('estado','1');
        $this->db->where('id_gastos_fijos',$id_gastos_fijos);
        $resultados = $this->db->get('gastos_fijos');
        return $resultados->row();
    }
    public function actualizar($id_gastos_fijos, $data)
    {
        $this->db->where("id_gastos_fijos", $id_gastos_fijos);
        return $this->db->update("gastos_fijos", $data); 
    }
}