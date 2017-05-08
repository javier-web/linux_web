<!DOCTYPE html>


<html lang="es">
    <head>
        <title>Formulario_alumno</title>
        <link rel="stylesheet" href="estilos_formulario.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <meta charset="UTF-8">
        <meta name="description" content="Formulario_alumno">
        <meta name="keywords" content="Formulario_alumno"/>
        <meta name="author" content="JFR">
        
       

        
    </head>

    <body>
        <br>
        <h2 style="line-height: normal; color: white; background-color: #6699ff">Formulario de gestion de alumnos</h2>
        <br>
        
        
        <div class="container" style="width: 850px;">
            <h4 style="color: grey; height: 50px; margin-bottom: 40px"><br>Introduzca la informacion que se solicita a continuacion:</h4>
            <form class="form" id="myForm" action="nuevo_alumno.php" method = "post" enctype="multipart/form-data" style=" width: 300px">
                
                <div class="form-group">
    			<label for="nombre">Nombre del alumno:</label>
    			<input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre del alumno"></fieldset>
  		</div>

  		<div class="form-group">
    			<label for="apellidos">Apellidos:</label>
    			<input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Apellidos del alumno">
  		</div>

		<div class="form-group">
                        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
    			<input type="date" name="date"  class="form-control" id="fecha_nacimiento" placeholder="Fecha de nacimiento">
  		</div>

                <form action="curso_alumno.php" method = "post" enctype="multipart/form-data" style=" width: 300px">
                    <div>
                        <label for="curso">Curso: </label>
                    </div>
                
                    <?php


                        $conn = new mysqli("localhost" , "root" , "123456" , "colegio");

                        $sql = "SELECT * FROM curso";
	
                        $result = $conn->query($sql);
               
                        echo '<select name="curso">';
                            echo '<option value="" disable>Seleccionar</option>';
                            while ($fila = $result->fetch_assoc()) {
                            echo '<option value = "' . $fila['id'] . '">' . $fila['nombre'] . '</option>';
                        }
                        echo '</select>';

                        $conn->close();
	
                    ?>
                
                </form>

  		<div class="form" class="form-group">
    			<br><label for="nota">Nota media:</label>
    			<input type="date" name="nota"  class="form-control" id="nota" placeholder="Nota media" style=" width: 150px">
  		</div>

                <div class="form" class="form-group"><br>
    			<label for="foto">Fotografia:</label>
    			<input type="file" name="file" id="foto"><br>
                </div>
                <div class="form" style=" width: 240px; margin: 5px auto">
                <input  type="button" onclick="myFunction()" value="Borrar" style=" width: 80px; background-color: #ff9999; box-shadow: 10px 5px 5px silver ">
                
      		<input  type="submit" value="Enviar" name="submit" style=" width: 80px; background-color: #99ffcc; box-shadow: 10px 5px 5px silver;  margin-left: 15px">
                </div>
	</form>
            <br>
        </div>
        
        

        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="patron.js"></script>

        <script>
            function myFunction() {
                document.getElementById("myForm").reset();
                }
        </script>
        </body>
    </html>
