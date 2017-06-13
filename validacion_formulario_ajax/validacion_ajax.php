        
        <?php
        
        /* --SANEADO-- */

        function saneado($valor) {
            $nuevoValor = trim($valor);
            $nuevoValor = htmlspecialchars($nuevoValor);
            return $nuevoValor;
        }
        
        
        $errorNombre = $errorEmail = '';
        
        $errores = array();
        
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (empty($_POST['nombre'])) {
                $errores['nombre'] = "El nombre es obligatorio.";
            } else {
                $nombre = saneado($_POST['nombre']);
            }
            
            $apellidos = saneado($_POST['apellidos']);
            
            if (!empty($_POST['telefono'])) {
                $telefono = saneado($_POST['telefono']);
            }
            
            if (empty($_POST['email'])) {
                $errores['email'] = "El email es obligatorio.";
            } else {
                $email = saneado($_POST['email']);
            }
            
            $web = saneado($_POST['web']);
            
        }
        
        
        
        
        if (empty($errores)) {
        
                
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);


        $db = new PDO('mysql:host=localhost;dbname=localidad;charset=utf8', 'root', '123456');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       
        
    
            $sql = "INSERT INTO contacto (nombre, apellidos, telefono, email, web)
                VALUES  (? , ? , ? , ? , ?)";
        
            try {
                $st = $db->prepare($sql);
                $st->execute(array($nombre, $apellidos, $telefono, $email, $web));
                   
            } catch (PDOException $e) {
                //http_response_code(500);
                echo $e->getMessage();
                return false;
            }
            
            
        } else {
            
            header('Content-Type: applcation/json');
            echo json_encode ($errores);
        }
        
        
        ?>

        