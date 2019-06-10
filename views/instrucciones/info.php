<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SEE - Instrucciones</title>
	<style type="text/css">
		code{
			color: blue;
		}
		.nota{
			color: orange;
		}
	</style>
</head>
<body>
	
<!-- pon esto de un color llamativo -->
<?php if (isset($this->alumno)): ?>
	<h1>Aqui tarigo un dato via GET (no es recomendable de esta forma) solo lo hice como ejemplo</h1>
	
	<ul>
		<li>Nombre: <?php echo $this->alumno['nombre'] ?></li>
		<li>Apellidos: <?php echo $this->alumno['apellidos'] ?></li>
		<li>Matricula: <?php echo $this->alumno['matricula'] ?></li>
	</ul>
<?php endif ?>

			<h1>Instrucciones</h1>

<!-- START RENDER DE INSTRUCCIONES -->
<?php  if (isset($this->instruccionesV)): ?>

	<?php foreach ($this->instruccionesV as $instru): ?>
		
			<h3><?php echo $instru->titulo ?></h3>
				<p><?php echo $instru->texto ?></p>

	<?php endforeach ?>


<?php else: ?>
			<p>Aun no tienes echa la configuracion correctamente :c</p>
<?php endif; ?>
<!-- END RENDER INSTRUCCIONES -->

	

<h3>Primero pasos</h3>
	<p>Este proyecto debe estar dentro de tu carpeta de htdocs o www si usas wamp</p>

	<p>Debes de hacer la configuracion para que puedas leer DBFs, de lo contrario algunos modulos podrán mandarte un error <a href="https://cassianinet.blogspot.com/2014/01/php-y-los-archivos-dbase-dbf.html">Aqui hay un ejemplo</a></p>

<h3>Configuracion</h3>
	<p>En la carpeta database encontrarás un archivo .sql, deberás importarlo a tu MYSQL, el nombre de la base de datos es y será <b style="font-size: 2rem;">'see'</b> así que asi deberás llamarla e importar todo lo que está dentro del archivo</p>

	<p>Después deberás cambiar tu configuracion en <b>config/config.php</b></p>
	<ul>
		<li><b>URL:</b> Es el path de tru proyecto <b>http://localhost:8080/SEE/</b> en mi caso, si no cambiaste de puerto lo quitas y solo dejas localhost/_tupath</li>
		<li><b>HOST:</b> Es localhost</li>
		<li><b>DB:</b> Siempre será see</li>
		<li> Los demás datos los cambias de acuerdo a tus credenciales, <b>CHARSET</b> lo dejas como utf8mb4</li>
	</ul>

<h3>Los controladores</h3>

	<p>Los controladores son clases que darán funcionalidad a nuestro sistema</p>

	<p>Dentro de la carpeta controlers estan los controladores, para crear uno simplemente crear una nueva carpeta con el modulo que vayas a hacer <b>SIEMPRE Y CUANDO NO EXISTA YA</b> por ejemplo alumno y dentro de la carpeta alumno que esta dentro de controllers <code>controllers/alumno</code> creas un nuevo archivo por ejmeplo kardexController.php <b>Es importante siempre agregar Controller al nombre de tu archivo</b> </p>

	<p>Despues crear la clase en el archivo con la inicial mayuscula, si tu controlador se llama kardexController.php tu clase se llamará <b>KardexController</b> y <b>deberás extender de Controller</b>, ojo con las mayúsculas</p>

	<p><b>Siempre deberás tener un constructor donde siempre instancies el constructor de controller e instancias unas variables que son necesarias para que funcione todo:</b></p>

			<p><code>public function __construct(){</code></p>
			<p><code>&nbsp&nbsp&nbsp parent::__construct();</code> &nbsp&nbsp&nbsp-> instancia la el constructor de Controller</p>
			<p><code>&nbsp&nbsp&nbsp $this->modeln    = "Instruccion";</code>&nbsp&nbsp&nbsp-> Nombre del modelo, si no tienes lo dejas vacio pero nunca null, siempre se inicializa</p>
			<p><code>&nbsp&nbsp&nbsp $this->path      = "instruccion";</code>&nbsp&nbsp&nbsp-> path del modelo, es decir dentro de que carpeta de models, si no tienes solo lo inicializas</p>
			<p><code>&nbsp&nbsp&nbsp $this->routeView = "instrucciones/instruction";</code>&nbsp&nbsp&nbsp-> vista default que vas arenderizar, aun que realmente puedes acceder directo al metodo render de view para poder renderizar varias vistas diferentes, si tu ruta tiene este directorio <code>views/instrucciones/instruction.php</code> pondrás el path como se muestra</p>
			<p><code>}</code></p>

	<p class="nota">* Si necesitas un controlador que solo contenga funciones que no tengan nada que ver con la funcionalidad es decir, una clase con metodos para formatear fechas, una clase para validar mis datos etc, la cread dentro de <b>helpers</b> y la importas dentro de tu controlador para que uses esos métodos, <b>no mezclar clases que son de ayuda con controladores</b></p>

<h3>Los modelos</h3>

	<p>Los modelos en este framework nos serviran para hacer consulta a la base de datos tanto de MYSQL COMO LOS DBFs lo ideal es que tanto los contoladores como los modelos lleven nombres similares pero no hay ningun problema si no lo tienen</p>

	<p>Para crear tu modelo, creas una carpeta dentro de models (verificar siempre que no este creada) y le pones el nombre agregando la palabra <b>Model</b> por ejemplo: <code>InstruccionModel.php</code> y la clase la creas como InstruccionModel que extienda de Model <code>InstruccionModel extens Model</code></p>

	<p>Siempre deberás crear el contructor e inicializar e instanciar :</p>
	<ul>
		<li><code>parent::__construct();</code></li>
		<li><code>$this->table = 'instrucciones';</code>&nbsp&nbsp&nbsp -> Es el nombre de la tabla a la que hará referencia como base, pero cuando hagas tus consultas puedes utilizar lo que quieras</li>
	</ul>

	<p>Dentro de models hay una carpeta <b>entities</b> ahí pondras tus clases entidades por ejemplo si tengo un modelo AlumnoModel y quiero traer un alumno y devolverlo como un objeto, debo crear una clase Alumno con sus atributos nombre, apellido, etc. Instanciarlo, asignarle valores y retornarlo para que funcione como un objeto</p>

	<p>Ya tienes muestras de como hacer un modelo desde el primer framework de todos modos si no lo tienes claro aqui en este hay ejemplos, el apartado de El Framework y ¿Donde hago mis pruebas? son datos obtenidos de la ddbb</p>

<h3>Las vistas</h3>

	<p>Las vistas van dentro de la carpeta views, crear tus carpetas, tus archivos y les pones un nombre con la extension .php y todos tus estilos y js estan dentro de public con la estructura que la lider de front creo</p>

<h2>Rutas</h2>

	<p>Si ya tienes tu modelo y tus controladores y tus vistas ahora ¿como los utilizas?</p>
	<p>Dentro de la carpeta routes hay un archivo que se llama routes.php ahí tu agregaras tus rutas para que puedas acceder a tu controlador y a tus vistas</p>

	<p>Las rutas se separaran por comentarios con modulos es decir rutas para modulo de alumno por ejemplo y crearas ahi las rutas</p>
	<p>sintaxis1: <code>$this->newRoute('welcome','welcome/welcomeController','welcomeBro');</code></p>
	<p>sintaxis2: <code>$this->newRoute('welcome','welcome/welcomeController','otroMetodo','POST');</code></p>
	<ul>
		<li><b>1er parametro:</b> es como accedere, es decir la ruta de la url es decir si yo entro a www.see.edu/<code>rutadecomoquieroacceder</code> debes usar nombres relacionados con tus metodos, acciones y modulos, es decir no pongas <code>www.see.edu/eliminaralumno</code> cuando quieres redireccionar a un controlador para crear uno, este parametro se conoce como <code>slug</code></li>
		<li><b>2do parametro:</b> ruta del archivo, dentro de la carpeta controller ¿donde esta? si yo tengo mi controlador dentro de controllers/<code>welcome/welcomeController.php</code> entonces la ruta queda <code>welcome/welcomeController</code></li>
		<li><b>3er parametro:</b> Es el metodo el cual quieres ejecutar (de tu controlador)</li>
		<li><b>4to parametro:</b> es el tipo de peticion, GET O POST, puedes poner el mismo <code>slug</code> pero con diferente tipo de peticion (con diferente metodo tambien) y sabrá diferenciar la ruta, pero no puedes duplicar rutas que tengan el mismo slug y mismo tipo de peticion y metodo, si no mandas el parametro por default es GET</li>
	</ul>


	<p class="nota">Es importante que las rutas se definan desde antes para que varias personas no modifiquen el mismo archivo y haya problemas, solo los lideres lo modificaran y si quieres hacer un cambio debes avisarle y el lo hará, de todos modos para eso tienes el framework de prueba</p>
	
<h3>Observaciones</h3>
	<p class="nota">No modifique nada del core y de los archivos importantes como el index.php ni el .htaccess, debes hacer primero cambiso en tu framework de pruebas y verificar que no pase nada, hablar con los lideres y despues que te den luz verde se hace el cambio (por el creador del framework)</p>

	<p class="nota">Si se van a instalar algunas librerias avisar antes porque una cosa que muevas y subas afectare el trabajo de los demás si llega a mandar algun error</p>


	
<h1>Ejemplo de peticion POST y rutas</h1>

<form class="" method="POST" action="<?php echo constant('URL'); ?>instrucciones">
	<input type="text" name="titulo" placeholder="titulo de prueba" required>
	<input type="text" name="texto" placeholder="texto" required>
	<button>Enviar datos de prueba a slug instrucciones pero por POST</button>
</form>



</body>
</html>