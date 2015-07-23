<?php

$diccionario = array(
    'subtitle' => array(
        VIEW_SET_ITEM => 'Crear un nuevo Articulo',
        VIEW_GET_ITEM => 'Buscar Articulo',
        VIEW_DELETE_ITEM => 'Eliminar Articulo',
        VIEW_EDIT_ITEM => 'Modificar Articulo'
    ),
    'links_menu' => array(
        'VIEW_SET_ITEM' => MODULO . VIEW_SET_ITEM . '/',
        'VIEW_GET_ITEM' => MODULO . VIEW_GET_ITEM . '/',
        'VIEW_EDIT_ITEM' => MODULO . VIEW_EDIT_ITEM . '/',
        'VIEW_DELETE_ITEM' => MODULO . VIEW_DELETE_ITEM . '/'
    ),
    'form_actions' => array(
        'SET' => '/mvc/' . MODULO . SET_ITEM . '/',
        'GET' => '/mvc/' . MODULO . GET_ITEM . '/',
        'DELETE' => '/mvc/' . MODULO . DELETE_ITEM . '/',
        'EDIT' => '/mvc/' . MODULO . EDIT_ITEM . '/'
    )
);

function get_template($form = 'get') {
    $file = '../site_media/html/articulos/articulos_' . $form . '.html';
    $template = file_get_contents($file);
    return $template;
}

function render_dinamic_data($html, $data) {
    foreach ($data as $clave => $valor) {
        $html = str_replace('{' . $clave . '}', $valor, $html);
    }
    return $html;
}

function create_options($arrayOptions,$selected=""){
    $html="";
    foreach($arrayOptions as $option){
        $sel="";
        if($option==$selected){
            $sel="selected";
        }
        $html.="<option $sel>$option</option>";
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
    if (array_key_exists('referencia', $data) && array_key_exists('categoria', $data) && $vista == VIEW_EDIT_ITEM) {
        $mensaje = 'Editar articulo ' . $data['referencia'] . ' ' . $data['categoria'];
    } else {
        if (array_key_exists('mensaje', $data)) {
            $mensaje = $data['mensaje'];
        } else {
            $mensaje = 'Datos del articulo:';
        }
    }
    $html = str_replace('{mensaje}', $mensaje, $html);
    print $html;
}

?>
