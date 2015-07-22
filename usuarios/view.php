<?php
	$diccionario=array(
		'subtitle'=>array(
			VIEW_SET_USER=>'New user',
			VIEW_GET_USER=>'Search user',
			VIEW_DELETE_USER=>'Delete user',
			VIEW_EDIT_USER=>'Update user'
			),
		'links_menu'=>array(
			'VIEW_SET_USER'=>MODULO.VIEW_SET_USER.'/',
			'VIEW_GET_USER'=>MODULO.VIEW_GET_USER.'/',
			'VIEW_EDIT_USER'=>MODULO.VIEW_EDIT_USER.'/',
			'VIEW_DELETE_USER'=>MODULO.VIEW_DELETE_USER.'/'
			),
		'form_actions' =>array(
			'SET' => '/proy/'.MODULO.SET_USER.'/',
			'GET' => '/proy/'.MODULO.GET_USER.'/',
			'EDIT' => '/proy/'.MODULO.EDIT_USER.'/',
			'DELETE' => '/proy/'.MODULO.DELETE_USER.'/'
			)
		);

	function get_template($form="get"){
		$file='../site_media/html/usuario_'.$form.'.html';
		$template =file_get_contents($file);
		return $template;
	}

	function render_dinamic_data($html, $data){
		foreach ($data as $clave => $valor) {
			# code...
			$html =str_replace('{'.$clave.'}',$valor,$html);
		}
		return $html;
	}

	function retornar_vista($vista, $data=array()){
				global $diccionario;


		$html = get_template('template');
		$html = str_replace('{subtitulo}', $diccionario['subtitle'][$vista], $html);
		$html = str_replace('{formulario}', get_template($vista), $html);

		$html = render_dinamic_data($html, $diccionario['form_actions']);

		$html = render_dinamic_data($html, $diccionario['links_menu']);
		$html = render_dinamic_data($html, $data);



		//render mensaje
		if (array_key_exists('nombre', $data)&& array_key_exists('apellido', $data)&& $vista==VIEW_EDIT_USER) {

			# code...
			$mensaje = 'Editar usuario'.$data['nombre'].' '.$data['apellido'];
		}else{
			if (array_key_exists('mensaje', $data)) {
				# code...
				$mensaje = $data['mensaje'];
			}else{
				$mensaje ='Datos del Usuario';
			}
		}
		$html=str_replace('{mensaje}', $mensaje, $html);
		print $html;
	}

?>