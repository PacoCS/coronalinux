<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CORONALINUX</title>
  </head>
  <body>

    <h1>CoronaLinux TEST</h1>
    <h2>TEXT </h2>

    <form action="index.php" method="post">
      <input type="text" name="usuari">
      <br>
      <input type="text" name="contrasenya">
      <br>
      <input type="submit" name="send" value="submit">
    </form>


<?php
$dbopts = getenv('DATABASE_URL');
// Conectando y seleccionado la base de datos
$dbconn = pg_connect($dbopts) or die('No se ha podido conectar: ' . pg_last_error());

echo "CONNECTAT!<br>";

if (isset($_POST["usuari"]) ) {
  $usuari = $_POST["usuari"];
  $contrasenya = $_POST["contrasenya"];
  $query = "SELECT * from usuaris where nom='$usuari'";
  $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());


  $line = pg_fetch_array($result, null, PGSQL_ASSOC);
  var_dump($line);
  if ($_POST["usuari"] == $line["nom"] && $_POST["contrasenya"] == $line["password"]){
    echo "Login correcto";
  }else{
    echo "Login incorrecto";
  };

};





// Realizando una consulta SQL
// $query = 'SELECT * FROM authors';
// $result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
//
// // Imprimiendo los resultados en HTML
// echo "<table>\n";
// while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
//     echo "\t<tr>\n";
//     foreach ($line as $col_value) {
//         echo "\t\t<td>$col_value</td>\n";
//     }
//     echo "\t</tr>\n";
// }
// echo "</table>\n";
//
// // Liberando el conjunto de resultados
// pg_free_result($result);
//
// // Cerrando la conexión
// pg_close($dbconn);
?>


  </body>
</html>
