<?php
class Categoria_gastos_variable_model extends CI_Model
{
    public function getTipoCategoriaGastosVariable()
    {
        $this->db->where("estado", "1");
        $resultados = $this->db->get("tipo_gastos_variables");
        return $resultados->result();
    }
    public function guardarCategoriaGastosVariable($data)
    {
        return $this->db->insert("tipo_gastos_variables", $data);
    }
    public function getCategoriaGastosVariable($id_tipo_gastos_variables)
    {
        $this->db->where("id_tipo_gastos_variables", $id_tipo_gastos_variables);
        $resultado = $this->db->get("tipo_gastos_variables");
        return $resultado->row();
    }
    public function actualizarCategoriaGastosVariables($id_tipo_gastos_variables,$data)
    {
        $this->db->where("id_tipo_gastos_variables",$id_tipo_gastos_variables);
       
     return $this->db->update("tipo_gastos_variables",$data);
       
      
    }
    public function validarNombre($nombre)
    {
        $this->db->where('estado','1');
        $this->db->where('nombre',$nombre);
        $resultado = $this->db->get('tipo_gastos_variables');

        $row = $resultado->row();
        if (isset($row)) {
            return false;
        } else {
            return true;
        }
    }
  

}