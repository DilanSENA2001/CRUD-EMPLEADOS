<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Actualizar Empleado</title>
</head>
<body>

<div class="container">
    <h1>.: Actualizar Empleado :.</h1>
    <hr>

    <?php
    include("conexion.php");

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM empleado WHERE numeroID = ?";
        
        // Preparar la consulta
        $stmt = $conexion->prepare($sql);
        
        if ($stmt) {
            // Vincular el parámetro y ejecutar la consulta
            $stmt->bind_param("i", $id);
            $stmt->execute();
            
            // Obtener el resultado de la consulta
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $empleado = $result->fetch_assoc();
                ?>

                <form action='actualizar.php' method='POST' class='col-md-6'>
                    <input type='hidden' name='id' value='<?php echo $empleado['numeroID']; ?>'>
                    <input type='text' name='nombres' class='form-control mb-2' value='<?php echo $empleado['nombres']; ?>'><br>
                    <input type='text' name='apellidos' class='form-control mb-2' value='<?php echo $empleado['apellidos']; ?>'><br>
                    <input type='text' name='telefono' class='form-control mb-2' value='<?php echo $empleado['telefono']; ?>'><br>
                    <input type='text' name='direccion' class='form-control mb-2' value='<?php echo $empleado['direccion']; ?>'><br>
                    <input type='text' name='email' class='form-control mb-2' value='<?php echo $empleado['email']; ?>'><br>
                    <select id='nitEmpresa' name='nitEmpresa' class='form-control mb-2' required>
                        <option value=''>Seleccione el ID de la empresa</option>
                        <option value='123654-8'>123654-8</option>
                        <option value='800130140-1'>800130140-1</option>
                        <option value='899999068-1'>899999068-1</option>
                        <option value='800.021.308-5'>800.021.308-5</option>
                    </select>
                    <input type='text' name='cargo' class='form-control mb-2' value='<?php echo $empleado['cargo']; ?>'><br>
                    <input type='text' name='salario' class='form-control mb-2' value='<?php echo $empleado['salario']; ?>'><br>
                    <button type='submit' class='btn btn-primary'>Guardar Cambios</button>
                </form>

                <?php
            } else {
                echo "No se encontró ningún empleado con ese ID.";
            }

            // Cerrar la declaración
            $stmt->close();
        } else {
            echo "Error en la preparación de la consulta: " . $conexion->error;
        }
    } else {
        echo "Solicitud no válida.";
    }
    ?>

</div>
</body>
</html>
