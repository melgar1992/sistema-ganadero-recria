<?php
class Ganadero_model extends CI_Model
{
    public function getGanaderosExterno()
    {
        $this->db->select('g.*, p.nombres, p.apellidos, p.carnet_identidad, p.telefono');
        $this->db->from('ganadero g');
        $this->db->join('persona p', 'g.id_persona = p.id_persona');
        $this->db->where('g.estado', '1');
        $this->db->where('g.tipo_ganadero', 'externo');
        $resultado = $this->db->get();



        return $resultado->result();
    }
    public function guardarGanadero($datosp, $datosg, $datose)
    {
        $this->db->insert('persona', $datosp);

        $id_persona = $this->db->insert_id();

        $datosg['id_persona'] = $id_persona;

        $this->db->insert('ganadero', $datosg);

        $id_ganadero = $this->db->insert_id();

        $datose['id_ganadero'] = $id_ganadero;

        return $this->db->insert('estancias', $datose);
    }
    public function getGanadero($id_ganadero)
    {
        $this->db->select('g.*, p.nombres, p.apellidos, p.carnet_identidad, p.telefono');
        $this->db->from('ganadero g');
        $this->db->join('persona p', 'g.id_persona = p.id_persona');
        $this->db->where('g.estado', '1');
        $this->db->where('g.tipo_ganadero', 'externo');
        $this->db->where('id_ganadero', $id_ganadero);
        $resultado = $this->db->get();

        return $resultado->row();
    }
    public function actualizar($id_ganadero, $id_persona, $datosp, $datosg)
    {
        $this->db->where('id_persona', $id_persona);
        $this->db->update('persona', $datosp);

        $this->db->where('id_ganadero', $id_ganadero);
        return $this->db->update('ganadero', $datosg);
    }

    public function borrar($id_ganadero, $data)
    {
        $this->db->where("id_ganadero", $id_ganadero);
        return $this->db->update("ganadero", $data);
    }

    public function validarCi($ci)
    { 
        $this->db->select('g.estado, p.carnet_identidad');
        $this->db->from('ganadero g');
        $this->db->join('persona p', 'g.id_persona = p.id_persona');
        $this->db->where('p.carnet_identidad',$ci);
        $this->db->where('g.estado','1');

        $resultado = $this->db->get();

        $row = $resultado->row();

        if (isset($row)) {
            return false;
        } else {
            return true;
        }
    }
}
