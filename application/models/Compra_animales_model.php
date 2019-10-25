<?php
class Compra_animales_model extends CI_Model
{
    
    public function getCompraAnimales()
    {
        $this->db->select('ca.*, p.nombres, p.apellidos');
        $this->db->from('compra_animales ca');
        $this->db->join('empleado e','e.id_empleado = ca.id_empleado');
        $this->db->join('persona p','p.id_persona = e.id_persona');
        $this->db->where('ca.estado','1');

        $resultado = $this->db->get();

        return $resultado->result();
    }
    public function ultimoID()
    {
        return $this->db->insert_id();
    }
    public function guardarCompraBovinos($datos)
    {
        return $this->db->insert('compra_animales',$datos);
    }
    public function guardarDetalleBovinos($datos)
    {   
        return $this->db->insert('detalle_movimiento_animales',$datos);
    }

}