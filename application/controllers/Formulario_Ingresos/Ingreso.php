<?php

class Ingreso extends BaseController
{
    public function index()
    {
        $data = array(
            'ingresos' => $this->Ingreso_model->getIngresos(),
       
            
        );


        $this->loadView('Ingresos','/form/formulario_ingresos/ingresos/list', $data);
    }

    public function add()
    {
        $data = array(
            'ingresos' => $this->Ingreso_model->getIngresos(),
            'detalle_ingresos'=>$this->Ingreso_model->getDetalle(),
            "categoriaingresos" => $this->Ingreso_model->getCategoriaIngresos(),
            "empleados" => $this->Ingreso_model->getEmpleados(),
        );
        $this->loadView('Ingresos','/form/formulario_ingresos/ingresos/add', $data);
    }
    

    public function guardarIngresos()
    {
        $fecha = $this->input->post("fecha");
        $forma_pago = $this->input->post("forma_pago");
        $id_empleado=$this->input->post("id_empleado");
        $categoriaingresos=$this->input->post("categoriaingresos");
        $usuarios=$this->session->userdata("id_usuarios");

        $cantidad=$this->input->post("cantidad");
        $detalle=$this->input->post("detalle");
        $precio_unitario=$this->input->post("precio_unitario");
        $total=$this->input->post("total");
      
        

            $data = array(
                'fecha'=>$fecha,
                'forma_pago'=>$forma_pago,
                'id_empleado'=>$id_empleado,
                'id_categoria_ingresos'=>$categoriaingresos,
                'id_usuarios'=>$usuarios,
               
               
                


               

                
            );

            if ($this->Ingreso_model->guardarIngresos($data)) {

               $id_otros_ingresos= $this->Ingreso_model->ultimoID();
               $this->guardar_detalle($id_otros_ingresos,$cantidad,$detalle,$precio_unitario,$total);
      
               
            } else {
                redirect(base_url().'Formulario_Ingresos/Ingreso/add');
            }
            
    
        }
    
        protected function guardar_detalle($id_otros_ingresos,$cantidad,$detalle,$precio_unitario,$total)
     {
    
            $data = array(
                
                'id_otros_ingresos' => $id_otros_ingresos,
                'cantidad' => $cantidad,
                'detalle' => $detalle,
                'precio_unitario' => $precio_unitario,
                'total' => $total,
             );
             $this->Ingreso_model->guardar_detalle($data);
          
        }
    }

     
        
    
    
    
    



