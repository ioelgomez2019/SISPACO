<?php 

class Pedidos extends Controllers{
	public function __construct()
	{
		parent::__construct();
		session_start();
		session_regenerate_id(true);
		if(empty($_SESSION['login']))
		{
			header('Location: '.base_url().'/login');
		}
		getPermisos(5);
	}

	public function Pedidos()
	{
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location:".base_url().'/dashboard');
		}
		$data['page_tag'] = "Pedidos";
		$data['page_title'] = "Pedidos <small>Tienda PACO</small>";
		$data['page_name'] = "pedidos";
		$data['page_functions_js'] = "functions_cuadronesesidades.js";
		$this->views->getView($this,"Pedidos",$data);
	}

	}
 ?>