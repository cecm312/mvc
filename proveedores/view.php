<?php

$diccionario = array(
    'subtitle' => array(VIEW_SET_PROVEEDOR => 'Dar de alta un proveedor',
        VIEW_GET_PROVEEDOR => 'Buscar proveedor',
        VIEW_DELETE_PROVEEDOR => 'Eliminar un proveedor',
        VIEW_EDIT_PROVEEDOR => 'Modificar un proveedor'
    ),
    'links_menu' => array(
        'VIEW_SET_PROVEEDOR' => MODULO . VIEW_SET_PROVEEDOR . '/',
        'VIEW_GET_PROVEEDOR' => MODULO . VIEW_GET_PROVEEDOR . '/',
        'VIEW_EDIT_PROVEEDOR' => MODULO . VIEW_EDIT_PROVEEDOR . '/',
        'VIEW_DELETE_PROVEEDOR' => MODULO . VIEW_DELETE_PROVEEDOR . '/'
    ),
    'form_actions' => array(
        'SET' => '/mvc/' . MODULO . SET_PROVEEDOR . '/',
        'GET' => '/mvc/' . MODULO . GET_PROVEEDOR . '/',
        'DELETE' => '/mvc/' . MODULO . DELETE_PROVEEDOR . '/',
        'EDIT' => '/mvc/' . MODULO . EDIT_PROVEEDOR . '/',
        'SEARCH' => '/mvc/' . MODULO . SEARCH_PROVEEDOR . '/'
    )
);

function get_template($form = 'get') {
    $file = '../site_media/html/proveedores/proveedor_' . $form . '.html';
    $template = file_get_contents($file);
    return $template;
}

function render_dinamic_data($html, $data) {
    foreach ($data as $clave => $valor) {
        $html = str_replace('{' . $clave . '}', $valor, $html);
    }
    return $html;
}

function print_rows($template,$arrayData){
    $temp=get_template($template);
    $html="";
    foreach($arrayData as $array){
        $html.=  render_dinamic_data($temp, $array);
    }
    return $html;
}


function retornar_vista($vista, $data = array()) {
    global $diccionario;
    $html = get_template('template');
    $html = str_replace('{subtitulo}', $diccionario['subtitle'][$vista], $html);
    $html = str_replace('{formulario}', get_template($vista), $html);
    $html = render_dinamic_data($html, $diccionario['form_actions']);
    $html = render_dinamic_data($html, $diccionario['links_menu']);
    $html = render_dinamic_data($html, $data);
    // render {mensaje}
    if (array_key_exists('nombre', $data) && array_key_exists('rfc', $data) && $vista == VIEW_EDIT_PROVEEDOR) {
        $mensaje = 'Editar proveedor ' . $data['nombre'] . ' - ' . $data['rfc'];
    } else {
        if (array_key_exists('mensaje', $data)) {
            $mensaje = $data['mensaje'];
        } else {
            $mensaje = 'Datos del proveedor';
        }
    }
    $html = str_replace('{mensaje}', $mensaje, $html);
    print $html;
}

?>
