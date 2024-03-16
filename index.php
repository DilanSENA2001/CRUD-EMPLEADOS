<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Empresas</title>
</head>
<body>

<div class="container">
        
        <h1>.: Empresas :.
        <a href="empleado.php" class="btn btn-primary float-end mt-2" style="margin-left: auto;">Empleados</a>   
        </h1>  

       
        <hr>

<?php

    include("conexion.php");
    $sql = "select * from empresa";
    $result = $conexion->query($sql);

    echo "<table class='table table-hover table-striped'>
                    <tr>
                        <th>nit</th>
                        <th>tipo_empresa</th>
                        <th>nombre</th>
                        <th>telefono</th>
                        <th>direccion</th>
                        <th>email</th>
                        <th>Acciones</th>
                    </tr>";
    
                    while ($empresa = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$empresa['nit']}</td>";
                        echo "<td>{$empresa['tipo_empresa']}</td>";
                        echo "<td>{$empresa['nombre']}</td>";
                        echo "<td>{$empresa['telefono']}</td>";
                        echo "<td>{$empresa['direccion']}</td>";
                        echo "<td>{$empresa['email']}</td>";
                      echo "<td><a href ='actuae.php'>EDITAR</a><td>"; 
                      echo "<td><a href =''>ELIMINAR</a><td>"; echo "</tr>";
                    }


                    echo "</table>";


?>
    
</body>
</html>