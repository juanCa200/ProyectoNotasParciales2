<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Table</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php  
        include("conexion.php");
        $conn = new Connection();
        echo"<p>Registro de Notas</p>";
        
        echo"<form action='CRUD.php' method='POST'><center>";   
            echo"<p>Seleccione una tabla </p>";
            echo"<select name='table_name'>";
            $tables = $conn->get_table_names();
                foreach($tables as $row){
                    echo"<option value='".$row[0]."'>".$row[0]."</option>";
                }
                echo"</select><br>";
                echo"<p>What do u want to do?</p>";
                echo"<select name='action'>";    
                    echo"<option value='create'>Create</option>";
                    echo"<option value='read'>Read</option>";
                    echo"<option value='update'>Update</option>";
                    echo"<option value='delete'>Delete</option>";
                echo"</select><br><br>";
            echo"<input type='submit' value='Enviar'>";
        echo"</form></center>";
        
    ?>
    

</body>
</html>