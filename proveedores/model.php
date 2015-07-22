<?php

require_once('../core/db_abstract_model.php');

class Proveedor extends DBModel {

    public $nombre;
    public $rfc;
    public $direccion;
    public $localidad;
    public $estado;
    public $entidad_bancaria;
    public $cuenta_bancaria;
    public $codigo_postal;
    public $telefono;
    public $movil;
    public $correo_electronico;
    public $direccion_web;
    public $fecha_alta;
    public $observaciones;
    public $estatus;
    public $contacto;
    function __construct() {
        $this->db_name = 'itic';
    }

    public function get($proveedor_rfc = '') {
        if ($proveedor_rfc != '') {
            $this->query = "SELECT nombre, rfc, direccion, localidad, estado, entidad_bancaria, cuenta_bancaria, codigo_postal, telefono, movil, correo_electronico, direccion_web, fecha_alta, observaciones, estatus, contacto FROM proveedor WHERE rfc = '$proveedor_rfc'";
            echo $this->query;
            $this->get_results_query();
            $this->mensaje = "";
        }
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = "Proveedor encontrado";
        } else {
            $this->mensaje = "Proveedor no encontrado";
        }
    }

    public function set($user_data = array()) {
        if (array_key_exists('rfc', $user_data)) {
            $this->get($user_data['rfc']);
            if ($user_data['rfc'] != $this->rfc) {
                $arrayTemp=array();
                foreach ($user_data as $campo => $valor) {
                    array_push($arrayTemp, "$campo='$valor'");
                }
                $campos=  "SET ".implode(",", $arrayTemp);
                $this->query="INSERT INTO proveedor $campos";
                echo $this->query;
                $this->execute_query();
                $this->mensaje = "Proveedor agregado exitosamente";
            } else {
                $this->mensaje = "El proveedor ya existe";
            }
        } else {
            $this->mensaje = "No se ha agregado el proveedor";
        }
    }

    public function edit($user_data = array()) {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "UPDATE proveedor SET nombre='$nombre', rfc='$rfc', direccion='$direccion', localidad='$localidad', estado='$estado', entidad_bancaria='$entidad_bancaria', cuenta_bancaria='$cuenta_bancaria', codigo_postal='$codigo_postal', telefono='$telefono', movil='$movil', correo_electronico='$correo_electronico', direccion_web='$direccion_web', fecha_alta='$fecha_alta', observaciones='$observaciones', activa='$activa', contacto='$contacto' WHERE rfc = '$rfc'";
        $this->execute_query();
        $this->mensaje = "Proveedor modificado";
    }

    public function delete($proveedor_rfc = '') {
        $this->query = "DELETE FROM proveedor WHERE rfc = '$proveedor_rfc'";
        $this->execute_query();
        $this->mensaje = "Proveedor eliminado";
    }

    function __destruct() {
        unset($this);
    }

}

?>