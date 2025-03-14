<?php include 'bloques/_config.php';  ?>
<?php include 'bloques/_header.php';  ?>

    <section>
        <h2>Inicio</h2>
        <p>Esta es la página de inicio de <?=SITENAME?></p> <!-- Constante para reutilizar -->
    </section>



<? const TITULO = "El apartado de la web"; ?> <!-- Constante para reutilizar -->

<?
$sql='SELECT * FROM producto'; 
//Seleccionaa todas las a atracciones de Disneyland paris (id_parque=1)
$resultado=consulta($sql,1);

if (mysqli_num_rows($resultado) > 0) {
    // output data of each row
    echo '<ul>';
    while($row = mysqli_fetch_assoc($resultado)) {
      echo "<li>{$row["nombre"]}</li>";
    }
    echo '</ul>';
  } 
  else {
    echo "0 resultados";
  }
  
?>

<?php include 'bloques/_footer.php';  ?>



   