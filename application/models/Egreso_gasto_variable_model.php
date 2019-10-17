<?php
class Egreso_gasto_variable_model extends CI_Model
{
    public function getEgresos()
    {
        $this->db->select('gv.*, tgv.id_tipo_gastos_variables, tgv.nombre as nombre_categoria_egreso_variable, e.id_empleado, p.nombres, p.apellidos');
        $this->db->from('gastos_variables gv');
        $this->db->join('tipo_gastos_variables tgv', 'gv.id_tipo_gastos_variables = tgv.id_tipo_gastos_variables');
        $this->db->join('empleado e', 'gv.id_empleado = e.id_empleado');
        $this->db->join('persona p', 'p.id_persona = e.id_persona');
        $this->db->where('gv.estado', '1');

        $resultado = $this->db->get();

        if ($resultado->num_rows() > 0) {

            return $resultado->result();
        } else {
            return false;
        }

    }
    public function getCategoriaEgresos()
    {
        $resultados = $this->db->get("tipo_gastos_variables");
        return $resultados->result();
    }
    public function getCategoriaEgreso($id_tipo_gastos_variables)
    {
        $this->db->where('id_tipo_gastos_variables', $id_tipo_gastos_variables);
        $resultado = $this->db->get('tipo_gastos_variables');
        return $resultado->row();
    }
    public function guardarEgresos($data)
    {
        return $this->db->insert('gastos_variables', $data);
    }
    public function ultimoID()
    {
        return $this->db->insert_id();
    }
    public function guardar_detalle($data)
    {
        $this->db->insert('detalle_gastos', $data);
    }

}