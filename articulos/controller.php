<?php

require_once('constants.php');
require_once('model.php');
require_once('view.php');

function handler() {
    $event = VIEW_GET_ITEM;
    $uri = $_SERVER['REQUEST_URI'];
    $peticiones = array(SET_ITEM, GET_ITEM, DELETE_ITEM, EDIT_ITEM,VIEW_SET_ITEM, VIEW_GET_ITEM, VIEW_DELETE_ITEM,VIEW_EDIT_ITEM);
    foreach ($peticiones as $peticion) {
        $uri_peticion = MODULO . $peticion . '/';
        if (strpos($uri, $uri_peticion) == true) {
            $event = $peticion;
        }
    }
    $item_data = helper_item_data();
    $articulo = set_obj();
    switch ($event) {
        case SET_ITEM:
            $articulo->set($item_data);
            $data = array('mensaje' => $articulo->mensaje);
            retornar_vista(VIEW_SET_ITEM, $data);
            break;
        case GET_ITEM:
            $articulo->get($item_data);
            $data = array(
                'id' => $articulo->id,
                'referencia' => $articulo->referencia,
                'categoria' => $articulo->categoria,
                'descripcion' => $articulo->descripcion,
                'iva' => $articulo->iva,
                'ubicacion' => $articulo->ubicacion,
                'stock_max' => $articulo->stock_max,
                'stock_min' => $articulo->stock_min,
                'observacion' => $articulo->observacion,
                'preciocompra' => $articulo->preciocompra,
                'precioalmacen' => $articulo->precioalmacen,
                'preciotienda' => $articulo->preciotienda,
                'fechaalta' => $articulo->fechaalta,
                'proveedor' => $articulo->proveedor
            );
            retornar_vista(VIEW_EDIT_ITEM, $data);
            break;
        case DELETE_ITEM:
            $articulo->delete($item_data['referencia']);
            $data = array('mensaje' => $articulo->mensaje);
            retornar_vista(VIEW_DELETE_ITEM, $data);
            break;
        case EDIT_ITEM:
            $articulo->edit($item_data);
            $data = array('mensaje' => $articulo->mensaje);
            retornar_vista(VIEW_GET_ITEM, $data);
            break;
        default:
            retornar_vista($event);
    }
}

function set_obj() {
    $obj = new Articulo();
    return $obj;
}

function helper_item_data() {
    $item_data = array();
    if ($_POST) {
        if (array_key_exists('referencia', $_POST)) {
            $item_data['referencia'] = $_POST['referencia'];
        }
        if (array_key_exists('categoria', $_POST)) {
            $item_data['categoria'] = $_POST['categoria'];
        }
        if (array_key_exists('descripcion', $_POST)) {
            $item_data['descripcion'] = $_POST['descripcion'];
        }
        if (array_key_exists('iva', $_POST)) {
            $item_data['iva'] = $_POST['iva'];
        }
        if (array_key_exists('ubicacion', $_POST)) {
            $item_data['ubicacion'] = $_POST['ubicacion'];
        }
        if (array_key_exists('stock_max', $_POST)) {
            $item_data['stock_max'] = $_POST['stock_max'];
        }
        if (array_key_exists('stock_min', $_POST)) {
            $item_data['stock_min'] = $_POST['stock_min'];
        }
        if (array_key_exists('observacion', $_POST)) {
            $item_data['observacion'] = $_POST['observacion'];
        }
        if (array_key_exists('preciocompra', $_POST)) {
            $item_data['preciocompra'] = $_POST['preciocompra'];
        }
        if (array_key_exists('precioalmacen', $_POST)) {
            $item_data['precioalmacen'] = $_POST['precioalmacen'];
        }
        if (array_key_exists('preciotienda', $_POST)) {
            $item_data['preciotienda'] = $_POST['preciotienda'];
        }
        if (array_key_exists('fechaalta', $_POST)) {
            $item_data['fechaalta'] = $_POST['fechaalta'];
        }
        if (array_key_exists('proveedor', $_POST)) {
            $item_data['proveedor'] = $_POST['proveedor'];
        }
    } else if ($_GET) {
        if (array_key_exists('referencia', $_GET)) {
            $item_data = $_GET['referencia'];
        }
    }
    return $item_data;
}

handler();
?>

