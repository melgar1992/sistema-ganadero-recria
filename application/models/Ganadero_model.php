<?php
class Ganadero_model extends CI_Model
{
    public function getGanadero()
    {
        $this->db->select('g.*, p.nombres, p.apellidos, p.carnet_identidad, p.telefono, e.nombre as nombre_estancia, e.municipio, e.provincia, e.departamento, e.referencia');
        $this->db->from('ganadero g');
        $this->db->join('persona p', 'g.id_persona = p.id_persona');
        $this->db->join('estancias e', 'g.id_ganadero = e.id_ganadero');
        $this->db->where('g.estado','1');
        $resultado = $this->db->get();



        return $resultado->result();
        
    }

}