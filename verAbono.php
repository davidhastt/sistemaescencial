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
$id_abono = $_POST['id_abono'];



$query = "SELECT id_abono, id_cliente, abono, fecha FROM abonos WHERE id_abono = '$id_abono'";
$result = pg_query($conn, $query);//ejecutamos la sentencia SQL
if ($result) { 
        if (pg_num_rows($result) > 0) { 
            $row = pg_fetch_assoc($result); // Obtener la fila de resultados 
            
        } else { 
            echo "No se encontraron registros con el ID de abono proporcionado."; $row = null; 
        } 
} else {
        echo "Error en la consulta de datos: " . pg_last_error(); $row = null;
}
?>





<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Captura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }


        nav { background-color: #333; padding: 10px; } nav ul { list-style: none; margin: 0; padding: 0; display: flex; justify-content: center; } nav ul li { margin: 0 15px; } nav ul li a { color: white; text-decoration: none; font-weight:bold}


    </style>
</head>

<body>

    <h1>Formulario de Captura</h1>
    <form action="actualizar.php" method="post">
        <div class="form-group">
            <label for="id_abono">ID Abono:</label>
            <input type="text" id="id_abono" value= <?php echo $row['id_abono']; ?> name="id_abono" required>
        </div>
        <div class="form-group">
            <label for="abono">Abono:</label>
            <input type="number" id="abono" value= <?php echo $row['abono']; ?> name="abono" required>
        </div>
        <div class="form-group">
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" value= <?php echo $row['fecha']; ?> name="fecha" required>
        </div>
        <button type="submit">Enviar</button>
    </form>
</body>
</html> 