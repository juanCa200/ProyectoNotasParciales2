<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Base de Datos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php  
        include("conexion.php");    
        $conn = new Connection();
        $table_name = $_POST['table_name'];
        if($_POST['action'] == 'create'){

            $query = $conn->connect()->query("select * from $table_name");
            #$query = $conn->connect()->query("SELECT column_name, data_type FROM information_schema.columns WHERE table_name = '$table_name'");

            echo"<form action='procesar.php' method='post'>";
            
            for ($i = 1; $i < $query->columnCount(); $i++){
        
                $meta = $query->getColumnMeta($i);
                echo"<label for='".$meta['name']."'>".$meta['name'].":</label>";
                echo"<input type='text' id='".$meta['name']."' name='".$meta['name']."' placeholder = '".$meta['name']."'/>";
                
            }
            
            echo"<input type='submit' value='Enviar'>";

            #falta el query para introducir los datos a la database 

            echo"</form>";
            

            #aca pedir a postgres un array con todas la columnas de la tabla, y pedir cada dato de la columna y hacer el query

        }
        elseif ($_POST['action'] == 'update') {
            
        }
        elseif ($_POST['action'] == 'delete') {
            
        }
        else {
            $conn->read($table_name);
        }
    ?>
    <h1><center><input type="button" onclick="location.href='http://localhost/Notas%20Parciales/Models/SelectTable.php'" name="volver atrás" value="volver atrás"></h1>
    
</body>
</html>