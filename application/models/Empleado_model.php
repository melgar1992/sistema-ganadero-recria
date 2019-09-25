<?php
class Empleado_model extends CI_Model
{
    public function getEmpleados()
    {
        $this->db->select('ce.*, tc.*, p.nombres, p.apellidos, p.carnet_identidad, p.telefono');
        $this->db->from('contrato_empleado ce');
        $this->db->join('tipos_cargos tc', 'ce.id_tipos_cargos = tc.id_tipos_cargos');
        $this->db->join('empleado e', 'e.id_empleado = ce.id_empleado');
        $this->db->join('persona p', 'p.id_persona = e.id_persona');
        $this->db->where('ce.estado', '1');
        $resultado = $this->db->get();

        return $resultado->result();
    }

    public function guardarEmpleado($datos_persona, $datosempleado, $datoscontrato)
    {
        $this->db->insert('persona', $datos_persona);

        $id_persona = $this->db->insert_id();

        $datosempleado['id_persona'] = $id_persona;

        $this->db->insert('empleado', $datosempleado);

        $id_empleado = $this->db->insert_id();

        $datoscontrato['id_empleado'] = $id_empleado;

        return $this->db->insert('contrato_empleado', $datoscontrato);
    }
    public function getEmpleado($id_contrato_empleado)
    {
        $this->db->select('ce.*, tc.*, e.direccion, p.id_persona, p.nombres, p.apellidos, p.carnet_identidad, p.telefono');
        $this->db->from('contrato_empleado ce');
        $this->db->join('tipos_cargos tc', 'ce.id_tipos_cargos = tc.id_tipos_cargos');
        $this->db->join('empleado e', 'e.id_empleado = ce.id_empleado');
        $this->db->join('persona p', 'p.id_persona = e.id_persona');
        $this->db->where('ce.estado', '1');
        $this->db->where('id_contrato_empleado', $id_contrato_empleado);

        $resultado = $this->db->get();

        return $resultado->row();
    }
    public function actualizar($id_persona, $id_empleado, $id_contrato_empleado, $datospersona, $datosempleado, $datoscontrato)
    {
        $this->db->where('id_persona', $id_persona);
        $this->db->update('persona', $datospersona);

        $this->db->where('id_empleado', $id_empleado);
        $this->db->update('empleado', $datosempleado);

        $this->db->where('id_contrato_empleado', $id_contrato_empleado);
        return $this->db->update('contrato_empleado', $datoscontrato);
    }
    public function borrar($empleado,$datosBorrar)
    {
        
        $this->db->where('id_contrato_empleado',$empleado->id_contrato_empleado);
        $this->db->set('estado',$datosBorrar['estado']);
        return $this->db->update('contrato_empleado');

               
    }
}
