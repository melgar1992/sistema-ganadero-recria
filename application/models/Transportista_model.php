<?php
class Transportista_model extends CI_Model
{
    public function getTransportistas()
    {
        $this->db->select('t.*, p.nombres, p.apellidos, p.carnet_identidad, p.telefono, tt.nombres as tipotransporte, tt.estado');
        $this->db->from('transportista t');
        $this->db->join('persona p', 't.id_persona = p.id_persona');
        $this->db->join('tipo_transporte tt', 't.id_tipo_transporte = tt.id_tipo_transporte');
        $this->db->where('t.estado','1');
        $this->db->where('tt.estado','1');
        $resultado = $this->db->get();



        return $resultado->result();
    }
    public function guardarTransportista($datosp, $datost)
    {
        $this->db->insert('persona', $datosp);

        $id_persona = $this->db->insert_id();

        $datost['id_persona'] = $id_persona;

        return $this->db->insert('transportista', $datost);
    }
    public function getTransportista($id_transportista)
    {
        $this->db->select('t.*, p.nombres, p.apellidos, p.carnet_identidad, p.telefono, tt.nombres as tipotransporte');
        $this->db->from('transportista t');
        $this->db->join('persona p', 't.id_persona = p.id_persona');
        $this->db->join('tipo_transporte tt', 't.id_tipo_transporte = tt.id_tipo_transporte');
        $this->db->where('id_transportista',$id_transportista);
        $resultado = $this->db->get();

        return $resultado->row();
       
    }
    public function actualizar($id_transportista,$id_persona, $datosp, $datost)
    {
        $this->db->where('id_persona',$id_persona);
        $this->db->update('persona',$datosp);

        $this->db->where('id_transportista',$id_transportista);
        return $this->db->update('transportista',$datost);


    }
    public function borrar($id_transportista,$data)
    {
        $this->db->where("id_transportista",$id_transportista);
        return $this->db->update("transportista",$data);
    }
    public function validarCi($ci)
    {
        $this->db->select('t.estado, p.carnet_identidad', 'tt.estado');
        $this->db->from('transportista t');
        $this->db->join('persona p', 't.id_persona = p.id_persona');
        $this->db->join('tipo_transporte tt', 't.id_tipo_transporte = tt.id_tipo_transporte');
        $this->db->where('p.carnet_identidad',$ci);
        $this->db->where('t.estado','1');
        $this->db->where('tt.estado','1');
        $resultado = $this->db->get();

        $row = $resultado->row();

        if (isset($row)) {
            return false;
        } else {
            return true;
        }
    }
}
