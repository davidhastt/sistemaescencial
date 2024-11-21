<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Datos de Abonos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Datos de Abonos</h1>
    <table>
        <tr>
            <th>ID Cliente</th>
            <th>Abono</th>
            <th>Fecha</th>
            <th>Accion</th>
        </tr>
        <?php
        //1.
        // Datos de conexión a la base de datos
        $host = 'localhost';
        $port = '5432';
        $dbname = 'santander';
        $user = 'postgres';
        $password = 'davitzoL';

        // Crear una conexión con PostgreSQL
        $conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
        //2.
        if (!$conn) {
            die("Error en la conexión: " . pg_last_error());
        }else{
            echo "conexion exitosa";
        }
        //3.
        // Consulta para obtener los datos de la tabla 'abonos'
        $query = "SELECT id_abono, id_cliente, abono, fecha FROM abonos ORDER BY id_cliente";




$result = pg_query($conn, $query); //Ejecutar la sentencia SQL
if ($result) {
    while ($row = pg_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id_cliente']) . "</td>";
        echo "<td>" . htmlspecialchars($row['abono']) . "</td>";
        echo "<td>" . htmlspecialchars($row['fecha']) . "</td>";
        echo "<td> 
                <form action='borrar.php' method='post'> 
                    <input type='hidden' name='id_abono' value='" . htmlspecialchars($row['id_abono']) . "'> 
                    <button type='submit'>Borrar</button>
                </form>
                
                <form action='verAbono.php' method='post'> 
                    <input type='hidden' name='id_abono' value='" . htmlspecialchars($row['id_abono']) . "'> 
                    <button type='submit'>Actualizar</button>
                </form>                 


                </td>";
        echo "</tr>";
    }
} else {
    echo "Error al obtener datos: " . pg_last_error();
}
pg_close($conn);
//1. Nos conectamos a postgres
//2. Verificamos que la conexion a postgres se halla realizado exitosamente
//3. Creamos una sentencia SQL y la ejecutamos
?>		
    </table>
</body>
</html> 