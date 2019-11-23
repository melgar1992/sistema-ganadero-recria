<?php
class Egreso_model extends CI_Model
{
    public function getEgresoAnual()
    {
        $anho_actual = date("y");
        $this->db->select_sum('total');
        $this->db->where('fecha >=',$anho_actual.'-01-01');
        $this->db->where('fecha <=',$anho_actual.'-12-31');
        $egreso_compra_animales_del_ano_actual = $this->db->get('compra_animales')->row_array();
        $this->db->select_sum('total');
        $this->db->where('fecha >=',$anho_actual.'-01-01');
        $this->db->where('fecha <=',$anho_actual.'-12-31');
        $egreso_gastos_fijos = $this->db->get('pago_gasto_fijo')->row_array();
        $this->db->select_sum('total');
        $this->db->where('fecha >=',$anho_actual.'-01-01');
        $this->db->where('fecha <=',$anho_actual.'-12-31');
        $egreso_gastos_variables= $this->db->get('gastos_variables')->row_array();
        $this->db->select_sum('pago');
        $this->db->where('fecha >=',$anho_actual.'-01-01');
        $this->db->where('fecha <=',$anho_actual.'-12-31');
        $egreso_pago_empleado= $this->db->get('boleta_pago')->row_array();
        
        
        return  $egreso_compra_animales_del_ano_actual['total'] + $egreso_gastos_fijos['total'] + $egreso_gastos_variables['total'] + $egreso_pago_empleado['pago'];
    }

}