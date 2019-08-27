<?php
class Ventas_model extends CI_Model
{
    public function getVentas()
    {
        $this->db->select('v.*, c.nombres, tc.nombre as tipocomprobante');
        $this->db->from('ventas v');
        $this->db->join('clientes c', 'v.id_clientes = c.id_clientes');
        $this->db->join('tipo_comprobante tc', 'v.id_tipo_comprobante = tc.id_tipo_comprobante');
        $resultado = $this->db->get();

        if ($resultado->num_rows() > 0) {

            return $resultado->result();
        } else {
            return false;
        }
    }
    public function getVentasporFecha($fechainicio, $fechafin)
    {

        $this->db->select('v.*, c.nombres, tc.nombre as tipocomprobante');
        $this->db->from('ventas v');
        $this->db->join('clientes c', 'v.id_clientes = c.id_clientes');
        $this->db->join('tipo_comprobante tc', 'v.id_tipo_comprobante = tc.id_tipo_comprobante');
        $this->db->where("v.fecha >=", $fechainicio);
        $this->db->where("v.fecha <=", $fechafin);

        $resultado = $this->db->get();

        if ($resultado->num_rows() > 0) {

            return $resultado->result();
        } else {
            return false;
        }
    }
    public function getVenta($id)
    {
        $this->db->select('v.*, c.nombres, c.direccion, c.telefono, c.num_documento as documento, tc.nombre as tipocomprobante');
        $this->db->from('ventas v');
        $this->db->join('clientes c', 'v.id_clientes = c.id_clientes');
        $this->db->join('tipo_comprobante tc', 'v.id_tipo_comprobante = tc.id_tipo_comprobante');
        $this->db->where("v.id_ventas", $id);
        $resultado = $this->db->get();
        return $resultado->row();
    }
    public function getDetalle($id)
    {
        $this->db->select('dt.*, p.codigo, p.nombre ');
        $this->db->from('detalle_ventas dt');
        $this->db->join('productos p', 'dt.id_productos=p.id_productos');
        $this->db->where("dt.id_ventas", $id);
        $resultados = $this->db->get();
        return $resultados->result();
    }
    public function getComprobantes()
    {
        $resultados = $this->db->get("tipo_comprobante");
        return $resultados->result();
    }
    public function getComprobante($idcomprobante)
    {
        $this->db->where('id_tipo_comprobante', $idcomprobante);
        $resultado = $this->db->get('tipo_comprobante');
        return $resultado->row();
    }
    public function getProductos($valor)
    {
        $this->db->select("id_productos, codigo, nombre as label, precio, stock");
        $this->db->from("productos");
        $this->db->like("nombre", $valor);

        $resultado = $this->db->get();
        return $resultado->result_array();
    }

    public function guardarVentas($data)
    {
        return $this->db->insert('ventas', $data);
    }
    public function ultimoID()
    {
        return $this->db->insert_id();
    }
    public function actualizarComprobante($idcomprobante, $data)
    {
        $this->db->where('id_tipo_comprobante', $idcomprobante);
        $this->db->update('tipo_comprobante', $data);
    }
    public function guardar_detalle($data)
    {
        $this->db->insert('detalle_ventas', $data);
    }
}
