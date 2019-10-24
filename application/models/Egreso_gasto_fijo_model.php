<?php
class Egreso_gasto_fijo_model extends CI_Model
{
    public function getPagosGastosFijos()
    {
        $this->db->select('pgf.*, gf.id_gastos_fijos,gf.nombre as gastoFijo,e.id_empleado, p.nombres, p.apellidos');
        $this->db->from('pago_gasto_fijo pgf');
        $this->db->join('gastos_fijos gf', 'gf.id_gastos_fijos = pgf.id_gastos_fijos');
        $this->db->join('empleado e', 'pgf.id_empleado = e.id_empleado');
        $this->db->join('persona p', 'p.id_persona = e.id_persona');
        $this->db->where('pgf.estado', '1');

        $resultado  =   $this->db->get();
        return $resultado->result();
    }
   
    
    public function guardarEgresoGastoFijo($data)
    {
        return $this->db->insert('pago_gasto_fijo',$data);
    }
    



}