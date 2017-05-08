<?php

        echo '<h3 style="color:red">1. Creamos un array indexado</h3>';

	$dias = array ('lunes' , 'martes' , 'miercoles'); 
	        
	var_dump($dias);	

        echo '<h3>incluimos el jueves con uno de los metodos</h3>';

        $dias [] = 'jueves';
        var_dump($dias);	

        
        echo '<h3>incluimos el viernes por el otro metodo</h3>';

        array_push ($dias, 'viernes');
        var_dump($dias);	

        echo '<h3 style="color:green">Mostramos los datos del array indexado con el foreach</h3>'; 

        foreach ($dias as $clave => $dia) {
        echo $clave. ' ' . $dia;
        echo'<br>';
        }

        
        echo '<h3>Si quiero ver el valor del indice 3:</h3>';
        var_dump($dias[3]);

        echo'<br>';
        echo'<br>';
        echo '<h3 style="color:red"; style="text-decoration:underline">2. Creamos un array asociativo</h3>';

        $edades = array ('Juan' => 34, 'Maria' => 28); 
        var_dump($edades);

        echo '<h3>incluimos Elena de 90 años con el único método que hay</h3>';
        $edades ['Elena'] = 90;
        var_dump($edades);	


        echo '<h3  style="color:green">Mostramos los datos del array asociativo con el foreach</h3>'; 
        foreach ($edades as $clave => $edad) {
        echo $clave. ' ' . $edad;
        echo'<br>';
        }

        echo '<h3>Si quiero ver el valor de Elena:</h3>';
        var_dump($edades['Elena']);

?>


