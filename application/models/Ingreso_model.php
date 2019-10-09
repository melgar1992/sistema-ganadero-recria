<?php
class Ingreso_model extends CI_Model
{
    public function getIngresos()
    {
        $this->db->select('oi.*, ci.id_categoria_ingresos, ci.nombre as nombre_categoria_ingreso,e.id_empleado, p.nombres, p.apellidos');
        $this->db->from('otros_ingresos oi');
        $this->db->join('categoria_ingresos ci', 'oi.id_categoria_ingresos = ci.id_categoria_ingresos');
        $this->db->join('empleado e', 'oi.id_empleado = e.id_empleado');
        $this->db->join('persona p', 'p.id_persona = e.id_persona');
        $this->db->where('oi.estado','1');

        $resultado = $this->db->get();

        if ($resultado->num_rows() > 0) {

            return $resultado->result();
        } else {
            return false;
        }
    }


    public function getCategoriaIngresos()
    {
        $resultados = $this->db->get("categoria_ingresos");
        return $resultados->result();
    }
    public function getCategoriaIngreso($id_categoria_ingresos)
    {
        $this->db->where('id_categoria_ingresos', $id_categoria_ingresos);
        $resultado = $this->db->get('categoria_ingresos');
        return $resultado->row();
    }
    public function getEmpleados()
    {
        $this->db->select('e.*, p.nombres, p.apellidos, p.carnet_identidad, p.telefono');
        $this->db->from('empleado e');
        $this->db->join('persona p', 'p.id_persona = e.id_persona');


        $resultado = $this->db->get();

        return $resultado->result();
    }
    public function guardarIngresos($data)
    {
        return $this->db->insert('otros_ingresos', $data);
    }
    public function ultimoID()
    {
        return $this->db->insert_id();
    }
    public function guardar_detalle($data)
    {
        $this->db->insert('detalle_ingresos', $data);
    }
    public function getDetalle()
    {
        $this->db->select('di.*,oi.id_otros_ingresos ');
        $this->db->from('detalle_ingresos di');
        $this->db->join('otros_ingresos oi', 'di.id_otros_ingresos=oi.id_otros_ingresos');

        $resultados = $this->db->get();
        return $resultados->result();
    }
}
