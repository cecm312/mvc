<?php

require_once('constants.php');
require_once('model_client.php');
require_once('view.php');

function handler() {
    $event = VIEW_GET_CLIENT;
    $uri = $_SERVER['REQUEST_URI']; //devuelve la url que se esta ejecutando relativa a la raiz del dominio
    $peticiones = array(SET_CLIENT, GET_CLIENT, DELETE_CLIENT, EDIT_CLIENT, VIEW_SET_CLIENT, VIEW_GET_CLIENT, VIEW_DELETE_CLIENT, VIEW_EDIT_CLIENT);

    foreach ($peticiones as $peticion) {
        # code...
        $uri_peticion = MODULO . $peticion . '/';
        //Stropos() devuelve la posicion del primer caracter de la palabra que estamos buscando
        if (strpos($uri, $uri_peticion) == true) {
            $event = $peticion;
        }
    }

    $client_data = helper_client_data();
    $cliente = set_obj();



    switch ($event) {
        case SET_CLIENT:
            # code...
            $cliente->set($client_data);
            $data = array('mensaje' => $cliente->mensaje);
            retornar_vista(VIEW_SET_CLIENT, $data);
            break;
        case GET_CLIENT:
            # code...
            $cliente->get($client_data);
            $data = array('nombre' => $cliente->Nombre, 'rfc' => $cliente->RFC, 'direccion' => $cliente->Direccion,
                'localidad' => $cliente->Localidad, 'provincia_options' =>create_options($cliente->arPrivincias,$cliente->Provincia), 'formaPago_options' => create_options($cliente->arFormasPago,$cliente->Forma_de_pago),
                'entidadBancaria_options' => create_options($cliente->arEntidadBancaria,$cliente->Entidad_bancaria), 'cuentaBancaria' => $cliente->Cuenta_bancaria, 'codigoPostal' => $cliente->Codigo_postal,
                'telefono' => $cliente->Telefono, 'movil' => $cliente->Movil, 'email' => $cliente->Correo, 'web' => $cliente->Direccion_web, 'razon' => $cliente->Razon_social,
                'domicilioFiscal' => $cliente->Domicilio_fiscal, 'observacion' => $cliente->Observacion);

            retornar_vista(VIEW_EDIT_CLIENT, $data);
            break;
        case DELETE_CLIENT:

            # code...
            $cliente->delete($client_data['email']);
            $data = array('mensaje' => $cliente->mensaje);
            retornar_vista(VIEW_DELETE_CLIENT, $data);
            break;
        case EDIT_CLIENT:

            # code...
            $cliente->edit($client_data);
            $data = array('mensaje' => $cliente->mensaje);
            retornar_vista(VIEW_GET_CLIENT, $data);
            break;

        default:


            retornar_vista($event);
    }
}

function set_obj() {
    $obj = new Client();
    return $obj;
}

function helper_client_data() {
    $client_data = array();
    if ($_POST) {
        # code...
        if (array_key_exists('nombre', $_POST)) {//Verifica si el indice o clave dada existe.
            # code...
            $client_data['nombre'] = $_POST['nombre'];
        }
        if (array_key_exists('rfc', $_POST)) {//Verifica si el indice o clave dada existe.
            # code...
            $client_data['rfc'] = $_POST['rfc'];
        }
        if (array_key_exists('direccion', $_POST)) {//Verifica si el indice o clave dada existe.
            # code...
            $client_data['direccion'] = $_POST['direccion'];
        }
        if (array_key_exists('localidad', $_POST)) {//Verifica si el indice o clave dada existe.
            # code...
            $client_data['localidad'] = $_POST['localidad'];
        }
        if (array_key_exists('provincia', $_POST)) {//Verifica si el indice o clave dada existe.
            # code...
            $client_data['provincia'] = $_POST['provincia'];
        }
        if (array_key_exists('formaPago', $_POST)) {//Verifica si el indice o clave dada existe.
            # code...
            $client_data['formaPago'] = $_POST['formaPago'];
        }
        if (array_key_exists('Entidad', $_POST)) {//Verifica si el indice o clave dada existe.
            # code...
            $client_data['Entidad'] = $_POST['Entidad'];
        }
        if (array_key_exists('cuentaBancaria', $_POST)) {//Verifica si el indice o clave dada existe.
            # code...
            $client_data['cuentaBancaria'] = $_POST['cuentaBancaria'];
        }
        if (array_key_exists('codigoPostal', $_POST)) {//Verifica si el indice o clave dada existe.
            # code...
            $client_data['codigoPostal'] = $_POST['codigoPostal'];
        }
        if (array_key_exists('telefono', $_POST)) {//Verifica si el indice o clave dada existe.
            # code...
            $client_data['telefono'] = $_POST['telefono'];
        }
        if (array_key_exists('movil', $_POST)) {//Verifica si el indice o clave dada existe.
            # code...
            $client_data['movil'] = $_POST['movil'];
        }
        if (array_key_exists('email', $_POST)) {//Verifica si el indice o clave dada existe.
            # code...
            $client_data['email'] = $_POST['email'];
        }
        if (array_key_exists('web', $_POST)) {//Verifica si el indice o clave dada existe.
            # code...
            $client_data['web'] = $_POST['web'];
        }
        if (array_key_exists('razon', $_POST)) {//Verifica si el indice o clave dada existe.
            # code...
            $client_data['razon'] = $_POST['razon'];
        }
        if (array_key_exists('domicilioFiscal', $_POST)) {//Verifica si el indice o clave dada existe.
            # code...
            $client_data['domicilioFiscal'] = $_POST['domicilioFiscal'];
        }
        if (array_key_exists('observacion', $_POST)) {//Verifica si el indice o clave dada existe.
            # code...
            $client_data['observacion'] = $_POST['observacion'];
        }
    } else if ($_GET) {
        # code...
        if (array_key_exists('email', $_GET)) {//Verifica si el indice o clave dada existe.
            # code...
            $client_data = $_GET['email'];
        }
    }
    return $client_data;
}

handler();
?>