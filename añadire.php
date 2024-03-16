<!DOCTYPE html>
<html lang="en">
<head>
    <title>Agregar empresa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <?php
        if(isset($_POST['enviar'])) { 
            $nit = $_POST['nit'];
            $tip_e = $_POST['tipo_empresa'];
            $nom = $_POST['nombre'];
            $te = $_POST['telefono'];
            $dir = $_POST['direccion'];
            $em = $_POST['email'];
            
            include("conexion.php");
            $sql = "INSERT INTO empresa VALUES('$nit', '$tip_e', '$nom', '$te',  '$dir','$em')";
            $result = $conexion->query($sql);

            if($result) { 
                echo "<script language='JavaScript'>
                    alert('Los datos fueron agregados correctamente');
                    window.location.href = 'index.php';
                </script>";
            } else { 
                echo "<script language='JavaScript'>
                    alert('Los datos no fueron agregados correctamente');
                    window.location.href = 'index.php';
                </script>";
            }
        }

        
    ?>
    

    <h1>.: Agregar nueva empresa :.</h1>
    
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="col-md-6"> 
        <input type="text" name="nit" placeholder="Nit de la empresa" class="form-control mb-2" required> 
        <input type="text" name="tipo_empresa" placeholder="Tipo de empresa" class="form-control mb-2" required>
        <input type="text" name="nombre" placeholder="Nombre de la empresa" class="form-control mb-2" required>
        <input type="text" name="telefono" placeholder="Telefono" class="form-control mb-2" required> 
        <input type="text" name="direccion" placeholder="Direccion" class="form-control mb-2" required>
        <input type="text" name="email" placeholder="Correo electronico" class="form-control mb-2" required>        
        <input type="submit" name="enviar" value="AGREGAR" class="btn btn-success mt-3">
    </form>
</div>
</body>
</html>
