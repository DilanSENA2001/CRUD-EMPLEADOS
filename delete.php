<?php
include("conexion.php");

if(isset($_GET['nit'])) {
    $nit = $_GET['nit'];
    
    // Realiza la eliminación en la base de datos
    $sql = "DELETE FROM empresa WHERE nit = '$nit'";
    
    if ($conexion->query($sql) === TRUE) {
        echo "<script>
        alert('Empresa eliminada correctamente.');
        window.location.href = 'index.php'; // Redirige a la lista de empresas
      </script>";
    } else {
        echo "<script>
        alert('Error al eliminar la empresa: " . $conexion->error . "');
        window.location.href = 'index.php'; // Redirige a la lista de empresas
      </script>";
    }
} else {
    echo "<script>
    alert('ID de la empresa no proporcionado.');
    window.location.href = 'index.php'; // Redirige a la lista de empresas
  </script>";
}
?>



