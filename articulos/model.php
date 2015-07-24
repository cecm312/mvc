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
    public $arCategorias;
    public $arProveedores;
    public $arUbicaciones;
    public $arImpuestos;

    function __construct() {
        $this->db_name = 'itic';
        $this->arProveedores=$this->getProveedores();
        $this->arCategorias=array("Refrigerados","Abarrotes","Articulos de Limpieza");
        $this->arUbicaciones=array("Zona Sur","Zona Norte","Zona Centro");
        $this->arImpuestos=array("10%","15%","20%");
    }
    private function getProveedores(){
        $proveedores=array();
        $this->query="SELECT nombre FROM proveedor";
        $this->get_all_results_query();
        foreach($this->rows as $proveedor){
            array_push($proveedores, $proveedor["nombre"]);
        }
        return $proveedores;
    }

    public function get($referencia = '') {
        if ($referencia != '') {
            $this->query = "SELECT * FROM articulos WHERE referencia = '$referencia'";
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
        SET categoria='$categoria',descripcion='$descripcion',iva='$iva',ubicacion='$ubicacion',stock_max='$stock_max',stock_min='$stock_min',observacion='$observacion',preciocompra='$preciocompra',precioalmacen='$precioalmacen',preciotienda='$preciotienda',fechaalta='$fechaalta',proveedor='$proveedor'
        WHERE referencia='$referencia'";
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