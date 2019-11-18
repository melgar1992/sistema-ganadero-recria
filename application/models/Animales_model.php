<?php
class Animales_model extends CI_Model
{
    public function guardarControlBovino($data)
    {
        return $this->db->insert('detalle_movimiento_animales', $data);
    }
    public function actualizarAnimal($id_animal, $datos)
    {
        $this->db->where('id_animal', $id_animal);
        return $this->db->update('animal', $datos);
    }
    public function getControlAnimalesBovinos()
    {
        $this->db->select('dt.*, e.nombre as nombre_estancia,ta.raza, a.categoria, a.sexo');
        $this->db->from('detalle_movimiento_animales dt');
        $this->db->join('animal a', 'a.id_animal = dt.id_animal');
        $this->db->join('tipo_animal ta', 'a.id_tipo_animal = ta.id_tipo_animal');
        $this->db->join('estancias e', 'a.id_estancia = e.id_estancia');
        $this->db->where('dt.tipo_movimiento', 'Nacimiento');
        $this->db->or_where('dt.tipo_movimiento', 'Conteo');
        $this->db->or_where('dt.tipo_movimiento', 'Muerte');
        $resultuado = $this->db->get();
        return $resultuado->result();
    }
    public function getControlAnimalBovino($id_detalle_venta_animales)
    {
        $this->db->select('dt.*, e.nombre as nombre_estancia, e.id_estancia, a.id_tipo_animal,ta.raza, a.categoria, a.sexo');
        $this->db->from('detalle_movimiento_animales dt');
        $this->db->join('animal a', 'a.id_animal = dt.id_animal');
        $this->db->join('tipo_animal ta', 'a.id_tipo_animal = ta.id_tipo_animal');
        $this->db->join('estancias e', 'a.id_estancia = e.id_estancia');
        $this->db->where('id_detalle_venta_animales', $id_detalle_venta_animales);
        $this->db->where('dt.tipo_movimiento', 'Nacimiento');
        $this->db->or_where('dt.tipo_movimiento', 'Conteo');
        $this->db->or_where('dt.tipo_movimiento', 'Muerte');
        $resultuado = $this->db->get();
        return $resultuado->row();
    }
}
