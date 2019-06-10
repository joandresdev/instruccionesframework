<?php  
/**
 * 
 */
class AuthController extends Controller
{
	
	function __construct()
	{
		// Intanciar siempre el constructor
		parent::__construct();
		// Inicializar siempre esto
		$this->modeln    = "SIN_MODEL";
		$this->path      = "SIN_MODEL";
		$this->routeView = "LOGIN";
	}

	public function render(){
		$this->view->render($this->routeView);
	}
	public function unmetodo(){
		echo "<br>Este es un metodo<br>";
	}
}
?>