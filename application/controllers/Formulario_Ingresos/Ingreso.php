<?php

class Ingreso extends BaseController
{
    public function index()
    {
        $data = array(
            'ingresos' => $this->Ingreso_model->getIngresos(),

        );


        $this->loadView('Ingresos', '/form/formulario_ingresos/ingresos/list', $data);
    }

    public function add()
    {
        $data = array(
            'ingresos' => $this->Ingreso_model->getIngresos(),
            'detalle_ingresos' => $this->Ingreso_model->getDetalle(),
            "categoriaingresos" => $this->Ingreso_model->getCategoriaIngresos(),
            "empleados" => $this->Empleado_model->getEmpleados(),
        );
        $this->loadView('Ingresos', '/form/formulario_ingresos/ingresos/add', $data);
    }


    public function guardarIngresos()
    {
        $id_categoria_ingresos = $this->input->post("categoriaingresos");
        $id_empleado = $this->input->post("id_empleado");
        $usuarios = $this->session->userdata("id_usuarios");
        $fecha = $this->input->post("fecha");
        $forma_pago = $this->input->post("forma_pago");
        $total = $this->input->post("total");

        $cantidad = $this->input->post("cantidad");
        $detalle = $this->input->post("detalle");
        $precio_unitario = $this->input->post("precio_unitario");
        $sub_total = $this->input->post("sub_total");




        $data = array(
            'id_categoria_ingresos' => $id_categoria_ingresos,
            'id_empleado' => $id_empleado,
            'id_usuarios' => $usuarios,
            'fecha' => $fecha,
            'forma_pago' => $forma_pago,
            'total' => $total,
            'estado' => '1'

        );

        if ($this->Ingreso_model->guardarIngresos($data)) {
            $id_otros_ingresos = $this->Ingreso_model->ultimoID();
            $this->guardar_detalle($id_otros_ingresos, $cantidad, $detalle, $precio_unitario, $sub_total);
            $this->index();
        } else {
            redirect(base_url() . 'Formulario_Ingresos/Ingreso/add');
        }
    }

    protected function guardar_detalle($id_otros_ingresos, $cantidad, $detalle, $precio_unitario, $sub_total)
    {
        for ($i = 0; $i < count($cantidad); $i++) {
            $data = array(

                'id_otros_ingresos' => $id_otros_ingresos,
                'cantidad' => $cantidad[$i],
                'detalle' => $detalle[$i],
                'precio_unitario' => $precio_unitario[$i],
                'sub_total' => $sub_total[$i],
            );
            $this->Ingreso_model->guardar_detalle($data);
        }
    }
}
