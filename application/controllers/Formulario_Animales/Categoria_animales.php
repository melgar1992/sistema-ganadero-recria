<?php

class Categoria_animales extends BaseController
{
    

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'categoria_animal' => $this->Categoria_animales_model->getCategoriaAnimal(),
            
        
        );

        $this->loadView('Categoria_animales', '/form/formulario_animales/categoria_animales/list', $data);
    }
    public function guardarCategoriaAnimal()
    {
        $nombre = $this->input->post("nombre");
        $raza = $this->input->post("raza");
        $this->form_validation->set_rules("raza", "Raza", "required|is_unique[tipo_animal.raza]");
        if ($this->form_validation->run()) {


            $data = array(
                'nombre' => $nombre,
                'raza' => $raza,
                'estado' => "1"
            );

            if ($this->Categoria_animales_model->guardarCat($data)) {
                redirect(base_url() ."Formulario_Animales/Categoria_animales");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            }
        
        } else {
            $this->index();
      
        }
    }
   
    public function editar($id_tipo_animal)
    {
        $animales = array(  
             'Bovino', 
             'Equino', 
             'Familia_Cerdos', 
             'Aves', 
            
        
        );
      
        $data = array(
            'categorias' => $this->Categoria_animales_model->getCategoria($id_tipo_animal),
            'animales'=> $animales,
           
        );
        
        $this->loadView('Categoria_animales', '/form/formulario_animales/categoria_animales/editar', $data);
       
    }

    public function actualizarCategoriaAnimal()
    {
        $id_tipo_animal = $this->input->post("id_tipo_animal");
        $nombre = $this->input->post("nombre");
        $raza = $this->input->post("raza");
        $categoriaActual=$this->Categoria_animales_model->getCategoria($id_tipo_animal);
        if ($raza==$categoriaActual->raza) {
            $unique='';

        }
        else{
            $unique='|is_unique[tipo_animal.raza]';
        }

        $this->form_validation->set_rules("raza", "Raza", "required".$unique);
        if ($this->form_validation->run()) {

            $data = array(
                'nombre' => $nombre,
                'raza' => $raza,
                'estado' => "1"
            );
            if ($this->Categoria_animales_model->actualizar($id_tipo_animal, $data)) {
                redirect(base_url() . "Formulario_Animales/Categoria_animales");
            } else {
                $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
                redirect(base_url() . "Formulario Animales/Categoria_animales/editar" . $id_tipo_animal);
            }
        }
        else {
            $this->editar($id_tipo_animal);
        }

        
    }
    public function borrar($id_tipo_animal)
    {
        $data = array(
            'estado' => "0",

        );
        $this->Categoria_animales_model->actualizar($id_tipo_animal, $data);
        echo "Formulario_Animales/Categoria_animales";
    }

    
}
