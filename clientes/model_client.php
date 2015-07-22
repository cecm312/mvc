<?php

//importar modelo de abstraccion de BD.
require_once('../core/db_abstract_model.php');

class Client extends DBModel {

    //Propiedades

    public $email;
    public $nombre;
    public $rfc;
    public $direccion;
    public $localidad;
    public $provincia;
    public $formaPago;
    public $entidadBancaria;
    public $cuentaBancaria;
    public $codigoPostal;
    public $telefono;
    public $movil;
    public $web;
    protected $id;
    public $arPrivincias;
    public $arFormasPago;
    public $arEntidadBancaria;

//Traer datos de un usuario

    public function get($client_email = '') {
        if ($client_email != '') {
            $this->query = "SELECT id, Nombre, RFC, Direccion, Localidad, Provincia, Forma_de_pago, Entidad_bancaria, Cuenta_bancaria, Codigo_postal, Telefono, Movil, Correo, Direccion_web, Razon_social, Domicilio_fiscal, Observacion FROM clientes WHERE Correo ='$client_email'";
            $this->get_results_query();
        }
        if (count($this->rows) == 1) {
            # code...
            foreach ($this->rows[0] as $propiedad => $valor) {
                # code...
                $this->$propiedad = $valor;
            }
        } else {
            $this->mensaje = 'Usuario no encontrado';
        }
    }
    

//Crear nuevo usuario
    public function set($client_data = array()) {

        if (array_key_exists('email', $client_data)) {
            # code...
            if ($client_data['email'] != $this->email) {
                foreach ($client_data as $campo => $valor) {
                    # code...
                    $$campo = $valor;
                }
                $this->query = "INSERT INTO clientes (Nombre, RFC, Direccion, Localidad, Provincia, Forma_de_pago, Entidad_bancaria, Cuenta_bancaria, Codigo_postal, Telefono, Movil, Correo, Direccion_web,Razon_social, Domicilio_fiscal, Observacion) values ('$nombre',
	'$rfc',
	'$direccion',
	'$localidad',
	'$provincia',
	'$formaPago',
	'$Entidad',
	'$cuentaBancaria',
	'$codigoPostal',
	'$telefono',
	'$movil',
	'$email',
	'$web',
	'$razon',
	'$domicilioFiscal',
	'$observacion')";
                $this->execute_query();
                
                $this->mensaje = 'Usuario agregado exitosamente';
            } else {
                $this->mensaje = 'El usuario ya existe';
            }
        } else {
            $this->mensaje = 'No se ha agregado al usuario';
        }
    }

//Modificar un usuario
    public function edit($client_data = array()) {
        foreach ($client_data as $campo => $valor) {
            # code...
            $$campo = $valor;
        } 
        $this->query = "UPDATE clientes SET Nombre='$nombre', RFC='$rfc', Direccion='$direccion',Localidad='$localidad',Provincia='$provincia',
	Forma_de_pago='$formaPago',
	Entidad_bancaria='$Entidad',
	Cuenta_bancaria='$cuentaBancaria',
	Codigo_postal='$codigoPostal',
	Telefono='$telefono',
	Movil='$movil',
	Correo='$email',
	Direccion_web='$web',
	Razon_social='$razon',
	Domicilio_fiscal='$domicilioFiscal',
	Observacion='$observacion'
	WHERE Correo='$email'";
        $this->execute_query();
        $this->mensaje = 'Usuario Modificado';
    }

//Eliminar Cliente
    public function delete($client_email = '') {
        $this->query = "DELETE FROM clientes WHERE Correo='$client_email'";
        $this->execute_query();
        $this->mensaje = 'Usuario eliminado';
    }

//Metodo Constructor
    function __construct() {
        $this->db_name = 'itic';
        $this->arPrivincias=array("Selecciona una Provincia","Quintana Roo","Baja California","Queretaro");
        $this->arFormasPago=array("Selecciona una Forma de Pago","Tarjeta","Efectivo","Credito");
        $this->arEntidadBancaria=array("Selecciona una Entidad Bancaria","Banamex","Bancomer","Santander");
    }

//Metodo destructor del objeto

    function __destruct() {
        unset($this);
    }

}

?>