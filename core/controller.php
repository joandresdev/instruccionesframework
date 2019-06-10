<?php  
/**
 * 
 */
class Controller 
{
	public  $modeln   = "SIN_MODEL";		
	public  $path     = "SIN_MODEL";				
	public $routeView = "SIN_ROUTE_VIEW";

	public function __construct()
	{
		// echo "<br> Controller extended <br>";
		$this->view =  new View();
	}

	public function loadModel($path,$model){
        // echo $model;
        $url = 'models/'.$path."/".$model.'Model.php';
        // echo "<br> Cargando $url <br>";
        if(file_exists($url)){
            // echo $url;
            require $url;
            // echo "<br> Cargado <br>";
            $modelName = $model.'Model';

            // esta variable model es la que usaremos
            $this->model = new $modelName();
        }
    }

    public function localRedirect($link){
        header("Location: ".constant('URL').$link);
    }

    public function externRedirect($link){
        header("Location: ".$link);
    }
	
}
?>