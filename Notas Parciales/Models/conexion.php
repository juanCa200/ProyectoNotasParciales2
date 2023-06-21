<?php
class Connection{

    public static function  ConnectionBD(){

        $host = "localhost";
        $dbname = "notas";
        $username = "postgres";
        $password = "postgres";
        

        try{
            $Connection = new PDO("pgsql:host = $host dbname= $dbname", $username, $password);
            return $Connection;
        }
        catch(Exception $error){
            die("La razon es: ".$error->getMessage());
        }
    }
    

    public function connect(){
        try{
            $objeto = new Connection();
            $Connection = $objeto->ConnectionBD();
            return $Connection;    
        }
        catch (PDOException $exception){
            return 'Error: ' . $exception->getMessage();
        }
    } 
        
    public function create_register($table_name){
            
    }

    public function read($table_name){

            $query = Connection::connect()->query("SELECT * FROM $table_name");
            
            // Se muestran los results en una tabla HTML
            echo '<table>';
            echo '<tr>';
            $columns = [];
            for ($i = 0; $i < $query->columnCount(); $i++){
        
                $meta = $query->getColumnMeta($i);
                $columns[] = $meta['name'];
                echo '<td>' . $meta['name'] . '</td>';
                
            }
            echo '</tr>';
            
            foreach ($query as $row) {
                echo '<tr>';
                foreach ($columns as $column) {
                    echo '<td>' . $row[$column] . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';

    }

    public function get_cursos(){
        
        $query = Connection::connect()->query("select * from cursos;");
        
        return $query;
    }
    


    public function verEstudiantes($cod_cur,$year,$periodo){

        $query = Connection::connect()->query("SELECT * FROM inscripciones where cod_cur = $cod_cur and year = $year and periodo = $periodo");
        
        // Se muestran los results en una tabla HTML
        echo '<table>';
        echo '<tr>';
        $columns = [];
        for ($i = 0; $i < $query->columnCount(); $i++){
    
            $meta = $query->getColumnMeta($i);
            $columns[] = $meta['name'];
            echo '<td>' . $meta['name'] . '</td>';
            
        }
        echo '</tr>';
        
        foreach ($query as $row) {
            echo '<tr>';
            foreach ($columns as $column) {
                echo '<td>' . $row[$column] . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }

    public function registrarEstudiante($cod_est,$cod_cur,$periodo,$year){
        
        try {
            $query = Connection::connect()->query("INSERT INTO inscripciones(periodo,year,cod_cur,cod_est) values ($periodo,$year,$cod_cur,$cod_est)");
            $result = Connection::connect()->prepare($query);
            $result->execute();
            echo"<p>Estudiante Agregado Correctamente</p>";
        }
        catch (PDOException $exception){
            return 'Error: ' . $exception->getMessage();
        }
    }

    
    
    public function update($table_name,$column_name,$old_value,$new_value){
        
        $query = "UPDATE $table_name SET $column_name = ('$new_value') WHERE $column_name = ('$old_value');";
        $result = Connection::connect()->prepare($query);
        $result->execute();
        Connection::read($table_name);
    }

    public function show_tables(){
        
        $query = Connection::connect()->query("select table_name from information_schema.tables where table_schema = 'public';");
            
        echo"<ul>Listado de Tablas<br>";

        foreach ($query as $row) {             
                echo '<li>' . $row[0] . '</li>';
        }
        echo '</ul>';
    }

    public function get_table_names(){
        
        $query = Connection::connect()->query("select table_name from information_schema.tables where table_schema = 'public';");
        
        return $query;
    }

    public function get_nomb_cur($cod_cur){
        
        $query = Connection::connect()->query("SELECT nomb_cur from cursos  where cod_cur = $cod_cur;");
        
        foreach($query as $row){
            $nomb_cur = $row[0];
        }

        return $nomb_cur;
    }


    public function delete($table_name,$column_name,$value){
    
        $query = "DELETE FROM $table_name WHERE $column_name = ('$value');";
        $result = Connection::connect()->prepare($query);
        $result->execute();
        Connection::read($table_name);
    }
}

?>
