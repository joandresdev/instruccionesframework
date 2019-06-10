<?php  
	// TIPOS ACEPTADOS GET Y POST
/**
 * Rutas Modulo 1 Ejemplo
 */
	$this->newRoute('welcome','welcome/welcomeController','welcomeBro');



/**
 * Rutas Modulo 2 Ejemplo
 */
	$this->newRoute('instrucciones','instruction/instructionController','instrucciones','GET');

/**
 * Rutas Modulo 3 Ejemplo
 */
	$this->newRoute('instrucciones','instruction/instructionController','mandarinstruccion','POST');
?>