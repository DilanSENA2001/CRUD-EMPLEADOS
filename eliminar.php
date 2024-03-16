<?php
include("conexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Realizar la eliminación en la base de datos
    $sql = "DELETE FROM empleado WHERE numeroID = '$id'";
    if ($conexion->query($sql) === TRUE) {
        echo "<script>
                alert('Empleado eliminado correctamente.');
                window.location.href = 'empleado.php'; // Redirige a la lista de empleados
              </script>";
    } else {
        echo "Error al eliminar el empleado: " . $conexion->error;
    }
} else {
    echo "No se proporcionó un ID de empleado válido.";
}
?>
