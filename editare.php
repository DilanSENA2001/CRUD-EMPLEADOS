<!DOCTYPE html>
<html lang="es">
<head>
    <title>Editar Empresa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
        // Incluye el archivo de conexión a la base de datos
        include("conexion.php");
        
        // Verifica si se proporcionó el ID de la empresa en la URL
        if(isset($_GET['nit'])) {
            $nit = $_GET['nit'];
            
            // Consulta para obtener los datos de la empresa específica
            $sql = "SELECT * FROM empresa WHERE nit = '$nit'";
            $result = $conexion->query($sql);

            // Verifica si se encontró una empresa con el ID proporcionado
            if($result->num_rows == 1) {
                $empresa = $result->fetch_assoc();
                
                // Procesa la actualización de datos cuando se envía el formulario
                if(isset($_POST['guardar'])) {
                    $tipo_empresa = $_POST['tipo_empresa'];
                    $nombre = $_POST['nombre'];
                    $telefono = $_POST['telefono'];
                    $direccion = $_POST['direccion'];
                    $email = $_POST['email'];

                    // Realiza la actualización en la base de datos
                    $update_sql = "UPDATE empresa SET tipo_empresa = '$tipo_empresa', nombre = '$nombre', telefono = '$telefono', direccion = '$direccion', email = '$email' WHERE nit = '$nit'";
                    
                    if ($conexion->query($update_sql) === TRUE) {
                        echo "<p class='text-success'>Datos actualizados correctamente.</p>";
                    } else {
                        echo "<p class='text-danger'>Error al actualizar los datos: " . $conexion->error . "</p>";
                    }
                }
    ?>
   <h1>.: Editar Empresa :.</h1>
                <form action="<?php echo $_SERVER['PHP_SELF'] . '?nit=' . $nit; ?>" method="POST" class="col-md-6" id="editForm">
                    <!-- Rellena los campos del formulario con los datos existentes -->
                    <input type="text" name="nit" value="<?php echo $empresa['nit']; ?>" class="form-control mb-2" readonly>
                    <input type="text" name="tipo_empresa" value="<?php echo $empresa['tipo_empresa']; ?>" class="form-control mb-2" required>
                    <input type="text" name="nombre" value="<?php echo $empresa['nombre']; ?>" class="form-control mb-2" required>
                    <input type="text" name="telefono" value="<?php echo $empresa['telefono']; ?>" class="form-control mb-2" required> 
                    <input type="text" name="direccion" value="<?php echo $empresa['direccion']; ?>" class="form-control mb-2" required>
                    <input type="text" name="email" value="<?php echo $empresa['email']; ?>" class="form-control mb-2" required>
                    <!-- Agrega el botón para guardar la actualización con confirmación en JavaScript -->
                    <button type="submit" name="guardar" class="btn btn-success" id="guardarBtn">Guardar Actualización</button>
                </form>
    <?php
            } else {
                echo "<p class='text-danger'>No se encontró la empresa.</p>";
            }
        } else {
            echo "<p class='text-danger'>ID de la empresa no proporcionado.</p>";
        }
    ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editForm = document.getElementById('editForm');
        editForm.addEventListener('submit', function(event) {
            const confirmacion = confirm('¿Estás seguro de que deseas guardar los cambios?');
            if (!confirmacion) {
                event.preventDefault(); // Evitar el envío del formulario si se cancela la confirmación
            } else {
                alert('Datos actualizados correctamente.');
                window.location.href = 'index.php'; // Redirige a la página index.php
            }
        });
    });
</script>
</body>
</html>
