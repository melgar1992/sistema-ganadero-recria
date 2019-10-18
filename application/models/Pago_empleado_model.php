<?php
class Pago_empleado_model extends CI_Model
{

    public function getBoletasPagos()
    {
        $this->db->select('b.*,tp.nombre as tipoPago,p.nombres, p.apellidos');
        $this->db->from('boleta_pago b');
        $this->db->join('contrato_empleado ce', 'ce.id_contrato_empleado = b.id_contrato_empleado');
        $this->db->join('tipo_pago tp', 'tp.id_tipo_pago = b.id_tipo_pago');
        $this->db->join('empleado e', 'e.id_empleado = ce.id_empleado');
        $this->db->join('persona p', 'e.id_persona = p.id_persona');
        $this->db->where('b.estado', '1');

        $resultado  =   $this->db->get();
        return $resultado->result();
    }
    public function getBoletaPago($id_boleta_pago)
    {
        $this->db->select('b.*,tp.nombre as tipoPago, e.id_empleado ,p.nombres, p.apellidos');
        $this->db->from('boleta_pago b');
        $this->db->join('contrato_empleado ce', 'ce.id_contrato_empleado = b.id_contrato_empleado');
        $this->db->join('tipo_pago tp', 'tp.id_tipo_pago = b.id_tipo_pago');
        $this->db->join('empleado e', 'e.id_empleado = ce.id_empleado');
        $this->db->join('persona p', 'e.id_persona = p.id_persona');
        $this->db->where('b.estado', '1');
        $this->db->where('b.id_boleta_pago',$id_boleta_pago);

        $resultado  =   $this->db->get();
        return $resultado->row();
    }
    public function getTiposPagos()
    {
        $resultado = $this->db->get('tipo_pago');
        return $resultado->result();
    }
    public function guardarBoletaPago($datos)
    {
        return $this->db->insert('boleta_pago',$datos);
    }
    public function actualizarBoletaPago($id_boleta_pago,$datos)
    {
        $this->db->where('id_boleta_pago',$id_boleta_pago);
        return $this->db->update('boleta_pago',$datos);
    }
}
