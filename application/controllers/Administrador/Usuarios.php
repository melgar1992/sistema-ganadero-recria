<?php

class Usuarios extends BaseController
{

    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data = array(
            'usuarios' => $this->Usuario_model->getUsuarios(),
            'roles' => $this->Usuario_model->getRoles(),
        );

        $this->loadView('Usuarios', '/form/admin/usuarios/list', $data);
    }
    public function guardarUsuarios()
    {
        $nombre = $this->input->post("nombre");
        $apellidos = $this->input->post("apellidos");
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $roles = $this->input->post("roles");

        $passwordSha = sha1($password);


        $data = array(
            'id_roles' => $roles,
            'nombres' => $nombre,
            'apellidos' => $apellidos, 
            'username' => $username,
            'password' => $passwordSha,
            'estado' => "1"
        );
        if ($this->Usuario_model->guardar($data)) {
            redirect(base_url() . 'Administrador/Usuarios');
        } else {
            $this->session->set_flashdata('error', 'No se pudo guardar la informacion del usuario');
            redirect(base_url() . 'Administrador/Usuarios');
        }
    }
    public function vista()
    {
        $id_usuario = $this->input->post("id");
        $data = array(
            'usuario' => $this->Usuario_model->getUsuario($id_usuario),
        );
        $this->load->view("/form/admin/usuarios/vista", $data);
    }
    public function editar($id_usuario)
    {
        $data = array(

            'roles' => $this->Usuario_model->getRoles(),
            'usuario' => $this->Usuario_model->getUsuario($id_usuario),
        );

        $this->loadView('Usuarios', '/form/admin/usuarios/editar', $data);
    }
    public function actualizar()
    {
        $idusuario = $this->input->post("idusuario");
        $nombre = $this->input->post("nombre");
        $apellidos = $this->input->post("apellidos");
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $roles = $this->input->post("roles");



        $data = array(
            'id_roles' => $roles,
            'nombres' => $nombre,
            'apellidos' => $apellidos,
            'username' => $username,
            'password' => $password,

        );
        if ($this->Usuario_model->actualizar($idusuario, $data)) {
            redirect(base_url() . 'Administrador/Usuarios');
        } else {
            $this->session->set_flashdata('error', 'No se pudo guardar la informacion del usuario');
            redirect(base_url() . 'Administrador/Usuarios/editar' . $idusuario);
        }
    }
    public function borrar($id_usuarios)
    {
        $data = array(
            'estado' => "0",

        );
        $this->Usuario_model->actualizar($id_usuarios, $data);
        echo "Administrador/Usuarios";
    }
}
