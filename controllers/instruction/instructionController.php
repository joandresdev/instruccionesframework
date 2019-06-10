<?php  
/**
 * 
 */
require 'controllers/helpers/ejemplo.php';

class InstructionController extends Controller
{
	
	public function __construct(){
		// Intanciar siempre el constructor
		parent::__construct();
		# Inicializar siempre esto
		
		//el Model de InstruccionModel se agrega solo
		// por eso es importante siempre nombrar tu modelo como MimodeloModel
		$this->modeln    = "Instruccion"; 
		//   dentro de la carpeta instruccion en models
		$this->path      = "instruccion";
		//ruta de la vista dentro de views
		$this->routeView = "instrucciones/instruction";
			
	}

	public function render(){
		$this->view->render($this->routeView);
	}

	public function instrucciones(){
		$instrucciones = $this->model->getInstructions();
		// VALIDAS QUE NO SEA NULL SINO MANDAR UN Error (renderizas vista de error)
		// creo una variable para la vista
		$this->view->instruccionesV = $instrucciones;

		// pregunta si me mandan algo
		if (isset($_GET['alumno'])) {
			$alumno = unserialize($_GET['alumno']);

			$this->view->alumno = $alumno;
		}
		$this->render();
	}

	public function mandarinstruccion()
	{
		
		if (isset($_POST['titulo']) && isset($_POST['texto'])) {
			// Si existe aqui debes validar que sean del tipo que esperas
			// para evitar posibles ataques
			$ej = new Ejemplo();

			echo "<br> Se recibió titulo: ".$_POST['titulo'];
			echo "<br> Se recibió texto: " .$_POST['texto'];


			if ($this->model->storeInstructions($_POST['titulo'],$_POST['texto'])) {
				echo "agregado";
				
				// redirecciones a instrucciones (GET) PORQUE instrucciones POST es este metodo
				// o puedes retornar la misma vista(solo que si la vista recibe parametros debes asegurarte
				// de mandarselos)
				// 
				$alumno = $this->model->getAlumno('201600113');
				$alumno = [
					"nombre" 	=> $alumno["ALUNOM"],
					"apellidos" => $alumno["ALUAPP"]." ".$alumno["ALUAPM"],
					"matricula" => $alumno["ALUCTR"],
				];
				// var_dump($alumno);
				$alumno = serialize($alumno);
				$this->localRedirect('instrucciones?alumno='.$alumno);
			}

			// mandas un error que no se pudo


		}

		// AQUI REDIRECCIONAS O MANDAS UN ERROR
	}


}
?>