<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Estudiantes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php  
        include("conexion.php");
        $conn = new Connection();
        $cod_cur = $_POST['cod_cur'];
        $periodo = $_POST['periodo'];
        $year = $_POST['year'];
        echo"<center><p>Registro de Notas</p>";
        $date = getdate();
        echo"<p>".$date['mday']."/".$date['month']."/".$date['year']."</p>";
    
        $nomb_cur = $conn->get_nomb_cur($cod_cur);
        echo "curso: ".$nomb_cur."<br><br>";

        echo"<input type='button'  name='Agregar estudiante' value='crear estudiante' onclick=location.href='http://localhost/Notas%20Parciales/Models/AgregarEstudiante.php'><br>";
        

        $conn->verEstudiantes($cod_cur,$year,$periodo);

        
    ?>
    <h1><center><input type="button" onclick="location.href='http://localhost/Notas%20Parciales/Models/SelectCurso.php'" name="volver atrás" value="volver atrás"></h1>
    
</body>
</html>