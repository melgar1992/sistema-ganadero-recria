<?php
class Venta_animales_model extends CI_Model
{
    public function getVentaAnimales()
    {
        $this->db->select('va.*, p.nombres, p.apellidos, pg.nombres as nombre_ganadero, pg.apellidos as apellido_ganadero');
        $this->db->from('venta_animales va');
        $this->db->join('empleado e', 'e.id_empleado = va.id_empleado');
        $this->db->join('ganadero ga', 'ga.id_ganadero = va.id_ganadero');
        $this->db->join('persona p', 'p.id_persona = e.id_persona');
        $this->db->join('persona pg', 'pg.id_persona = ga.id_persona');
        $this->db->where('va.estado', '1');

        $resultado = $this->db->get();

        return $resultado->result();
    }
    public function getVentaAnimal($id_venta_animales)
    {
        $this->db->select('va.*, p.nombres, p.apellidos, pg.nombres as nombre_ganadero, pg.apellidos as apellido_ganadero, ptr.nombres as nombre_transportista, ptr.apellidos as apellido_transportista');
        $this->db->from('venta_animales va');
        $this->db->join('empleado e', 'e.id_empleado = va.id_empleado');
        $this->db->join('ganadero ga', 'ga.id_ganadero = va.id_ganadero');
        $this->db->join('transportista tr', 'tr.id_transportista = va.id_transportista');
        $this->db->join('persona p', 'p.id_persona = e.id_persona');
        $this->db->join('persona pg', 'pg.id_persona = ga.id_persona');
        $this->db->join('persona ptr', 'ptr.id_persona = tr.id_persona');
        $this->db->where('va.estado', '1');
        $this->db->where('va.id_venta_animales', $id_venta_animales);
        $resultado = $this->db->get();
        return $resultado->row();
    }
    public function getVentaAnimalConIntermediario($id_venta_animales)
    {
        $this->db->select('va.*, p.nombres, p.apellidos, pg.nombres as nombre_ganadero, pg.apellidos as apellido_ganadero, pi.nombres as nombre_intermediario, pi.apellidos as apellido_intermediario, ptr.nombres as nombre_transportista, ptr.apellidos as apellido_transportista');
        $this->db->from('venta_animales va');
        $this->db->join('empleado e', 'e.id_empleado = va.id_empleado');
        $this->db->join('ganadero ga', 'ga.id_ganadero = va.id_ganadero');
        $this->db->join('intermediario i', 'i.id_intermediario = va.id_intermediario');
        $this->db->join('transportista tr', 'tr.id_transportista = va.id_transportista');
        $this->db->join('persona p', 'p.id_persona = e.id_persona');
        $this->db->join('persona pg', 'pg.id_persona = ga.id_persona');
        $this->db->join('persona pi', 'pi.id_persona = i.id_persona');
        $this->db->join('persona ptr', 'ptr.id_persona = tr.id_persona');
        $this->db->where('va.estado', '1');
        $this->db->where('va.id_venta_animales', $id_venta_animales);
        $resultado = $this->db->get();
        return $resultado->row();
    }
    public function getDetallesVentas($id_venta_animales)
    {
        $this->db->select('dm.*, ta.raza, ta.id_tipo_animal, a.sexo, a.stock, a.categoria, e.id_estancia, e.nombre');
        $this->db->from('detalle_movimiento_animales dm');
        $this->db->join('animal a', 'a.id_animal = dm.id_animal');
        $this->db->join('tipo_animal ta', 'a.id_tipo_animal = ta.id_tipo_animal');
        $this->db->join('estancias e', 'e.id_estancia = a.id_estancia');
        $this->db->where('id_venta_animales', $id_venta_animales);
        $resultados = $this->db->get();
        return $resultados->result();
    }
    public function guardarVentaBovinos($datos)
    {
        return $this->db->insert('venta_animales', $datos);
    }
    public function guardarDetalleBovinos($datos)
    {
        return $this->db->insert('detalle_movimiento_animales', $datos);
    }
    public function ultimoID()
    {
        return $this->db->insert_id();
    }
    public function actualizarVentaBovinos($id_venta_animales, $datosVentaAnimal)
    {
        $this->db->where('id_venta_animales',$id_venta_animales);
        return $this->db->update('venta_animales',$datosVentaAnimal);
    }
    public function borrarDetalleMovimientos($id_detalle_venta_animales)
    {
        $this->db->where('id_detalle_venta_animales',$id_detalle_venta_animales);
        return $this->db->delete('detalle_movimiento_animales');
    }
    public function borrarVentaAnimal($id_venta_animales,$datos)            
    {
        $this->db->where('id_venta_animales',$id_venta_animales);
        return $this->db->update('venta_animales',$datos);
    }
}
