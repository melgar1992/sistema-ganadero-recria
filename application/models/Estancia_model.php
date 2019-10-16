<?php
class Estancia_model extends CI_Model
{
    public function guardarEstancia($datos_estancia)
    {
        return $this->db->insert('estancias', $datos_estancia);
    }
    public function getEstancias()
    {
        $this->db->select('es.*, p.nombres, p.apellidos');
        $this->db->from('estancias es');
        $this->db->join('empleado e', 'e.id_empleado = es.id_empleado');
        $this->db->join('persona p', 'p.id_persona = e.id_persona');
        $this->db->where('es.estado', '1');

        $resultado = $this->db->get();
        if ($resultado->num_rows() > 0) {
            return $resultado->result();
        } else {
            return false;
        }
    }
    public function getEstancia($id_estancia)
    {
        $this->db->select('es.*, e.id_empleado, p.nombres, p.apellidos');
        $this->db->from('estancias es');
        $this->db->join('empleado e', 'e.id_empleado = es.id_empleado');
        $this->db->join('persona p', 'p.id_persona = e.id_persona');
        $this->db->where('es.estado', '1');
        $this->db->where('es.id_estancia', $id_estancia);

        $resultado = $this->db->get();
        if ($resultado->num_rows() > 0) {
            return $resultado->row();
        } else {
            return false;
        }
    }
}
