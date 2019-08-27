<?php

class CLientes extends BaseController
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'clientes' => $this->Clientes_model->getClientes(),
            'tipoclientes' => $this->Clientes_model->getTipoClientes(),
            'tipodocumentos' => $this->Clientes_model->getTipoDocumentos(),
        );

        $this->loadView('Clientes', '/form/admin/clientes/list', $data);
    }
    public function guardarClientes()
    {
        $nombre = $this->input->post("nombres");
        $id_tipoCliente = $this->input->post("tipocliente");
        $tipodocumento = $this->input->post("tipodocumento");
        $numdocumento = $this->input->post("numero_documento");
        $telefono = $this->input->post("telefono");
        $direccion = $this->input->post("direccion");

        $this->form_validation->set_rules('nombres', 'Nombre del cliente', 'required');
        $this->form_validation->set_rules('tipocliente', 'Tipo de cliente', 'required');
        $this->form_validation->set_rules('tipodocumento', 'Tipo de documento', 'required');
        $this->form_validation->set_rules('numero_documento', 'Numero de documento', 'required|is_unique[clientes.num_documento]');

        if ($this->form_validation->run()) {
            $data = array(
                'id_tipo_cliente' => $id_tipoCliente,
                'id_tipo_documento' => $tipodocumento,
                'nombres' => $nombre,
                'telefono' => $telefono,
                'direccion' => $direccion,
                'num_documento' => $numdocumento,
                'estado' => "1"
            );

            if ($this->Clientes_model->guardarCli($data)) {
                redirect(base_url() . "Mantenimiento/clientes");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            }
        } else {
            $this->index();
        }
    }
    public function editar($id_clientes)
    {
        $data = array(
            'cliente' => $this->Clientes_model->getCliente($id_clientes),
            'tipoclientes' => $this->Clientes_model->getTipoClientes(),
            'tipodocumentos' => $this->Clientes_model->getTipoDocumentos(),
        );
        $this->loadView('Clientes', '/form/admin/clientes/editar', $data);
    }
    public function actualizarCliente()
    {
        $id_clientes = $this->input->post('id_clientes');
        $nombre = $this->input->post("nombres");
        $id_tipoCliente = $this->input->post("tipocliente");
        $tipodocumento = $this->input->post("tipodocumento");
        $numdocumento = $this->input->post("numero_documento");
        $telefono = $this->input->post("telefono");
        $direccion = $this->input->post("direccion");

        $clienteActual = $this->Clientes_model->getCliente($id_clientes);

        if ($numdocumento == $clienteActual->num_documento) {
            $is_unique = '';
        } else {
            $is_unique = '|is_unique[clientes.num_documento]';
        }


        $this->form_validation->set_rules('nombres', 'Nombre del cliente', 'required');
        $this->form_validation->set_rules('tipocliente', 'Tipo de cliente', 'required');
        $this->form_validation->set_rules('tipodocumento', 'Tipo de documento', 'required');
        $this->form_validation->set_rules('numero_documento', 'Numero de documento', 'required' . $is_unique);

        if ($this->form_validation->run()) {
            $data = array(

                'id_tipo_cliente' => $id_tipoCliente,
                'id_tipo_documento' => $tipodocumento,
                'nombres' => $nombre,
                'telefono' => $telefono,
                'direccion' => $direccion,
                'num_documento' => $numdocumento,

            );

            if ($this->Clientes_model->actualizar($id_clientes, $data)) {
                redirect(base_url() . "Mantenimiento/clientes");
            } else {
                $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
                redirect(base_url() . "Mantenimiento/clientes/editar" . $id_clientes);
            }
        }else {
            $this->editar($id_clientes);
        }
    }
    public function vista($id_clientes)

    {
        $data = array(
            'cliente' => $this->Clientes_model->getCliente($id_clientes),

        );

        $this->load->view("/form/admin/clientes/vista", $data);
    }
    public function borrar($id_clientes)
    {
        $data = array(
            'estado' => "0",

        );
        $this->Clientes_model->actualizar($id_clientes, $data);
        echo "Mantenimiento/Clientes";
    }
}
