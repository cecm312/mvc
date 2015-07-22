<?php

require_once('constants.php');
require_once('model.php');
require_once('view.php');

function handler() {
    $event = VIEW_GET_PROVEEDOR;
    $uri = $_SERVER['REQUEST_URI'];
    $peticiones = array(SET_PROVEEDOR, GET_PROVEEDOR, DELETE_PROVEEDOR, EDIT_PROVEEDOR, VIEW_SET_PROVEEDOR, VIEW_GET_PROVEEDOR, VIEW_DELETE_PROVEEDOR, VIEW_EDIT_PROVEEDOR);
    foreach ($peticiones as $peticion) {
        $uri_peticion = MODULO . $peticion . '/';
        if (strpos($uri, $uri_peticion) == true) {
            $event = $peticion;
        }
    }
    $proveedor_data = helper_proveedor_data();
    $proveedor = set_obj();
    switch ($event) {
        case SET_PROVEEDOR:
            $proveedor->set($proveedor_data);
            $data = array('mensaje' => $proveedor->mensaje);
            retornar_vista(VIEW_SET_PROVEEDOR, $data);
            break;
        case GET_PROVEEDOR:
            $proveedor->get($proveedor_data);
            $data = array(
                'nombre' => $proveedor->nombre,
                'rfc' => $proveedor->rfc,
                'direccion' => $proveedor->direccion,
                'localidad' => $proveedor->localidad,
                'estado' => $proveedor->estado,
                'entidad_bancaria' => $proveedor->entidad_bancaria,
                'cuenta_bancaria' => $proveedor->cuenta_bancaria,
                'codigo_postal' => $proveedor->codigo_postal,
                'telefono' => $proveedor->telefono,
                'movil' => $proveedor->movil,
                'correo_electronico' => $proveedor->correo_electronico,
                'direccion_web' => $proveedor->direccion_web,
                'fecha_alta' => $proveedor->fecha_alta,
                'observaciones' => $proveedor->observaciones,
                'estatus' => $proveedor->estatus,
                'contacto' => $proveedor->contacto
            );
            retornar_vista(VIEW_EDIT_PROVEEDOR, $data);
            break;
        case DELETE_PROVEEDOR:
            $proveedor->delete($proveedor_data['rfc']);
            $data = array('mensaje' => $proveedor->mensaje);
            retornar_vista(VIEW_DELETE_PROVEEDOR, $data);
            break;
        case EDIT_PROVEEDOR:
            $proveedor->edit($proveedor_data);
            $data = array('mensaje' => $proveedor->mensaje);
            retornar_vista(VIEW_GET_PROVEEDOR, $data);
            break;
        default:
            retornar_vista($event);
    }
}

function set_obj() {
    $obj = new Proveedor();
    return $obj;
}

function helper_proveedor_data() {
    $proveedor_data = array();
    if ($_POST) {
        if (array_key_exists('nombre', $_POST) and $_POST["nombre"]!="") {
            $proveedor_data['nombre'] = $_POST['nombre'];
        }
        if (array_key_exists('rfc', $_POST) and $_POST["rfc"]!="") {
            $proveedor_data['rfc'] = $_POST['rfc'];
        }
        if (array_key_exists('direccion', $_POST) and $_POST["direccion"]!="") {
            $proveedor_data['direccion'] = $_POST['direccion'];
        }
        if (array_key_exists('localidad', $_POST) and $_POST["localidad"]!="") {
            $proveedor_data['localidad'] = $_POST['localidad'];
        }
        if (array_key_exists('estado', $_POST) and $_POST["estado"]!="") {
            $proveedor_data['estado'] = $_POST['estado'];
        }
        if (array_key_exists('entidad_bancaria', $_POST)and $_POST["entidad_bancaria"]!="") {
            $proveedor_data['entidad_bancaria'] = $_POST['entidad_bancaria'];
        }
        if (array_key_exists('cuenta_bancaria', $_POST)and $_POST["cuenta_bancaria"]!="") {
            $proveedor_data['cuenta_bancaria'] = $_POST['cuenta_bancaria'];
        }
        if (array_key_exists('codigo_postal', $_POST)and $_POST["codigo_postal"]!="") {
            $proveedor_data['codigo_postal'] = $_POST['codigo_postal'];
        }
        if (array_key_exists('telefono', $_POST)and $_POST["telefono"]!="") {
            $proveedor_data['telefono'] = $_POST['telefono'];
        }
        if (array_key_exists('movil', $_POST)and $_POST["movil"]!="") {
            $proveedor_data['movil'] = $_POST['movil'];
        }
        if (array_key_exists('correo_electronico', $_POST)and $_POST["correo_electronico"]!="") {
            $proveedor_data['correo_electronico'] = $_POST['correo_electronico'];
        }
        if (array_key_exists('direccion_web', $_POST)and $_POST["direccion_web"]!="") {
            $proveedor_data['direccion_web'] = $_POST['direccion_web'];
        }
        if (array_key_exists('fecha_alta', $_POST)and $_POST["fecha_alta"]!="") {
            $proveedor_data['fecha_alta'] = $_POST['fecha_alta'];
        }
        if (array_key_exists('observaciones', $_POST)and $_POST["observaciones"]!="") {
            $proveedor_data['observaciones'] = $_POST['observaciones'];
        }
        if (array_key_exists('estatus', $_POST)and $_POST["estatus"]!="") {
            $proveedor_data['estatus'] = $_POST['estatus'];
        }
        if (array_key_exists('contacto', $_POST)and $_POST["contacto"]!="") {
            $proveedor_data['contacto'] = $_POST['contacto'];
        }
    } else if ($_GET) {
        if (array_key_exists('rfc', $_GET)) {
            $proveedor_data = $_GET['rfc'];
        }
    }
    return $proveedor_data;
}

handler();
?>

