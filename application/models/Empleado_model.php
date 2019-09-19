<?php
class Empleado_model extends CI_Model
{
    public function getEmpleados()
    {
        $this->db->select('ce.*, tc.*, p.nombres, p.apellidos, p.carnet_identidad, p.telefono');
        $this->db->from('contrato_empleado ce');
        $this->db->join('tipos_cargos tc', 'ce.id_tipos_cargos = tc.id_tipos_cargos');
        $this->db->join('empleado e', 'e.id_empleado = ce.id_empleado');
        $this->db->join('persona p', 'p.id_persona = e.id_persona');
        $this->db->where('ce.estado','1');
        $resultado = $this->db->get();

        return $resultado->result(); 
    }

}