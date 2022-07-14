<!DOCTYPE html>
<?php
    include("conexion.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BRM Registro</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="col-md-8 col-md-offset-2">
        <h1>CLIENTES</h1>
        <form method= "POST" action= "index.php">
            <div class= "form-group">
                <label>Nombre:</label>
                <input type="text" name="name" class="form-control" placeholder="Escriba su nombre"><br/>
            </div>
            <div class= "form-group">
                <label>Telefono:</label>
                <input type="text" name="phone" class="form-control" placeholder="Escriba su telefono"><br/>
            </div>
            <div class= "form-group">
                <label>Edad:</label>
                <input type="text" name="age" class="form-control" placeholder="Escriba su edad"><br/>
            </div>
            <div class= "form-group">
                <label>Fecha nacimiento:</label>
                <input type="date" name="date" class="form-control" placeholder="Escriba su fecha de nacimiento"><br/>
            </div>
            <div class= "form-group">
                <label>Direccion:</label>
                <input type="text" name="adress" class="form-control" placeholder="Escriba su direccion"><br/>
            </div>
            <div class= "form-group">
                <label>Correo electronico:</label>
                <input type="text" name="email" class="form-control" placeholder="Escriba su correo"><br/>
            </div>
            <div class= "form-group">
                <input type="submit" name="insert" class="form-control" value="Insertar datos"><br/>
            </div>
    </div>
    <br/><br/><br/>

    <?php
        if(isset($_POST['insert'])){
            $usuario = $_POST['name'];
            $tele = $_POST['phone'];
            $edad = $_POST['age'];
            $fecha = $_POST['date'];
            $dire = $_POST['adress'];
            $correo = $_POST['email'];

            $insertar = "INSERT INTO usuarios(name,phone,age,date,adress,email)VALUES('$usuario','$tele','$edad','$fecha','$dire','$correo')";
            $ejecutar = sqlsrv_query($conn,$insertar);

            if($ejecutar){
                echo"Creado con exito";
            }
        }
    ?>

    <div class="col-md-8 col-md-offset-2">
    <table class= "table table-bordered table-responsive">
        <tr>
            <td>ID</td>
            <td>Nombres</td>
            <td>Telefonos</td>
            <td>Edades</td>
            <td>Fechas Nacimiento</td>
            <td>Dirreciones</td>
            <td>Correos</td>
            <td>Accion</td>
            <td>Accion</td>
        </tr>
        <?php
            $consulta ="SELECT * FROM usuarios";
            $ejecutar = sqlsrv_query($conn,$consulta);

            $i=0;

            while($fila = sqlsrv_fetch_array($ejecutar)){
                $id = $fila['id'];
                $usuario = $fila['name'];
                $tele = $fila['phone'];
                $edad = $fila['age'];
                $fecha = $fila['date'];
                $dire = $fila['adress'];
                $correo = $fila['email'];
                $i++;

        ?>

        <tr align="center">
            <td><?php echo $id ?></td>
            <td><?php echo $usuario ?></td>
            <td><?php echo $tele ?></td>
            <td><?php echo $edad ?></td>
            <td><?php echo $fecha ?></td>
            <td><?php echo $dire ?></td>
            <td><?php echo $correo ?></td>
            <td><a href="index.php?editar==<?php echo $id;?>">Editar</a></td>
            <td><a href="index.php?eliminar==<?php echo $id;?>">Eliminar</a></td>
        </tr>
        <?php } ?>
    </table>
    </div>

    <?php   
        function repetido($usuario){
            $sql = "SELECT * FROM usuarios WHERE name=$usuario";
            $result = sqlsrv_query($conn,$sql);

            if (sqlsrv_num_rows($result) > 0){
                return 1;
            }else{
                return 0;
            }
        }




        if(isset($_GET['editar'])){
            include("editar.php");
        }
    ?>
    <?php   
        if(isset($_GET['eliminar'])){
            $eliminar_id = $_GET['eliminar'];

            $eliminar = "DELETE FROM usuarios WHERE id='$eliminar_id'";
            $ejecutar = sqlsrv_query($conn,$eliminar);

            if($ejecutar){
                echo "<script>alert('Eliminado')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }
    ?>

</body>
</html>