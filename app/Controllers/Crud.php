<?php namespace App\Controllers;
use App\Models\Crudmodel;
class Crud extends BaseController
{
	public function index()
	{
		$Crud =new Crudmodel();
		$datos=$Crud->listarnombres();

		$mensaje =session('mensaje');
		$data =[
			"datos"=>$datos,
			"mensaje"=>$mensaje
		];
		return view('listado', $data);
	}


	public function crear(){
		
$datos = [
	
	"nombre" => $_POST['nombre'],
	"paterno"=> $_POST['paterno'],
	"materno"=> $_POST['materno']

];

$Crud =new Crudmodel();
$respuesta = $Crud->insertar($datos);
if ($respuesta >0){
return redirect()->to(base_url().'/')->with('mensaje','1');
}else{
	return redirect()->to(base_url().'/')->with('mensaje','0');

}
	}

	public function eliminar($idnombre){

		$Crud =new Crudmodel();
$data =[ "id_nombre"=>$idnombre];
$respuesta=$Crud->eliminar($data);

if($respuesta){

	return redirect()->to(base_url().'/')->with('mensaje', '4');
}else{
	return redirect()->to(base_url().'/')->with('mensaje', '5');

}

	}

	public function actualizar(){


		$datos = [
			"id_nombre" => $_POST['idnombre'],

			"nombre" => $_POST['nombre'],
			"paterno"=> $_POST['paterno'],
			"materno"=> $_POST['materno']
		
		];
        $idnombre =$_POST['idnombre'];
		$Crud =new Crudmodel();
		$respuesta =$Crud->actualizar($datos, $idnombre);
		if ($respuesta){
			return redirect()->to(base_url().'/')->with('mensaje','2');
			}else{
				return redirect()->to(base_url().'/')->with('mensaje','3');
			
			}

	}

	public function obtenerdatos($id_nombre){

		$data=["id_nombre"=> $id_nombre];

		$Crud =new Crudmodel();
		$respuesta= $Crud->obtenerdatos($data);
		$datos =["datos"=>$respuesta];
		return view('actualizar', $datos);
	}

			




	
	//--------------------------------------------------------------------

}
