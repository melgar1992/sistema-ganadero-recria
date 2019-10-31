<?php
class Compra_animales_model extends CI_Model
{

    public function getCompraAnimales()
    {
        $this->db->select('ca.*, p.nombres, p.apellidos, pg.nombres as nombre_ganadero, pg.apellidos as apellido_ganadero');
        $this->db->from('compra_animales ca');
        $this->db->join('empleado e', 'e.id_empleado = ca.id_empleado');
        $this->db->join('ganadero ga', 'ga.id_ganadero = ca.id_ganadero');
        $this->db->join('persona p', 'p.id_persona = e.id_persona');
        $this->db->join('persona pg', 'pg.id_persona = ga.id_persona');
        $this->db->where('ca.estado', '1');

        $resultado = $this->db->get();

        return $resultado->result();
    }
    public function getCompraAnimal($id_compra_animales)
    {
        $this->db->select('ca.*, pe.nombres as nombre_empleado, pe.apellidos as apellido_empleado, pg.nombres as nombre_ganadero, pg.apellidos as apellido_ganadero, ptr.nombres as nombre_transportista, ptr.apellidos as apellido_transportista, es.nombre as nombre_estancia');
        $this->db->from('compra_animales ca');
        $this->db->join('empleado e', 'e.id_empleado = ca.id_empleado');
        $this->db->join('ganadero ga', 'ga.id_ganadero = ca.id_ganadero');
        $this->db->join('transportista tr', 'tr.id_transportista = ca.id_transportista');
        $this->db->join('estancias es', 'es.id_estancia = ca.id_estancia');
        $this->db->join('persona pe', 'pe.id_persona = e.id_persona');
        $this->db->join('persona pg', 'pg.id_persona = ga.id_persona');
        $this->db->join('persona ptr', 'ptr.id_persona = tr.id_persona');
        $this->db->where('ca.estado', '1');
        $this->db->where('id_compra_animales', $id_compra_animales);

        $resultado = $this->db->get();

        if ($resultado->num_rows() > 0) {
            return $resultado->row();
        } else {
            return false;
        }
    }
    public function getCompraAnimalConIntermediario($id_compra_animales)
    {
        $this->db->select('ca.*, pe.nombres as nombre_empleado, pe.apellidos as apellido_empleado, pg.nombres as nombre_ganadero, pg.apellidos as apellido_ganadero, pie.nombres as nombre_intermediario, pie.apellidos as apellido_intermediario, ptr.nombres as nombre_transportista, ptr.apellidos as apellido_transportista, es.nombre as nombre_estancia');
        $this->db->from('compra_animales ca');
        $this->db->join('empleado e', 'e.id_empleado = ca.id_empleado');
        $this->db->join('ganadero ga', 'ga.id_ganadero = ca.id_ganadero');
        $this->db->join('intermediario ie', 'ie.id_intermediario = ca.id_intermediario','left outer');
        $this->db->join('transportista tr', 'tr.id_transportista = ca.id_transportista');
        $this->db->join('estancias es', 'es.id_estancia = ca.id_estancia');
        $this->db->join('persona pe', 'pe.id_persona = e.id_persona');
        $this->db->join('persona pg', 'pg.id_persona = ga.id_persona');
        $this->db->join('persona pie', 'pie.id_persona = ie.id_persona');
        $this->db->join('persona ptr', 'ptr.id_persona = tr.id_persona');
        $this->db->where('ca.estado', '1');
        $this->db->where('id_compra_animales', $id_compra_animales);

        $resultado = $this->db->get();

        if ($resultado->num_rows() > 0) {

            return $resultado->row();
        } else {
            return false;
        }
    }
    public function getDetalleMovimientos($id_compra_animales)
    {
        $this->db->select('dm.*, ta.raza, ta.id_tipo_animal, a.sexo, a.stock, a.categoria');
        $this->db->from('detalle_movimiento_animales dm');
        $this->db->join('animal a', 'a.id_animal = dm.id_animal');
        $this->db->join('tipo_animal ta', 'a.id_tipo_animal = ta.id_tipo_animal');
        $this->db->where('id_compra_animales', $id_compra_animales);
        $resultados = $this->db->get();
        return $resultados->result();
    }
    public function ultimoID()
    {
        return $this->db->insert_id();
    }
    public function guardarCompraBovinos($datos)
    {
        return $this->db->insert('compra_animales', $datos);
    }
    public function actualizarCompraBovinos($id_compra_animales, $datos)
    {
        $this->db->where('id_compra_animales', $id_compra_animales);
        return $this->db->update('compra_animales', $datos);
    }
    public function guardarDetalleBovinos($datos)
    {
        return $this->db->insert('detalle_movimiento_animales', $datos);
    }
    public function borrarDetalleMovimientos($id_detalle_venta_animales)
    {
        $this->db->where('id_detalle_venta_animales', $id_detalle_venta_animales);
        return $this->db->delete('detalle_movimiento_animales');
    }
  
}
