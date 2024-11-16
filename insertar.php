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



// Obtener los datos del formulario
$id_cliente = $_POST['id_cliente'];
$abono = $_POST['abono'];
$fecha = $_POST['fecha'];

$query = "INSERT INTO abonos (id_cliente, abono, fecha) VALUES ('$id_cliente', '$abono', '$fecha')";

$result = pg_query($conn, $query);

if ($result) {
    echo "Datos insertados correctamente.";
} else {
    echo "Error en la inserción de datos: " . pg_last_error();
}


?>