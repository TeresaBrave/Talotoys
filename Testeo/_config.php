<?php
//Funcion para conectar a la base de datos y hacer una consulta
// conectaBaseDatos("canciones");
// conectaBaseDatos("artistas");
function conectaBaseDatos($tabla,$id = null){

    //1.Conexion Base de Datos
    $conn = mysqli_connect('localhost', 'root', 'root', 'musica');

    //2.Comprobar que la conexion se ha realizado correctamente
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
    //3. Realizar una consulta a la base de datos
        if($id){
            $sql = "SELECT * FROM $tabla WHERE id = $id";
        }

        else{
        $sql = "SELECT * FROM $tabla";  
        }

      $result = mysqli_query($conn, $sql);
    //4.Mostramos los datos de la consulta
      if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
              
            if( $id){
                switch($tabla){
                    case "canciones":
                        echo "<h1>{$row['nombre']}</h1>
                        <p>Duracion: {$row['duracion']}</p>
                        <p>ID Artista: {$row['id']}</p>";
                        break;

                    case "artistas":
                        echo "<h1>{$row['nombre']}</h1>";
                        break;

                    case "discos":
                        echo "<h1>{$row['nombre']}</h1>
                        <p>ID Artista: {$row['artista_id']}</p>";
                        break;
                } //Fin de SWITCH
            }//fin del IF de $id

          else
          {
            echo 
            "<li>
            <a href='ficha.php?id={$row["id"]}&tabla={$tabla}'>
             {$row["nombre"]}
            </a>
              </li>";
          }

    

        }
      } else {
        echo "0 results";
      }
    //5.Cerrar la conexion
      mysqli_close($conn);

}