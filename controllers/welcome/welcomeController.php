<?php  
/**
 * 
 */
class WelcomeController extends Controller
{	
	public function __construct(){
		// Intanciar siempre el constructor
		parent::__construct();
		// Inicializar siempre esto
		$this->modeln    = "SIN_MODEL";
		$this->path      = "SIN_MODEL";
		$this->routeView = "welcome/welcome";
			
	}

	public function render(){
		$this->view->render($this->routeView);
	}
	#DE AQUI PARA ARRIBA DEBE IR TODO
	public function welcomeBro(){
		$this->render();
	}

}
?>