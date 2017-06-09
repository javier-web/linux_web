<!DOCTYPE html>


<html lang="es">
    <head>
        <title>Validacion Formulario</title>
        <link rel="stylesheet" href="estilos_formulario.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <meta charset="utf-8"/>
        <meta name="description" content="Formulario_alumno">
        <meta name="keywords" content="Formulario_alumno"/>
        <meta name="author" content="JFR">

    </head>

    <body>

        <h2 style="line-height: normal; width: 100%; color: white; background-color: #6699ff">Formulario de gestión de empresas</h2>
        <br>

        <!--VALIDACION DE CAMPOS con saneado-->

        <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        /* --SANEADO-- */

            function saneado($valor) {
                $nuevoValor = trim($valor);
                $nuevoValor = htmlspecialchars($nuevoValor);
                return $nuevoValor;
            }
        
        
        /* En un principio no hay errores */
        $errores = false;

        $errorNombre = $errorEmail = '';
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
           
            
            if (empty($_POST['nombre'])) {
                $errorNombre = ' El nombre es obligatorio.';
                $errores = true;
            } else {
                $nombre = saneado($_POST['nombre']);
            }
            
            if (!empty($_POST['telefono'])) {
                $telefono = saneado($_POST['telefono']);
            }
            
            if (empty($_POST['email'])) {
                $errorEmail = ' El Email es obligatorio.';
                $errores = true;
            } else {
                $email = saneado($_POST['email']);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errorEmail = ' El formato de Email no es válido.';
                    $errores = true;
                }
            }

            if (!empty($_POST['web'])) {
                $telefono = saneado($_POST['web']);
            }

            

            $db = new PDO('mysql:host=localhost;dbname=localidad;charset=utf8', 'root', '123456');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            if ($errores == false) {
                $sql = "INSERT INTO contacto 
                    (nombre, telefono, email , web) 
                    VALUES  (?, ?, ?, ?)";

                try {
                    $st = $db->prepare($sql);
                    $st->execute(array($nombre, $telefono, $email, $web));
                    echo '<h4 style="text-align:center; color: black; background-color:#00ff66; height: 50px; margin-bottom: 40px"><br>Formulario enviado correctamente</h4>';
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                    
                }
            }
        }
        ?>


        <div class="container" style="width: 58%; height: 500px">
            <h4 style="color: #999999; background-color: #ffffff; height: 50px; margin-bottom: 40px"><br>Introduzca la información que se solicita a continuación:</h4>
            <!-- Eliminamos action="guardar_contacto.php" para que se venga de vuelta -->
            <form class="form" id="myForm"  method = "post" enctype="multipart/form-data" style=" width: 300px">

                <div class="form-group">

                    <label for = "nombre">Nombre* :</label><span style="color: red;"><?php echo $errorNombre ?></span>
                    <input type = "text" name = "nombre" class = "form-control" id = "nombre" placeholder = "Nombre del solicitante"
                           value = "<?php echo isset($_POST['nombre']) ? $_POST['nombre'] : '' ?>">
                </div>

                <div class = "form-group">
                    <br><label for = "telefono">Teléfono de contacto* :</label>
                    <input type = "text" name = "telefono" class = "form-control" id = "telefono" placeholder = "Teléfono" size = "10" style = " width: 150px"
                           value = "<?php echo isset($_POST['telefono']) ? $_POST['telefono'] : '' ?>">
                </div>

                <div class = "form-group">
                    <br><label for = "email">Email corporativo* :</label>
                    <input type = "text" name = "email" class = "form-control" id = "email" placeholder = "email de empresa" style = " width: 150px"
                           value = "<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
                    <span style="color: red;"><?php echo $errorEmail ?></span>
                </div><br>

                <div class = "form-group">
                    <label for = "web">Sitio web (Opcional):</label>
                    <input type = "text" name = "web" class = "form-control" id = "web" placeholder = "sitio web"
                           value = "<?php echo isset($_POST['web']) ? $_POST['web'] : '' ?>">
                </div><br>








                <div class = botones style = " width: 185px;">
                    <input type = "button" onclick = "myFunction()" value = "Borrar" style = " cursor: pointer; width: 80px; height: 30px;
                           background-color: #ff9999; box-shadow: 10px 5px 5px silver;  margin-bottom: 5px">



                    <input type = "submit" value = "Enviar" name = "submit" style = " cursor: pointer; width: 80px; height: 30px;
                           background-color: #00ff66; box-shadow: 10px 5px 5px silver;  margin-left: 1px">

                    <img src = "ajax-loader.gif" id = "loader" >

                    <!--<div class = "loader"></div>-->

                </div>
            </form>
        </div>





        <script src = "https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
        <script src="https://cdn.datatables.net/plug-ins/1.10.15/sorting/datetime-moment.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="patron.js"></script>

        <script>
                        /*
                         
                         $(document).ready(function () {
                         $('[type="submit"]').on('click', function (event) {
                         
                         event.preventDefault();
                         
                         //Añadimos la imagen de carga en el contenedor
                         $('#loader').show();
                         
                         var campo_nombre = $('#nombre').attr('name');
                         var valor_nombre = $('#nombre').val();
                         
                         var campo_telefono = $('#telefono').attr('name');
                         var valor_telefono = $('#telefono').val();
                         
                         var campo_email = $('#email').attr('name');
                         var valor_email = $('#email').val();
                         
                         var campo_web = $('#web').attr('name');
                         var valor_web = $('#web').val();
                         
                         
                         $.ajax({
                         
                         url: 'guardar_contacto.php',
                         method: 'POST',
                         data: {nombre: valor_nombre,
                         telefono: valor_telefono,
                         email: valor_email,
                         web: valor_web
                         },
                         success: function (respuesta) {
                         $('#loader').hide();
                         alert("Formulario enviado");
                         },
                         error: function (respuesta) {
                         alert("Formulario erroneo");
                         }
                         });
                         
                         });
                         });
                         */
        </script>




        <script>
            function myFunction() {
                document.getElementById("myForm").reset();
            }
        </script>
    </body>
</html>
