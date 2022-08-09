<?php
class Empresa_model extends CI_Model
{

    public function getEmpresa()
    {
        $this->db->select('*');
        $this->db->from('datos_empresa');
        return $this->db->get()->row_array();
    }

    public function guardarEmpresa($nombre, $telefono, $descripcion)
    {
        $data = array(
            'nombre' => $nombre,
            'telefono' => $telefono,
            'descripcion' => $descripcion,
        );
        $this->db->insert('datos_empresa', $data);
    }

    public function actualizar($id, $nombre, $telefono, $descripcion)
    {
        $data = array(
            'nombre' => $nombre,
            'telefono' => $telefono,
            'descripcion' => $descripcion,
        );
        $this->db->where('id_datos_empresa', $id);
        return $this->db->update('datos_empresa', $data);
    }
}