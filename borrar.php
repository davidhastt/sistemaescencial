<?php
// Datos de conexión a la base de datos
$host = 'localhost';
$port = '5432';
$dbname = 'santander';
$user = 'postgres';
$password = 'davitzoL';




// Crear una conexión con PostgreSQL
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if ($conn) {
        //echo "Conexion correcta";
}else{
    die("Error en la conexión: " . pg_last_error());
}


// Obtener los datos que son enviados desde mostrar.php
$id_abono=$_POST['id_abono'];
//echo $id_abono;

//$query = "INSERT INTO abonos (id_cliente, abono, fecha) VALUES ('$id_cliente', '$abono', '$fecha')";

$query = "DELETE FROM  abonos WHERE id_abono = '$id_abono'";

echo $query;


$result = pg_query($conn, $query);

if ($result) {
    echo "Datos borrados correctamente.";
    header("Location: mostrar.php");
} else {
    echo "Error en la inserción de datos: " . pg_last_error();
}



?>