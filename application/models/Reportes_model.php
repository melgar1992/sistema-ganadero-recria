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

        $where = "fecha BETWEEN '".$fechainicio."' AND '".$fechafin."' AND `estado` = '1'";
        $this->db->select_sum('total');
        $this->db->where($where);
        return $this->db->get('venta_animales')->row_array();
    }
}
