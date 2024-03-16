<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Empleados</title>
</head>
<body>

<div class="container">
        
        <h1>.: Empleados :.
        <a href="index.php" class="btn btn-primary float-end mt-2" style="margin-left: auto;">Empresas</a>   
        <a href="buscar.php" class="btn btn-info float-end mt-2 mt 2" style="margin-left: auto;">Buscar Empleado</a>   
        </h1>
        <hr>

<?php

    include("conexion.php");
    $sql = "select * from empleado";
    $result = $conexion->query($sql);

    echo "<table class='table table-hover table-striped'>
                    <tr>
                        <th>numeroID</th>
                        <th>tipoID</th>
                        <th>nombres</th>
                        <th>apellidos</th>
                        <th>telefono</th>
                        <th>direccion</th>
                        <th>email</th>
                        <th>nitEmpresa</th>
                        <th>cargo</th>
                        <th>salario</th>
                        <th>Acciones</th>
                    </tr>";
    
                    while ($empleado = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$empleado['numeroID']}</td>";
                        echo "<td>{$empleado['tipoID']}</td>";
                        echo "<td>{$empleado['nombres']}</td>";
                        echo "<td>{$empleado['apellidos']}</td>";
                        echo "<td>{$empleado['telefono']}</td>";
                        echo "<td>{$empleado['direccion']}</td>";
                        echo "<td>{$empleado['email']}</td>";
                        echo "<td>{$empleado['nitEmpresa']}</td>";
                        echo "<td>{$empleado['cargo']}</td>";
                        echo "<td>{$empleado['salario']}</td>";
                        echo "<td><a href='update.php?id={$empleado['numeroID']}'>EDITAR</a></td>";
                        echo "<td><a href ='eliminar.php?id={$empleado['numeroID']}'>ELIMINAR</a><td>"; echo "</tr>";
                    }


                    echo "</table>";


?>
      <a href="http://localhost/conexionbd/nuevo.php" class="btn btn-secondary float-end mt-2">Nuevo Registro De Empleado</a>
    
</body>
</html>