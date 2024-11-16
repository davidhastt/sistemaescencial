<?php
//Los comentarios se escriben asi
//para declarar una variable se le antepone un signo de $
//se debe poner ; casi siempre al funal de las lineas de codigo
/*

$a=10;
$b=10;

echo $a + $b;

$dbconn = pg_connect("host=localhost port=5432 dbname=santander user=postgres password=davitzoL");

$result = pg_query($dbconn, "select *  from entidades");
var_dump(pg_fetch_all($result));
*/

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
    <form action="insertar.php" method="post">
        <div class="form-group">
            <label for="id_cliente">ID Cliente:</label>
            <input type="text" id="id_cliente" name="id_cliente" required>
        </div>
        <div class="form-group">
            <label for="abono">Abono:</label>
            <input type="number" id="abono" name="abono" required>
        </div>
        <div class="form-group">
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required>
        </div>
        <button type="submit">Enviar</button>
    </form>
</body>
</html> 






