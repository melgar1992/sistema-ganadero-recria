<?php
class Egreso_model extends CI_Model
{
    public function getEgresoAnual()
    {
        $anho_actual = date("y");
        $this->db->select_sum('total');
        $this->db->where('fecha >=',$anho_actual.'-01-01');
        $this->db->where('fecha <=',$anho_actual.'-12-31');
        $this->db->where('estado','1');
        $egreso_compra_animales_del_ano_actual = $this->db->get('compra_animales')->row_array();
        $this->db->select_sum('total');
        $this->db->where('fecha >=',$anho_actual.'-01-01');
        $this->db->where('fecha <=',$anho_actual.'-12-31');
        $this->db->where('estado','1');
        $egreso_gastos_fijos = $this->db->get('pago_gasto_fijo')->row_array();
        $this->db->select_sum('total');
        $this->db->where('fecha >=',$anho_actual.'-01-01');
        $this->db->where('fecha <=',$anho_actual.'-12-31');
        $this->db->where('estado','1');
        $egreso_gastos_variables= $this->db->get('gastos_variables')->row_array();
        $this->db->select_sum('pago');
        $this->db->where('fecha >=',$anho_actual.'-01-01');
        $this->db->where('fecha <=',$anho_actual.'-12-31');
        $this->db->where('estado','1');
        $egreso_pago_empleado= $this->db->get('boleta_pago')->row_array();
        $where = "va.fecha BETWEEN '" . $anho_actual . "-01-01 ' AND '" . $anho_actual . "-12-31 ' AND `estado` = '1'";
        $this->db->select(' SUM(sub_total * (comision / 100)) as comision_total');
        $this->db->from('venta_animales va');
        $this->db->join('detalle_movimiento_animales dm','dm.id_venta_animales = va.id_venta_animales');
        $this->db->where($where);
        $this->db->where('estado', '1');
        $comision_venta = $this->db->get()->row_array();

        $where = "ca.fecha BETWEEN '" . $anho_actual . "-01-01 ' AND '" . $anho_actual . "-12-31 ' AND `estado` = '1'";
        $this->db->select(' SUM(sub_total * (comision / 100)) as comision_total');
        $this->db->join('detalle_movimiento_animales dm','dm.id_compra_animales = ca.id_compra_animales');
        $this->db->where($where);
        $this->db->where('estado', '1');
        $comision_compra = $this->db->get('compra_animales ca')->row_array();
        $suma_comision = $comision_compra['comision_total'] + $comision_venta['comision_total'];
        $suma_comision;
        
        
        return  $egreso_compra_animales_del_ano_actual['total'] + $egreso_gastos_fijos['total'] + $egreso_gastos_variables['total'] + $egreso_pago_empleado['pago'] + $suma_comision;
    }

}