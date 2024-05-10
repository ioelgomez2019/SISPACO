<?php 

class Cuadronesesidad extends Controllers{
	public function __construct()
	{
		parent::__construct();
		session_start();
		session_regenerate_id(true);
		if(empty($_SESSION['login']))
		{
			header('Location: '.base_url().'/login');
		}
		getPermisos(3);
	}

	public function Cuadronesesidad()
	{
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location:".base_url().'/dashboard');
		}
		$data['page_tag'] = "Cuadronesesidad";
		$data['page_title'] = "Cuadro nesesidad <small>Tienda PACO</small>";
		$data['page_name'] = "cuadronesesidad";
		$data['page_functions_js'] = "functions_cuadronesesidades.js";
		$this->views->getView($this,"Cuadronesesidad",$data);
	}

	}
 ?>