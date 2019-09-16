<?php
class Intermediario_model extends CI_Model
{
    public function getIntermediarios()
    {
        $this->db->select('i.*, p.nombres, p.apellidos, p.carnet_identidad, p.telefono');
        $this->db->from('intermediario i');
        $this->db->join('persona p', 'i.id_persona = p.id_persona');
       $this->db->where('i.estado','1');
        $resultado = $this->db->get();



        return $resultado->result();
    }
    public function guardarIntermediario($datosp, $datosi)
    {
        $this->db->insert('persona', $datosp);

        $id_persona = $this->db->insert_id();

        $datosi['id_persona'] = $id_persona;

        return $this->db->insert('intermediario', $datosi);
    }
    public function getIntermediario($id_intermediario)
    {
        $this->db->select('i.*, p.nombres, p.apellidos, p.carnet_identidad, p.telefono');
        $this->db->from('intermediario i');
        $this->db->join('persona p', 'i.id_persona = p.id_persona');
        
        $this->db->where('id_intermediario',$id_intermediario);
        $resultado = $this->db->get();

        return $resultado->row();
       
    }
    public function actualizar($id_intermediario,$id_persona, $datosp, $datosi)
    {
        $this->db->where('id_persona',$id_persona);
        $this->db->update('persona',$datosp);

        $this->db->where('id_intermediario',$id_intermediario);
        return $this->db->update('intermediario',$datosi);


    }
    public function borrar($id_intermediario,$data)
    {
        $this->db->where("id_intermediario",$id_intermediario);
        return $this->db->update("intermediario",$data);
    }

}