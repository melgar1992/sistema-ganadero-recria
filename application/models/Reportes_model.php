<?php
class Reportes_model extends CI_Model
{
    public function getInvenarioCategoriaBovino()
    {
        $this->db->select('categoria, sexo');
        $this->db->select_sum('stock');
        $this->db->group_by('categoria, sexo');
        $this->db->or_where('categoria', '12');
        $this->db->or_where('categoria', '12 - 24 ');
        $this->db->or_where('categoria', '24 - 36');
        $this->db->or_where('categoria', '36');
        $this->db->or_where('categoria', 'bueyes');
        $resultado = $this->db->get('animal');
        return $resultado->result();
    }
    public function getIventarioCategoriAnimal()
    {
        $this->db->select('categoria, sexo');
        $this->db->select_sum('stock');
        $this->db->group_by('categoria, sexo');
        $this->db->or_where('categoria', 'Equino');
        $this->db->or_where('categoria', 'Familia Cerdos');
        $this->db->or_where('categoria', 'Aves');
        $resultado = $this->db->get('animal');
        return $resultado->result();
    }
    public function getReporteVentaCategoriaBovino()
    {
        $anho_actual = date("y");
        $this->db->select('categoria, sexo');
        $this->db->from('detalle_movimiento_animales dm');
        $this->db->join('animal a', 'a.id_animal = dm.id_animal');
        $this->db->select_sum('cantidad');
        $this->db->select_sum('sub_total');
        $this->db->where('dm.id_venta_animales !=', '');
        $this->db->where('fecha >=', $anho_actual . '-01-01');
        $this->db->where('fecha <=', $anho_actual . '-12-31');
        $this->db->where_not_in('categoria', 'Equino');
        $this->db->where_not_in('categoria', 'Familia Cerdos');
        $this->db->where_not_in('categoria', 'Aves');
        $this->db->group_by('categoria, sexo');
        $resultado = $this->db->get();
        return $resultado->result();
    }
    public function getSumaTotalesVentasAnualAnimalesBovinos()
    {
        $anho_actual = date("y");
        $this->db->from('detalle_movimiento_animales dm');
        $this->db->join('animal a', 'a.id_animal = dm.id_animal');
        $this->db->select_sum('cantidad');
        $this->db->select_sum('sub_total');
        $this->db->where('dm.id_venta_animales !=', '');
        $this->db->where('fecha >=', $anho_actual . '-01-01');
        $this->db->where('fecha <=', $anho_actual . '-12-31');
        $this->db->where_not_in('categoria', 'Equino');
        $this->db->where_not_in('categoria', 'Familia Cerdos');
        $this->db->where_not_in('categoria', 'Aves');
        $resultado = $this->db->get();
        return $resultado->row();
    }
    public function getReporteVentaCategoriaAnimal()
    {
        $anho_actual = date("y");
        $this->db->select('categoria, sexo');
        $this->db->from('detalle_movimiento_animales dm');
        $this->db->join('animal a', 'a.id_animal = dm.id_animal');
        $this->db->select_sum('cantidad');
        $this->db->select_sum('sub_total');
        $this->db->where('dm.id_venta_animales !=', '');
        $this->db->where('fecha >=', $anho_actual . '-01-01');
        $this->db->where('fecha <=', $anho_actual . '-12-31');
        $this->db->where_not_in('categoria', '12');
        $this->db->where_not_in('categoria', '12 - 24 ');
        $this->db->where_not_in('categoria', '24 - 36');
        $this->db->where_not_in('categoria', '36');
        $this->db->where_not_in('categoria', 'Bueyes');
        $this->db->group_by('categoria, sexo');
        $resultado = $this->db->get();
        return $resultado->result();
    }
    public function getSumaTotalesVentasAnualAnimales()
    {
        $anho_actual = date("y");
        $this->db->from('detalle_movimiento_animales dm');
        $this->db->join('animal a', 'a.id_animal = dm.id_animal');
        $this->db->select_sum('cantidad');
        $this->db->select_sum('sub_total');
        $this->db->where('dm.id_venta_animales !=', '');
        $this->db->where('fecha >=', $anho_actual . '-01-01');
        $this->db->where('fecha <=', $anho_actual . '-12-31');
        $this->db->where_not_in('categoria', '12');
        $this->db->where_not_in('categoria', '12 - 24 ');
        $this->db->where_not_in('categoria', '24 - 36');
        $this->db->where_not_in('categoria', '36');
        $this->db->where_not_in('categoria', 'Bueyes');
        $resultado = $this->db->get();
        return $resultado->row();
    }
    public function getReporteCompraCategoriaBovino()
    {
        $anho_actual = date("y");
        $this->db->select('categoria, sexo');
        $this->db->from('detalle_movimiento_animales dm');
        $this->db->join('animal a', 'a.id_animal = dm.id_animal');
        $this->db->select_sum('cantidad');
        $this->db->select_sum('sub_total');
        $this->db->where('dm.id_compra_animales !=', '');
        $this->db->where('fecha >=', $anho_actual . '-01-01');
        $this->db->where('fecha <=', $anho_actual . '-12-31');
        $this->db->where_not_in('categoria', 'Equino');
        $this->db->where_not_in('categoria', 'Familia Cerdos');
        $this->db->where_not_in('categoria', 'Aves');
        $this->db->group_by('categoria, sexo');
        $resultado = $this->db->get();
        return $resultado->result();
    }
    public function getSumaTotalesCompraAnualBovinos()
    {
        $anho_actual = date("y");
        $this->db->from('detalle_movimiento_animales dm');
        $this->db->join('animal a', 'a.id_animal = dm.id_animal');
        $this->db->select_sum('cantidad');
        $this->db->select_sum('sub_total');
        $this->db->where('dm.id_compra_animales !=', '');
        $this->db->where('fecha >=', $anho_actual . '-01-01');
        $this->db->where('fecha <=', $anho_actual . '-12-31');
        $this->db->where_not_in('categoria', 'Equino');
        $this->db->where_not_in('categoria', 'Familia Cerdos');
        $this->db->where_not_in('categoria', 'Aves');
        $resultado = $this->db->get();
        return $resultado->row();
    }
    public function getReporteCompraCategoriaAnimal()
    {
        $anho_actual = date("y");
        $this->db->select('categoria, sexo');
        $this->db->from('detalle_movimiento_animales dm');
        $this->db->join('animal a', 'a.id_animal = dm.id_animal');
        $this->db->select_sum('cantidad');
        $this->db->select_sum('sub_total');
        $this->db->where('dm.id_compra_animales !=', '');
        $this->db->where('fecha >=', $anho_actual . '-01-01');
        $this->db->where('fecha <=', $anho_actual . '-12-31');
        $this->db->where_not_in('categoria', '12');
        $this->db->where_not_in('categoria', '12 - 24 ');
        $this->db->where_not_in('categoria', '24 - 36');
        $this->db->where_not_in('categoria', '36');
        $this->db->where_not_in('categoria', 'Bueyes');
        $this->db->group_by('categoria, sexo');
        $resultado = $this->db->get();
        return $resultado->result();
    }
    public function getSumaTotalesCompraAnualAnimales()
    {
        $anho_actual = date("y");
        $this->db->from('detalle_movimiento_animales dm');
        $this->db->join('animal a', 'a.id_animal = dm.id_animal');
        $this->db->select_sum('cantidad');
        $this->db->select_sum('sub_total');
        $this->db->where('dm.id_compra_animales !=', '');
        $this->db->where('fecha >=', $anho_actual . '-01-01');
        $this->db->where('fecha <=', $anho_actual . '-12-31');
        $this->db->where_not_in('categoria', '12');
        $this->db->where_not_in('categoria', '12 - 24 ');
        $this->db->where_not_in('categoria', '24 - 36');
        $this->db->where_not_in('categoria', '36');
        $this->db->where_not_in('categoria', 'Bueyes');
        $resultado = $this->db->get();
        return $resultado->row();
    }
    public function getReporteControlBovino()
    {
        $anho_actual = date("y");
        $this->db->select('categoria, sexo, tipo_movimiento, nombre');
        $this->db->from('detalle_movimiento_animales dm');
        $this->db->join('animal a', 'a.id_animal = dm.id_animal');
        $this->db->join('estancias e', 'e.id_estancia = a.id_estancia');
        $this->db->select_sum('cantidad');
        $this->db->where('dm.tipo_movimiento !=', '');
        $this->db->where('fecha >=', $anho_actual . '-01-01');
        $this->db->where('fecha <=', $anho_actual . '-12-31');
        $this->db->where_not_in('tipo_movimiento', 'Conteo');
        $this->db->where_not_in('categoria', 'Equino');
        $this->db->where_not_in('categoria', 'Familia Cerdos');
        $this->db->where_not_in('categoria', 'Aves');
        $this->db->group_by('categoria, sexo, tipo_movimiento, nombre');
        $this->db->order_by('nombre', 'ASC');
        $resultado = $this->db->get();
        return $resultado->result();
    }
    public function getIngresoVentaAnimalesEntreFechas($fechainicio, $fechafin)
    {

        $where = "fecha BETWEEN '" . $fechainicio . "' AND '" . $fechafin . "' AND `estado` = '1'";
        $this->db->select_sum('total');
        $this->db->where($where);
        return $this->db->get('venta_animales')->row_array();
    }
    public function getComisionesAnimales($fechainicio, $fechafin)
    {
        $where = "va.fecha BETWEEN '" . $fechainicio . "' AND '" . $fechafin . "' AND `estado` = '1'";
        $this->db->select(' SUM(sub_total * (comision / 100)) as comision_total');
        $this->db->from('venta_animales va');
        $this->db->join('detalle_movimiento_animales dm','dm.id_venta_animales = va.id_venta_animales');
        $this->db->where($where);
        $this->db->where('estado', '1');
        $comision_venta = $this->db->get()->row_array();

        $where = "ca.fecha BETWEEN '" . $fechainicio . "' AND '" . $fechafin . "' AND `estado` = '1'";
        $this->db->select(' SUM(sub_total * (comision / 100)) as comision_total');
        $this->db->join('detalle_movimiento_animales dm','dm.id_compra_animales = ca.id_compra_animales');
        $this->db->where($where);
        $this->db->where('estado', '1');
        $comision_compra = $this->db->get('compra_animales ca')->row_array();
        $suma_comision = $comision_compra['comision_total'] + $comision_venta['comision_total'];
        return $suma_comision;
    }
    public function getOtrosIngresos($fechainicio, $fechafin)
    {
        $where = "fecha BETWEEN '" . $fechainicio . "' AND '" . $fechafin . "' AND `oi.estado` = '1'";
        $this->db->select_sum('total', 'ingresos');
        $this->db->select('nombre');
        $this->db->from('otros_ingresos oi');
        $this->db->join('categoria_ingresos ci', 'oi.id_categoria_ingresos = ci.id_categoria_ingresos');
        $this->db->where($where);
        $this->db->group_by('nombre');
        $this->db->order_by('nombre', 'ASC');
        return $this->db->get()->result();
    }
    public function getPagoGastosFijos($fechainicio, $fechafin)
    {
        $where = "fecha BETWEEN '" . $fechainicio . "' AND '" . $fechafin . "' AND `pg.estado` = '1'";
        $this->db->select_sum('pg.total', 'pago_gastos_fijos');
        $this->db->select('nombre');
        $this->db->from('pago_gasto_fijo pg');
        $this->db->join('gastos_fijos gf', 'gf.id_gastos_fijos = pg.id_gastos_fijos');
        $this->db->where($where);
        $this->db->group_by('nombre');
        $this->db->order_by('nombre', 'ASC');
        return $this->db->get()->result();
    }
    public function getPagoGastosVariables($fechainicio, $fechafin)
    {
        $where = "fecha BETWEEN '" . $fechainicio . "' AND '" . $fechafin . "' AND `gv.estado` = '1'";
        $this->db->select_sum('gv.total', 'pago_gastos_variables');
        $this->db->select('nombre');
        $this->db->from('gastos_variables gv');
        $this->db->join('tipo_gastos_variables tgv', 'gv.id_tipo_gastos_variables = tgv.id_tipo_gastos_variables');
        $this->db->where($where);
        $this->db->group_by('nombre');
        $this->db->order_by('nombre', 'ASC');
        return $this->db->get()->result();
    }
    public function getPagoEmpleados($fechainicio, $fechafin)
    {
        $where = "fecha BETWEEN '" . $fechainicio . "' AND '" . $fechafin . "' AND `estado` = '1'";
        $this->db->select_sum('pago');
        $this->db->from('boleta_pago');
        $this->db->where($where);
        return $this->db->get()->row_array();
    }
    public function getIngresoCompraAnimalesEntreFechas($fechainicio, $fechafin)
    {

        $where = "fecha BETWEEN '" . $fechainicio . "' AND '" . $fechafin . "' AND `estado` = '1'";
        $this->db->select_sum('total');
        $this->db->where($where);
        return $this->db->get('compra_animales')->row_array();
    }
    public function getYears()
    {
        $this->db->select('YEAR(fecha) as year');
        $this->db->from('venta_animales');
        $this->db->group_by('year');
        $this->db->order_by('year', 'DESC');
        $resultado = $this->db->get();
        return $resultado->result();
    }
    public function getIngresosPorMeses($year)
    {
        $ingresos_por_meses = array(
            0 => 0,
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
            6 => 0,
            7 => 0,
            8 => 0,
            9 => 0,
            10 => 0,
            11 => 0,
        );

        $this->db->select('MONTH(fecha) as mes, SUM(total) as ingreso_ventas');
        $this->db->from('venta_animales');
        $this->db->where('fecha >=', $year . '-01-01');
        $this->db->where('fecha <=', $year . '-12-31');
        $this->db->where('estado', '1');
        $this->db->group_by('mes');
        $ingreso_ventas = $this->db->get()->result();

        $this->db->select('MONTH(fecha) as mes, SUM(total) as ingreso_ventas');
        $this->db->from('otros_ingresos');
        $this->db->where('fecha >=', $year . '-01-01');
        $this->db->where('fecha <=', $year . '-12-31');
        $this->db->where('estado', '1');
        $this->db->group_by('mes');
        $otros_ingresos = $this->db->get()->result();
        foreach ($ingreso_ventas as $ingreso_venta) {

            $ingresos_por_meses[$ingreso_venta->mes - 1] =  $ingresos_por_meses[$ingreso_venta->mes - 1] + $ingreso_venta->ingreso_ventas;
        }
        foreach ($otros_ingresos as $otros_ingreso) {

            $ingresos_por_meses[$ingreso_venta->mes - 1] =  $ingresos_por_meses[$ingreso_venta->mes - 1] + $otros_ingreso->ingreso_ventas;
        }

        return $ingresos_por_meses;
    }
    public function getEgresoPorMeses($year)
    {
        $egreso_por_meses = array(
            0 => 0,
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
            6 => 0,
            7 => 0,
            8 => 0,
            9 => 0,
            10 => 0,
            11 => 0,
        );
        $this->db->select('MONTH(fecha) as mes, SUM(total) as total');
        $this->db->from('compra_animales');
        $this->db->where('fecha >=', $year . '-01-01');
        $this->db->where('fecha <=', $year . '-12-31');
        $this->db->where('estado', '1');
        $this->db->group_by('mes');
        $egreso_compras = $this->db->get()->result();
        $this->db->select('MONTH(fecha) as mes, SUM(total) as total');
        $this->db->where('fecha >=', $year . '-01-01');
        $this->db->where('fecha <=', $year . '-12-31');
        $this->db->where('estado', '1');
        $this->db->group_by('mes');
        $egreso_gastos_fijos = $this->db->get('pago_gasto_fijo')->result();
        $this->db->select('MONTH(fecha) as mes, SUM(total) as total');
        $this->db->where('fecha >=', $year . '-01-01');
        $this->db->where('fecha <=', $year . '-12-31');
        $this->db->where('estado', '1');
        $this->db->group_by('mes');
        $egreso_gastos_variables = $this->db->get('gastos_variables')->result();
        $this->db->select('MONTH(fecha) as mes, SUM(pago) as total');
        $this->db->where('fecha >=', $year . '-01-01');
        $this->db->where('fecha <=', $year . '-12-31');
        $this->db->where('estado', '1');
        $this->db->group_by('mes');
        $egreso_pagos_empleados = $this->db->get('boleta_pago')->result();
        foreach ($egreso_compras as $egreso_compra) {

            $egreso_por_meses[$egreso_compra->mes - 1] =  $egreso_por_meses[$egreso_compra->mes - 1] + $egreso_compra->total;
        }
        foreach ($egreso_gastos_fijos as $egreso_gasto_fijo) {

            $egreso_por_meses[$egreso_gasto_fijo->mes - 1] =  $egreso_por_meses[$egreso_gasto_fijo->mes - 1] + $egreso_gasto_fijo->total;
        }
        foreach ($egreso_gastos_variables as $egreso_gasto_variable) {

            $egreso_por_meses[$egreso_gasto_variable->mes - 1] =  $egreso_por_meses[$egreso_gasto_variable->mes - 1] + $egreso_gasto_variable->total;
        }
        foreach ($egreso_pagos_empleados as $egreso_pago_empleado) {

            $egreso_por_meses[$egreso_pago_empleado->mes - 1] =  $egreso_por_meses[$egreso_pago_empleado->mes - 1] + $egreso_pago_empleado->total;
        }
        return $egreso_por_meses;
    }
}
