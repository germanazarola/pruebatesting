<!DOCTYPE html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener los datos del formulario
  $nombre = $_POST['nombre'];
  $contr = $_POST['contr'];
  $email = $_POST['email'];
  $fechaNacimiento = $_POST['fechaNacimiento'];
  $edad = $_POST['edad'];
  $nacionalidad = $_POST['nacionalidad'];
  $dni = $_POST['dni'];
  $genero = $_POST['genero'];
  $estadoCivil = $_POST['estadoCivil'];
  $telefono = $_POST['telefono'];
  $celular = $_POST['celular'];
  $direccion = $_POST['direccion'];
  $provincia = $_POST['provincia'];
  $codigoPostal = $_POST['codigoPostal'];
  $pais = $_POST['pais'];
  $nivelEstudio = $_POST['nivelEstudio'];
  $trabajaActualmente = $_POST['trabajaActualmente'];
  $buscaTrabajo = $_POST['buscaTrabajo'];

  // Conectar a la base de datos
  $conn = new mysqli('localhost', 'miusuario', 'micontrasena', 'formularios');

  // Verificar si hubo un error de conexión
  if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
  }

  // Preparar la consulta SQL para insertar los datos en la tabla
  $sql = "INSERT INTO tabla_datos (nombre, contr, email, fechaNacimiento, edad, nacionalidad, dni, genero, estadoCivil, telefono, celular, direccion, provincia, codigoPostal, pais, nivelEstudio, trabajaActualmente, buscaTrabajo) 
          VALUES ('$nombre', '$contr', '$email', '$fechaNacimiento', '$edad', '$nacionalidad', '$dni', '$genero', '$estadoCivil', '$telefono', '$celular', '$direccion', '$provincia', '$codigoPostal', '$pais', '$nivelEstudio', '$trabajaActualmente', '$buscaTrabajo')";

  // Ejecutar la consulta SQL
  if ($conn->query($sql) === TRUE) {
    // Redirigir al usuario a una página de confirmación utilizando el método GET
    header('Location:hola.html');
    exit(); // Asegurarse de que el script se detenga después de la redirección
  } else {
    echo "Error al guardar los datos en la base de datos: " . $conn->error;
  }

  // Cerrar la conexión a la base de datos
  $conn->close();
}
?>
