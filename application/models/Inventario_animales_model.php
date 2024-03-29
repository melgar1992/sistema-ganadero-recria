<?php
class Inventario_animales_model extends CI_Model
{
    public function getInventarioAnimalesBovinos()
    {
        $this->db->select('a.*, e.nombre as nombre_estancia, t.nombre as categoria_animal, t.raza ');
        $this->db->from('animal a');
        $this->db->join('estancias e', 'e.id_estancia = a.id_estancia');
        $this->db->join('tipo_animal t', 't.id_tipo_animal = a.id_tipo_animal');
        $this->db->where('t.nombre', 'Bovino');
        $this->db->where('a.estado', '1');
        $resultado = $this->db->get();
        return $resultado->result();
    }
    public function getInventarioAnimales()
    {
        $this->db->select('a.*, e.nombre as nombre_estancia, t.nombre as categoria_animal, t.raza ');
        $this->db->from('animal a');
        $this->db->join('estancias e', 'e.id_estancia = a.id_estancia');
        $this->db->join('tipo_animal t', 't.id_tipo_animal = a.id_tipo_animal');
        $this->db->where('t.nombre !=', 'Bovino');
        $this->db->where('a.estado', '1');
        $resultado = $this->db->get();
        return $resultado->result();
    }
    public function getInventarioAnimal($id_animal)
    {
        $this->db->select('a.*, e.nombre as nombre_estancia, t.nombre as categoria_animal, t.raza ');
        $this->db->from('animal a');
        $this->db->join('estancias e', 'e.id_estancia = a.id_estancia');
        $this->db->join('tipo_animal t', 't.id_tipo_animal = a.id_tipo_animal');
        $this->db->where('a.id_animal', $id_animal);
        $this->db->where('a.estado', '1');
        $resultado = $this->db->get();
        return $resultado->row();
    }
    public function buscarInventarioAnimal($id_estancia, $id_tipo_animal, $sexo, $categoria)
    {
        $this->db->select('*');
        $this->db->where('id_estancia', $id_estancia);
        $this->db->where('sexo', $sexo);
        $this->db->where('categoria', $categoria);
        $this->db->where('id_tipo_animal', $id_tipo_animal);
        $this->db->where('estado', '1');
        $resultado = $this->db->get('animal');
        $row = $resultado->row();

        if (isset($row)) {
            return $row;
        } else {
            return false;
        }
    }
    public function actualizarInventario($id_animal, $datos)
    {
        $this->db->where('id_animal', $id_animal);
        return $this->db->update('animal', $datos);
    }
    public function guardarInventario($datosAnimal)
    {
        return $this->db->insert('animal', $datosAnimal);
    }
    public function ultimoID()
    {
        return $this->db->insert_id();
    }
    public function borrar($id_animal, $datos)
    {
        $this->db->where('id_animal', $id_animal);
        return $this->db->update('animal', $datos);
    }

    public function getSumatoriaInventarioBovinoAnual()
    {

        $this->db->select_sum('a.stock');
        $this->db->from('animal a');
        $this->db->join('tipo_animal tp', 'tp.id_tipo_animal = a.id_tipo_animal');
        $this->db->where('tp.nombre', 'Bovino');
        $this->db->where('a.estado','1');
        return $this->db->get()->row_array();
    }
    public function cambioCategoriaBovinos()
    {
        $AnimalesBovinos = $this->getInventarioAnimalesBovinos();
        foreach ($AnimalesBovinos as $AnimalBovino) {
            switch ($AnimalBovino->categoria) {

                case '12':
                    if ($this->buscarInventarioAnimal($AnimalBovino->id_estancia, $AnimalBovino->id_tipo_animal, $AnimalBovino->sexo, '12 - 24 ')) {
                        $animalEditar = $this->buscarInventarioAnimal($AnimalBovino->id_estancia, $AnimalBovino->id_tipo_animal, $AnimalBovino->sexo, '12 - 24 ');
                        $datos = array('stock' => $AnimalBovino->stock,);
                        $datos2 = array('stock' => 0,);
                        $this->actualizarInventario($AnimalBovino->id_animal, $datos2);
                        $this->actualizarInventario($animalEditar->id_animal, $datos);
                    } else {
                        $data = array(
                            'id_tipo_animal' => $AnimalBovino->id_tipo_animal,
                            'id_estancia' => $AnimalBovino->id_estancia,
                            'sexo' => $AnimalBovino->sexo,
                            'stock' => $AnimalBovino->stock,
                            'categoria' => "12 - 24 ",
                            'estado' => '1',
                        );
                        $this->guardarInventario($data);
                    }

                    break;
                case '12 - 24 ':
                    if ($this->buscarInventarioAnimal($AnimalBovino->id_estancia, $AnimalBovino->id_tipo_animal, $AnimalBovino->sexo, '24 - 36')) {
                        $animalEditar = $this->buscarInventarioAnimal($AnimalBovino->id_estancia, $AnimalBovino->id_tipo_animal, $AnimalBovino->sexo, '24 - 36');
                        $datos = array('stock' => $AnimalBovino->stock,);
                        $this->actualizarInventario($animalEditar->id_animal, $datos);
                    } else {
                        $data = array(
                            'id_tipo_animal' => $AnimalBovino->id_tipo_animal,
                            'id_estancia' => $AnimalBovino->id_estancia,
                            'sexo' => $AnimalBovino->sexo,
                            'stock' => $AnimalBovino->stock,
                            'categoria' => "24 - 36",
                            'estado' => '1',
                        );
                        $this->guardarInventario($data);
                    }
                    break;
                case '24 - 36':
                    if ($this->buscarInventarioAnimal($AnimalBovino->id_estancia, $AnimalBovino->id_tipo_animal, $AnimalBovino->sexo, '36')) {
                        $animalEditar = $this->buscarInventarioAnimal($AnimalBovino->id_estancia, $AnimalBovino->id_tipo_animal, $AnimalBovino->sexo, '36');
                        $datos = array('stock' => (int) $animalEditar->stock + (int) $AnimalBovino->stock,);
                        $this->actualizarInventario($animalEditar->id_animal, $datos);
                    } else {
                        $data = array(
                            'id_tipo_animal' => $AnimalBovino->id_tipo_animal,
                            'id_estancia' => $AnimalBovino->id_estancia,
                            'sexo' => $AnimalBovino->sexo,
                            'stock' => $AnimalBovino->stock,
                            'categoria' => "36",
                            'estado' => '1',
                        );
                        $this->guardarInventario($data);
                    }
                    break;
                case '36':
                    if ($this->buscarInventarioAnimal($AnimalBovino->id_estancia, $AnimalBovino->id_tipo_animal, $AnimalBovino->sexo, '24 - 36')) {
                        $animalEditar = $this->buscarInventarioAnimal($AnimalBovino->id_estancia, $AnimalBovino->id_tipo_animal, $AnimalBovino->sexo, '24 - 36');
                        $datos = array('stock' => $AnimalBovino->stock,);
                        $this->actualizarInventario($animalEditar->id_animal, $datos);
                    } else {
                        $data = array(
                            'id_tipo_animal' => $AnimalBovino->id_tipo_animal,
                            'id_estancia' => $AnimalBovino->id_estancia,
                            'sexo' => $AnimalBovino->sexo,
                            'stock' => $AnimalBovino->stock,
                            'categoria' => "24 - 36",
                            'estado' => '1',
                        );
                        $this->guardarInventario($data);
                    }
                    break;
                default:

                    break;
            }
        }
    }
}
