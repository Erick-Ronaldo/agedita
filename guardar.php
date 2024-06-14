<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Datos de conexión a la base de datos
  $servername = "localhost";
  $username = "root"; // Cambiar por el nombre de usuario de la base de datos
  $password = ""; 
  $dbname = "Miagenda"; // Cambiar por el nombre de la base de datos

  // Crear conexión
  $conn = new mysqli($servername,$username,$password,$dbname);

  // Verificar la conexión
  if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
  }

  // Obtener datos del formulario
  $nombre = $_POST['nombre'];
  $correo= $_POST['correo'];
   $mensaje = $_POST['mensaje'];
     $telefono = $_POST['telefono'];
       $direccion = $_POST['direccion'];
         $fechanacimiento = $_POST['fechanacimiento'];
// Preparar y ejecutar la consulta SQL para insertar datos
  $sql = "INSERT INTO datosagenda (nombre,email,mensaje,telefono,direccion,fechanacimiento) VALUES ('$nombre','$correo','$mensaje','$telefono','$direccion','$fechanacimiento')";

  if ($conn->query($sql) === TRUE){
    echo "Datos Guardados Correctamente
    <br> <a href='index.html'>volver</a>";
  } else {
    echo "Error al insertar datos: " . $sql . "<br>" . $conn->error;
  }

  // Cerrar conexión
  $conn->close();
}
?>