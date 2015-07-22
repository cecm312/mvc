<?php

require_once('../core/db_abstract_model.php');

class Articulo extends DBModel {

    public $referencia;
    public $categoria;
    public $descripcion;
    public $iva;
    public $ubicacion;
    public $stockMax;
    public $stockMin;
    public $observacion;
    public $precioCompra;
    public $precioAlmacen;
    public $precioTienda;
    public $fechaAlta;
    public $fk_proveedor;
    public $id;

    function __construct() {
        $this->db_name = 'itic';
    }

    public function get($referencia = '') {
        if ($referencia != '') {
            $this->query = "
            SELECT id, referencia,categoria,descripcion,iva,ubicacion,stock_max,stock_min,observacion,preciocompra,precioalmacen,preciotienda,fechaalta,proveedor
            FROM articulos WHERE referencia = '$referencia'";
            $this->get_results_query();
            $this->mensaje = "";
        }
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = "Articulo encontrado";
        } else {
            $this->mensaje = "Articulo no encontrado";
        }
    }

    public function set($item_data = array()) {
        if (array_key_exists('referencia', $item_data)) {
            $this->get($item_data['referencia']);
            if ($item_data['referencia'] != $this->referencia) {
                foreach ($item_data as $campo => $valor) {
                    $$campo = $valor;
                }

                $this->query = "INSERT INTO articulos VALUES (0,'$referencia','$categoria','$descripcion',$iva,'$ubicacion',$stock_max,$stock_min,'$observacion',$preciocompra,$precioalmacen,$preciotienda,'$fechaalta','$proveedor')";
                $this->execute_query();
                $this->mensaje = "Articulo agregado exitosamente";
            } else {
                $this->mensaje = "El articulo ya existe";
            }
        } else {
            $this->mensaje = "No se ha agregado el articulo";
        }
    }

    public function edit($item_data = array()) {
        foreach ($item_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "UPDATE articulos 
        SET referencia='$referencia',categoria='$categoria',descripcion='$descripcion',iva='$iva',ubicacion='$ubicacion',stock_max='$stockMax',stock_min='$stockMin',observacion='$observacion',preciocompra='$precioCompra',precioalmacen='$precioAlmacen',preciotienda='$precioTienda',fechaalta='$fechaAlta'
        WHERE id = '$id'";
        $this->execute_query();
        $this->mensaje = "Articulo modificado";
    }

    public function delete($referencia = '') {
        $this->query = "DELETE FROM articulos WHERE referencia = '$referencia'";
        $this->execute_query();
        $this->mensaje = "Articulo eliminado";
    }

    function __destruct() {
        unset($this);
    }

}

?>