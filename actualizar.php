<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $cargo = $_POST['cargo'];
    $salario = $_POST['salario'];
    $nitEmpresa = $_POST['nitEmpresa'];
    // Realiza la actualización en la base de datos
    $sql = "UPDATE empleado SET nombres = '$nombres', apellidos = '$apellidos', telefono = '$telefono', direccion = '$direccion', email = '$email', cargo = '$cargo', salario = '$salario', nitEmpresa = '$nitEmpresa' WHERE numeroID = '$id'";
    if ($conexion->query($sql) === TRUE) {
        echo "<script>
        alert('Datos actualizados correctamente.');
        window.location.href = 'empleado.php'; // Redirige a la lista de empleados
      </script>";

    } else {
        echo "Error al actualizar los datos: " . $conexion->error;
    }
} else {
    echo "Solicitud no válida.";
}
?>
