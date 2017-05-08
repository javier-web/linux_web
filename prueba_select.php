<!DOCTYPE html>
<html lang="es">
<head>	
    <title>Select Provincias</title>

    <h3>Ejercicio de select en base de datos en php</h3>
    <h4>Mostramos un select para acceder a la tabla provincia que tenemos en mySQL</h4>
	

</head>
<body>

<?php

	

	//echo "Conexion a la base de datos";
	
	$conn = new mysqli("localhost" , "root" , "123456" , "colegio");

	$sql = "SELECT * FROM provincia";
	
        $result = $conn->query($sql);



	echo 'Formulario para el select: ';
	
	
	echo '<h3>Seleccione una provincia</h3>';

 	echo '<form action = "select.php" method = "post" enctype="multipart/form-data" style=" width: 300px">';
            echo '<div class="form-group">';
    		echo '<label for="nombre">Provincia: </label>';
            echo '</div>';


        //echo "Codigo php del select";

        echo '<select name="provincia" >';
        while ($fila = $result -> fetch_assoc()) {
            echo '<option value = "' . $fila['id'] . '">' . $fila['nombre'] . '</option>';
            }
        echo '</select>';

        echo '<input type="submit" value="Enviar">';
        echo '</form>';

        

        $conn->close();


?>
