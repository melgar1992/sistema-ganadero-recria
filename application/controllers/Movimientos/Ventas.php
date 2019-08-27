<?php

class Ventas extends BaseController
{

    function __construct()
    {

        parent::__construct();
        $this->load->model("Ventas_model");
    }

    public function index()
    {
        $data = array(
            'ventas' => $this->Ventas_model->getVentas(),
            
        );


        $this->loadView('Ventas','/form/admin/ventas/list', $data);
    }

    public function add()
    {
        $data = array(
            "tipocomprobantes" => $this->Ventas_model->getComprobantes(),
            "clientes" => $this->Clientes_model->getClientes(),
        );
        $this->loadView('Ventas', '/form/admin/ventas/add', $data);
    }
    public function getProductos()
    {
        $valor = $this->input->post("valor");
        $productos = $this->Ventas_model->getProductos($valor);
        echo json_encode($productos);
    }
    public function guardar()
    {
        $fecha = $this->input->post('fecha');
        $subtotal = $this->input->post('subtotal');
        $igv = $this->input->post('igv');
        $descuento = $this->input->post('descuento');
        $total = $this->input->post('total');
        $idcomprobante = $this->input->post('idcomprobante');
        $idcliente = $this->input->post('idcliente');
        $idusuario = $this->session->userdata('id_usuarios');
        $num_documento = $this->input->post('numero');
        $serie = $this->input->post('serie');

        $idproductos = $this->input->post('idproductos');
        $precios = $this->input->post('precios');
        $cantidades = $this->input->post('cantidades');
        $importes = $this->input->post('importes');


        $data = array(
            'id_usuarios' => $idusuario,
            'id_clientes' => $idcliente,
            'id_tipo_comprobante' => $idcomprobante,
            'fecha' => $fecha,
            'subtotal' => $subtotal,
            'igv' => $igv,
            'descuento' => $descuento,
            'total' => $total,
            'num_documento' => $num_documento,
            'serie' => $serie,
        );

        if ($this->Ventas_model->guardarVentas($data)) {

            $idVenta = $this->Ventas_model->ultimoID();
            $this->actualizarComprobante($idcomprobante);
            $this->guardar_detalle($idproductos,$idVenta,$precios,$cantidades,$importes);
            redirect(base_url().'Movimientos/ventas');

        } else {
            redirect(base_url() . 'Movimientos/ventas/add');
        }
    }
    protected function actualizarComprobante($idcomprobante)
    {
        $comprobanteActual = $this->Ventas_model->getComprobante($idcomprobante);
        $data = array(
            'cantidad' => $comprobanteActual->cantidad +1,
         );
         $this->Ventas_model->actualizarComprobante($idcomprobante,$data);
     }
     protected function guardar_detalle($idproductos,$idVenta,$precios,$cantidades,$importes)
     {
        for ($i=0; $i < count($idproductos); $i++) { 
            $data = array(
                'id_ventas' => $idVenta,
                'id_productos' => $idproductos[$i] ,
                'precio' => $precios[$i] ,
                'cantidad' => $cantidades[$i] ,
                'importe' => $importes[$i] ,
             );
             $this->Ventas_model->guardar_detalle($data);
             $this->actualizarProducto($idproductos[$i],$cantidades[$i]);
        }
     }
     protected function actualizarProducto($idproducto,$cantidad)
     {
         $productoActual = $this->Productos_model->getProducto($idproducto);
         $data = array(
             'stock' => $productoActual->stock - $cantidad,
             );
        $this->Productos_model->actualizar($idproducto,$data);
     }
     public function vista()
     {
         $id_venta = $this->input->post('id');
         $data=array(
             "venta"=>$this->Ventas_model->getVenta($id_venta),
             "detalles"=> $this->Ventas_model->getDetalle($id_venta),
         );
         $this->load->view('form/admin/ventas/view', $data);

     }
}
