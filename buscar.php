<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar empleados</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <br>
        <h1>Busqueda de empleados</h1>
        <hr>
        <h4>Para buscar los empleados de una empresa, digite el NIT</h4>
        <br>
        <form method="POST">
            <input type="text" name="nit" placeholder="NIT">
            <input type="submit" value="Buscar"  class="btn btn-outline-success">
            <button><a href='empleado.php' class="btn btn-outline-secondary">Volver</a></button>
        </form>
        <br>
        <?php
            include 'conexion.php';
            if($_POST){
                $nit = $_POST['nit'];

                $sql = "SELECT empresa.nit, empresa.nombre, empleado.nombres, empleado.apellidos, empleado.cargo FROM empresa JOIN empleado ON empresa.nit = empleado.nitEmpresa WHERE empresa.nit = '$nit'";

                $result = $conexion->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table class='table table-hover table-striped'>
                            <tr>
                                <th>NIT</th>
                                <th>Nombre empresa</th>
                                <th>Nombre(s) empleado</th>
                                <th>Apellido(s) empleado</th>
                                <th>Cargo</th>
                            </tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['nit']}</td>
                                <td>{$row['nombre']}</td>
                                <td>{$row['nombres']}</td>
                                <td>{$row['apellidos']}</td>
                                <td>{$row['cargo']}</td>
                            </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No se encontraron resultados.";
                }
            }
        ?>
    </div>
</body>
</html>
