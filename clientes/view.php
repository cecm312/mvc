<?php

//Alejandro Perez Sanchez
//Salvador Cach
//Amos Villareal.
$diccionario = array(
    'subtitle' => array(
        VIEW_SET_CLIENT => 'New client',
        VIEW_GET_CLIENT => 'Search client',
        VIEW_DELETE_CLIENT => 'Delete client',
        VIEW_EDIT_CLIENT => 'Update client'
    ),
    'links_menu' => array(
        'VIEW_SET_CLIENT' => MODULO . VIEW_SET_CLIENT . '/',
        'VIEW_GET_CLIENT' => MODULO . VIEW_GET_CLIENT . '/',
        'VIEW_EDIT_CLIENT' => MODULO . VIEW_EDIT_CLIENT . '/',
        'VIEW_DELETE_CLIENT' => MODULO . VIEW_DELETE_CLIENT . '/'
    ),
    'form_actions' => array(
        'SET' => '/proy/' . MODULO . SET_CLIENT . '/',
        'GET' => '/proy/' . MODULO . GET_CLIENT . '/',
        'EDIT' => '/proy/' . MODULO . EDIT_CLIENT . '/',
        'DELETE' => '/proy/' . MODULO . DELETE_CLIENT . '/'
    )
);

function get_template($form = "get") {
    $file = '../site_media/html/clientes/cliente_' . $form . '.html';
    $template = file_get_contents($file);
    return $template;
}

function render_dinamic_data($html, $data) {
    foreach ($data as $clave => $valor) {
        # code...
        $html = str_replace('{' . $clave . '}', $valor, $html);
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



    //render mensaje
    if (array_key_exists('nombre', $data) && array_key_exists('apellido', $data) && $vista == VIEW_EDIT_CLIENT) {

        # code...
        $mensaje = 'Editar cliente' . $data['nombre'] . ' ' . $data['apellido'];
    } else {
        if (array_key_exists('mensaje', $data)) {
            # code...
            $mensaje = $data['mensaje'];
        } else {
            $mensaje = 'Datos del cliente';
        }
    }
    $html = str_replace('{mensaje}', $mensaje, $html);
    print $html;
}

?>