<!DOCTYPE html>


<html lang="es">
    <head>
        <title>Validacion Formulario ajax</title>
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

        


        <div class="container" style="width: 58%; height: 600px">
            <h4 style="color: #999999; background-color: #ffffff; height: 50px; margin-bottom: 40px"><br>Introduzca la información que se solicita a continuación:</h4>
            <!-- Eliminamos action="guardar_contacto.php" para que se venga de vuelta -->
            <form class="form" id="myForm"  method = "post" enctype="multipart/form-data" style=" width: 300px">

                <div class="form-group">

                    <label for = "nombre">Nombre* :</label>
                    <input type = "text" name = "nombre" class = "form-control" id = "nombre" placeholder = "nombre del solicitante"
                           value = "<?php echo isset($_POST['nombre']) ? $_POST['nombre'] : '' ?>">
                    <b><span class="error nombre" style="color: red;"></span></b>
                </div>
                
                <div class="form-group">

                    <label for = "apellidos">Apellidos :</label>
                    <input type = "text" name = "apellidos" class = "form-control" id = "nombre" placeholder = "apellidos del solicitante"
                           value = "<?php echo isset($_POST['apellidos']) ? $_POST['apellidos'] : '' ?>">
                    
                </div>

                <div class = "form-group">
                    <br><label for = "telefono">Teléfono de contacto* :</label>
                    <input type = "text" name = "telefono" class = "form-control" id = "telefono" placeholder = "teléfono" size = "10" type="number" style = " width: 150px"
                           value = "<?php echo isset($_POST['telefono']) ? $_POST['telefono'] : '' ?>">
                </div>

                <div class = "form-group">
                    <br><label for = "email">Email corporativo* :</label>
                    <input type = "text" name = "email" class = "form-control" id = "email" placeholder = "email corporativo"  type="email"
                           value = "<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
                    <b><span class="error email" style="color: red;"></span></b>
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
                           background-color: #00ff66; box-shadow: 10px 5px 5px silver;  margin-left: 1px"><span  class="mensaje"></span>

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
        
        

        <script>
                        

            $(document).ready(function () {
                $('[type="submit"]').on('click', function (event) {

                    event.preventDefault();
                    
                        //Añadimos la imagen de carga en el contenedor
                        $('#loader').show();
                        //Ponemos toda la informacion del formulario en una cadena de caracteres
                        var formulario_serializado = $('form').serialize();
                        $('.error').empty();
                        $.ajax({

                            url: 'validacion_ajax.php',
                            method: 'POST',
                            data: formulario_serializado,
                            success: function (respuesta) {
                                $('#loader').hide();
                                
                                //Comprobamos si hay errores
                                if (typeof(respuesta) == 'object') { 
                                    
                                    $.each(respuesta, function(campo, mensaje_error) {
                                       $('.error.' + campo).text(mensaje_error);
                                    });
                                } else {
                                    
                                    $('.mensaje').text('Formulario enviado correctamente. Nos pondremos en contacto contigo. ');
                                };
                            }
                    });
                });
            });

        </script>




        <script>
            function myFunction() {
            document.getElementById("myForm").reset();
            }
        </script>
    </body>
</html>
