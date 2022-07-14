<?php   
        if(isset($_GET['editar'])){
            $editar_id = $_GET['editar'];

            $consulta = "SELECT * FROM usuarios WHERE id= '$editar_id";
            $ejecutar = sqlsrv_query($conn,$consulta);
            $fila = sqlsrv_fetch_array($ejecutar);

            $usuario = $fila['name'];
            $tele = $fila['phone'];
            $edad = $fila['age'];
            $fecha = $fila['date'];
            $dire = $fila['adress'];
            $correo = $fila['email'];
        }
    ?>

    <br></br>

    <div class="col-md-8 col-md-offset-2">
        <form method= "POST" action= "">
            <div class= "form-group">
                <label>Nombre:</label>
                <input type="text" name="name" class="form-control" value="<?php echo  $usuario;?>"><br/>
            </div>
            <div class= "form-group">
                <label>Telefono:</label>
                <input type="text" name="phone" class="form-control" value="<?php echo  $tele;?>"><br/>
            </div>
            <div class= "form-group">
                <label>Edad:</label>
                <input type="text" name="age" class="form-control" value="<?php echo  $edad;?>"><br/>
            </div>
            <div class= "form-group">
                <label>Fecha nacimiento:</label>
                <input type="date" name="date" class="form-control" value="<?php echo  $fecha;?>"><br/>
            </div>
            <div class= "form-group">
                <label>Direccion:</label>
                <input type="text" name="adress" class="form-control" value="<?php echo  $dire;?>"><br/>
            </div>
            <div class= "form-group">
                <label>Correo electronico:</label>
                <input type="text" name="email" class="form-control" value="<?php echo  $correo;?>"><br/>
            </div>
            <div class= "form-group">
                <input type="submit" name="actualizar" class="form-control" value="Actualizar datos"><br/>
            </div>
    </div>

    <?php
        if(isset($_POST['actualizar'])){
            $actualizar_nombre = $POST['name'];
            $actualizar_tele = $POST['phone'];
            $actualizar_edad = $POST['age'];
            $actualizar_fecha = $POST['date'];
            $actualizar_dire = $POST['adress'];
            $actualizar_correo = $POST['email'];

            $consulta = "UPDATE usuarios SET usuario='$actualizar_nombre', tele='$actualizar_tele', edad='$actualizar_edad,'
            fecha='$actualizar_fecha', dire='$actualizar_dire',correo='$actualizar_correo' WHERE id='$editar_id'";
            $ejecutar = sqlsrv_query($conn,$consulta);
            
            if($ejecutar){
                echo "<script>alert('Datos actualizados')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }
    ?>