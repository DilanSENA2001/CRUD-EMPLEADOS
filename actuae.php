<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nit = $_POST['nit'];
    $tipo_empresa = $_POST['tipo_empresa'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];

    // Realiza la actualización en la base de datos
    $sql = "UPDATE empresa SET tipo_empresa = '$tipo_empresa', nombre = '$nombre', telefono = '$telefono', direccion = '$direccion', email = '$email' WHERE nit = '$nit'";
    
    if ($conexion->query($sql) === TRUE) {
        echo "<script>
        alert('Datos actualizados correctamente.');
        window.location.href = 'index.php'; // Redirige a la lista de empresas
      </script>";

    } else {
        echo "Error al actualizar los datos: " . $conexion->error;
    }
} else {
    echo "Solicitud no válida.";
}
?>
