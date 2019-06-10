<?php  
/**
 * 
 */

require 'models/entities/instrucciones.php';
class InstruccionModel extends Model
{
	
	function __construct(){
		parent::__construct();
		// es para tener como referencia pero puedes consultar varias tablas desde tu query
		$this->table = 'instrucciones';
	}

	public function getInstructions(){
		$items = [];
		try{
			
			$query = $this->DB->MYSQLconnect()->query("SELECT * FROM ".$this->table);
			// var_dump($query);
			while($row = $query->fetch()){
				$item         = new Instrucciones();
				$item->id     = $row['id'];
				$item->titulo = $row['titulo'];
				$item->texto  = $row['texto'];
			

				array_push($items,$item);

			}
			// $this->DB = null;
			return $items;

		}catch(PDOException $e){
			echo "<br> error ".$e." <br>";
			return null;
		}
	}

	public function storeInstructions($titulo = "prueba1",$texto ="test1"){
		$items = [];
		try{
			
			$sql = "INSERT INTO ".$this->table." (titulo, texto) VALUES (:titulo, :texto)";
			$query = $this->DB->MYSQLconnect()->prepare($sql);
			
			$data = [
				':titulo' => $titulo,
				':texto'  => $texto,
			];
			
			$query->execute($data);
			
			// $this->DB = null;
			return true;

		}catch(PDOException $e){
			echo "<br> error ".$e." <br>";
			return false;
		}
	}

	// éste modelo no tiene nada que ver con esta tabla
	// pero solo es de jemplo
	public function getAlumno($matricu)
	{
		// valido que no este vacia la marticula y que sean puros numeros
		$aux = "";
		$con = $this->DB->DBFconnect('DALUMN');
		if ($con) {
			$numero_registros = dbase_numrecords($con);
			echo "total : ".$numero_registros;
          for ($i = 1; $i <= $numero_registros; $i++) {

              $fila = dbase_get_record_with_names($con, $i);
               
              if (strcmp($fila["ALUCTR"],$matricu) == 0) {
              		$aux = $fila;
              		break;
              }
              
              
          }
          dbase_close($con);
          return $aux;
		}
		return null;
	}


}
?>