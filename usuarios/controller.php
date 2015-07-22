<?php
require_once('constants.php');
require_once('model_user.php');
require_once('view.php');

function handler(){
	$event = VIEW_GET_USER;
	$uri=$_SERVER['REQUEST_URI']; //devuelve la url que se esta ejecutando relativa a la raiz del dominio
	$peticiones = array(SET_USER, GET_USER, DELETE_USER, EDIT_USER, VIEW_SET_USER, VIEW_GET_USER, VIEW_DELETE_USER, VIEW_EDIT_USER);

	foreach ($peticiones as $peticion) {
		# code...
		$uri_peticion = MODULO.$peticion.'/';
		//Stropos() devuelve la posicion del primer caracter de la palabra que estamos buscando
		if(strpos($uri, $uri_peticion)==true){
			$event = $peticion;
		}
	}

	$user_data=helper_user_data();
	$usuario = set_obj();

	switch ($event) {
		case SET_USER:
			# code...
		
			$usuario->set($user_data);
			$data = array('mensaje'=>$usuario->mensaje);
			retornar_vista(VIEW_SET_USER, $data);
			break;
		case GET_USER:
					# code...
			$usuario->get($user_data);
			$data =array('nombre'=>$usuario->Nombre,'rfc'=>$usuario->RFC,'direccion'=>$usuario->Direccion,
				'localidad'=>$usuario->Localidad,'provincia'=>$usuario->Provincia,'formaPago'=>$usuario->Forma_de_pago,
				'entidadBancaria'=>$usuario->Entidad_bancaria,'cuentaBancaria'=>$usuario->Cuenta_bancaria,'codigoPostal'=>$usuario->Codigo_postal,
				'telefono'=>$usuario->Telefono,'movil'=>$usuario->Movil,'email'=>$usuario->Correo,'web'=>$usuario->Direccion_web);

			retornar_vista(VIEW_EDIT_USER, $data);
			break;
		case DELETE_USER:
		
			# code...
			$usuario->delete($user_data['email']);
			$data =array('mensaje'=>$usuario->mensaje);
			retornar_vista(VIEW_DELETE_USER, $data);
			break;
		case EDIT_USER:
		
			# code...
			$usuario->edit($user_data);
			$data = array('mensaje'=>$usuario->mensaje);
			retornar_vista(VIEW_GET_USER,$data);
			break;
		
		default:
		

			retornar_vista($event);
	
	}
}

function set_obj(){
	$obj = new User();
	return $obj;
}

function helper_user_data(){
	$user_data =array();
	if ($_POST) {
		# code...
		if (array_key_exists('nombre', $_POST)) {//Verifica si el indice o clave dada existe.
			# code...
			$user_data['nombre'] = $_POST['nombre'];
		}
		if (array_key_exists('rfc', $_POST)) {//Verifica si el indice o clave dada existe.
			# code...
			$user_data['rfc'] = $_POST['rfc'];
		}
		if (array_key_exists('direccion', $_POST)) {//Verifica si el indice o clave dada existe.
			# code...
			$user_data['direccion'] = $_POST['direccion'];
		}
		if (array_key_exists('localidad', $_POST)) {//Verifica si el indice o clave dada existe.
			# code...
			$user_data['localidad'] = $_POST['localidad'];
		}
		if (array_key_exists('provincia', $_POST)) {//Verifica si el indice o clave dada existe.
			# code...
			$user_data['provincia'] = $_POST['provincia'];
		}
		if (array_key_exists('formaPago', $_POST)) {//Verifica si el indice o clave dada existe.
			# code...
			$user_data['formaPago'] = $_POST['formaPago'];
		}
		if (array_key_exists('entidadBancaria', $_POST)) {//Verifica si el indice o clave dada existe.
			# code...
			$user_data['entidadBancaria'] = $_POST['entidadBancaria'];
		}
		if (array_key_exists('cuentaBancaria', $_POST)) {//Verifica si el indice o clave dada existe.
			# code...
			$user_data['cuentaBancaria'] = $_POST['cuentaBancaria'];
		}
		if (array_key_exists('codigoPostal', $_POST)) {//Verifica si el indice o clave dada existe.
			# code...
			$user_data['codigoPostal'] = $_POST['codigoPostal'];
		}
		if (array_key_exists('telefono', $_POST)) {//Verifica si el indice o clave dada existe.
			# code...
			$user_data['telefono'] = $_POST['telefono'];
		}
		if (array_key_exists('movil', $_POST)) {//Verifica si el indice o clave dada existe.
			# code...
			$user_data['movil'] = $_POST['movil'];
		}
		if (array_key_exists('cuentaBancaria', $_POST)) {//Verifica si el indice o clave dada existe.
			# code...
			$user_data['cuentaBancaria'] = $_POST['cuentaBancaria'];
		}
		if (array_key_exists('email', $_POST)) {//Verifica si el indice o clave dada existe.
			# code...
			$user_data['email'] = $_POST['email'];
		}
		if (array_key_exists('web', $_POST)) {//Verifica si el indice o clave dada existe.
			# code...
			$user_data['web'] = $_POST['web'];
		}
	}else if ($_GET) {
		# code...
		if (array_key_exists('email', $_GET)) {//Verifica si el indice o clave dada existe.
			# code...
			$user_data = $_GET['email'];
		}
	}
	return $user_data;
}
handler();

?>