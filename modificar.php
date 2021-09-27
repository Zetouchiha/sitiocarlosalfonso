<?php
    session_start();
    //print_r($_SESSION);

    if(empty($_SESSION['usuario']))
    {
        echo "se detecto un intento de acceso invalido";
        ?>
        <a href="index.php">presione aqui para regresar</a>
        <?php
        exit();
    }
?>
<!DOCTYPE HTML>
<!--
	Multiverse by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Multiverse by HTML5 UP</title>
        <script>
            function confirmar()
            {
                if(confirm("¿Desea eliminar el campo?"))
                {
                    return true;
                }
                return false;
            }
        </script>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
        <?php
            $servername = "localhost";
            $username = "id17616812_carlosalfonso";
            $password = "_8-pD~BTmk=LGUUM";
            $dbname = "id17616812_pos";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            $id = $_GET["id"];
            $sql = "SELECT id, nombre, precio FROM productos WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                echo "<table border='1'>";
                echo "<tr><th>id</th><th>nombre</th><th>precio</th><th>borrar</th><th>modificar</th></tr>";
                while($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $nombre = $row['nombre'];
                    $precio = $row['precio'];
                    echo "<tr>\t\n<td> " . $row["id"]. "</td>\t\n<td> " 
                                         . $row["nombre"]. "</td>\t\n<td> " 
                                         . $row["precio"]. "</td>\t\n<td>"
                                         ."<a href='eliminar.php?id=$id' onclick='return confirmar()'><img src='eliminar.png'></a></td>\t\n<td>"
                                         ."<a href='modificar.php?id=$id'><img src='modificar.png'></a></td>\t\n</tr>";
                    ?>
                    <form action="modificar2.php" method="post">     
                        <fieldset>
                            <legend>capture los datos del producto</legend>
                            id: <input type="number" name="" value="<?=$id ?>"required disabled></br>
                            <input type="hidden" name="id" value="<?=$id ?>"required>
                            nombre: <input type="text" name="nombre" value="<?=$nombre ?>" required><br>
                            precio: <input type="number" name="precio" value="<?=$precio ?>" required><br>
                            <input type="submit" value="modificar"><br>
                            <input type="" value="cancelar">
                        </fieldset>
                    </form>
                    <?php              
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
        $conn->close();
        ?>
</body>
</html>