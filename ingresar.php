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
$nombre = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
$sql = "SELECT * FROM usuarios WHERE nombre='$nombre' AND password='$contraseña' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  session_start();
  $_SESSION['usuario'] = $row['nombre'];
  //$_SESSION['puesto'] = $row['puesto'];
  header("location: conectar.php");
} else {
  echo "incorrecto usuario y/o contraseña";
  ?>
  <a href="index.php">presione aqui para regresar</a>
  <?php
}


$conn->close();
?>