<?php
class Categoria_otros_ingresos_model extends CI_Model
{
    public function getTipoCategoriaOtrosIngresos()
    {
        $this->db->where("estado", "1");
        $resultados = $this->db->get("categoria_ingresos");
        return $resultados->result();
    }
    public function guardarCategoriaIngresos($data)
    {
        return $this->db->insert("categoria_ingresos", $data);
    }
    public function getCategoria_ingreso($id_categoria_ingresos)
    {
        $this->db->where("id_categoria_ingresos", $id_categoria_ingresos);
        $resultado = $this->db->get("categoria_ingresos");
        return $resultado->row();
    }
    public function actualizarCategoriaIngresos($id_categoria_ingresos,$data)
    {
        $this->db->where("id_categoria_ingresos",$id_categoria_ingresos);
       
     return $this->db->update("categoria_ingresos",$data);
       
      
    }
    public function validarNombre($nombre)
    {
        $this->db->where('estado','1');
        $this->db->where('nombre',$nombre);
        $resultado = $this->db->get('categoria_ingresos');

        $row = $resultado->row();
        if (isset($row)) {
            return false;
        } else {
            return true;
        }
    }
  

}