<?php
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $bd = "pavdatos";

    $coneccion = mysqli_connect($servidor, $usuario, $clave, $bd);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario pav</title>
    <style>
        body {
            background-color: rgb(8, 86, 154);
            color: white;
            font-family: Arial, sans-serif;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        img {
            max-width: 40%;
            height: auto;
            margin-bottom: 20px;
        }

        form {
            max-width: 50%;
            width: 100%;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: rgb(8, 86, 154);
            color: white;
            border: none;
            padding: 15px 20px;
            cursor: pointer;
            border-radius: 4px;
            width: auto;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #065c9e;
        }

        .mensaje {
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            padding: 10px;
            border-radius: 4px;
            font-weight: bold;
            text-align: center;
            width: 100%;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .mensaje-exito {
            background-color: green;
        }

        .mensaje-error {
            background-color: red;
        }

        .mostrar-mensaje {
            opacity: 1;
        }
    </style>
</head>
<body>

<img src="images/form.png" alt="Imagen" style="margin-left: 0px;">

    <form method="post">

        <input type="text" name="nombre" placeholder="Nombre">
        <br>
        <input type="text" name="correo" placeholder="Correo">
        <br>
        <input type="text" name="telefono" placeholder="Teléfono">
        <br>
        <input type="submit" name="enviar" value="Enviar">

        <?php
            if(isset($_POST['enviar'])){
                
                $nombre = $_POST['nombre'];
                $correo = $_POST['correo'];
                $telefono = $_POST['telefono'];
                
                $insertar = "INSERT INTO datos VALUES ('$nombre', '$correo', '$telefono', '')";
                
                $resultado = mysqli_query($coneccion, $insertar);

                if($resultado) {
                    echo '<div id="mensaje-exito" class="mensaje mensaje-exito">Datos insertados correctamente.</div>';
                } else {
                    echo '<div id="mensaje-error" class="mensaje mensaje-error">Error al insertar datos: ' . mysqli_error($coneccion) . '</div>';
                }
            }
        ?>

    </form>

    <script>

        setTimeout(function() {
            var mensajeExito = document.getElementById('mensaje-exito');
            var mensajeError = document.getElementById('mensaje-error');

            if (mensajeExito) {
                mensajeExito.classList.add('mostrar-mensaje');
                setTimeout(function() {
                    mensajeExito.classList.remove('mostrar-mensaje');
                }, 2000);
            }

            if (mensajeError) {
                mensajeError.classList.add('mostrar-mensaje');
                setTimeout(function() {
                    mensajeError.classList.remove('mostrar-mensaje');
                }, 2000);
            }
        }, 500);
    </script>

</body>
</html>
