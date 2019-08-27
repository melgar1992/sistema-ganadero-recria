<?php
class Clientes_model extends CI_Model
{

    public function getClientes()
    {
        $this->db->select('c.* ,tc.nombre as tipocliente, td.nombre as tipodocumento');
        $this->db->from('clientes c');
        $this->db->join('tipo_cliente tc','c.id_tipo_cliente = tc.id_tipo_cliente');
        $this->db->join('tipo_documento td','c.id_tipo_documento = td.id_tipo_documento');
        $this->db->where('c.estado','1');
        $resultados = $this->db->get();
        return $resultados->result();
    }
    public function guardarCli($data)
    {
        return $this->db->insert("clientes", $data);
    }
    public function getCliente($id_clientes)
    {
        
        $this->db->select('c.* ,tc.nombre as tipocliente, td.nombre as tipodocumento');
        $this->db->from('clientes c');
        $this->db->join('tipo_cliente tc','c.id_tipo_cliente = tc.id_tipo_cliente');
        $this->db->join('tipo_documento td','c.id_tipo_documento = td.id_tipo_documento');
        $this->db->where('c.estado','1');
        $this->db->where("id_clientes", $id_clientes);
        $resultado = $this->db->get();
        return $resultado->row();
    }
    public function actualizar($id_clientes,$data)
{
    $this->db->where("id_clientes",$id_clientes);
   return $this->db->update("clientes",$data);
    
}
public function getTipoClientes()
{
    $this->db->select('*');
    $resultado = $this->db->get('tipo_cliente');
    return $resultado->result();
}
public function getTipoDocumentos()
{
    $this->db->select('*');
    $resultado = $this->db->get('tipo_documento');
    return $resultado->result();
}
}
