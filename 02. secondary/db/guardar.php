<?php
// Conectar a la base de datos
$host = "http:/localhost:127.0.0.1"; // El nombre del servidor donde está la base de datos
$user = "root"; // El nombre de usuario de la base de datos
$pass = ""; // La contraseña de la base de datos
$db = "newsletter"; // El nombre de la base de datos
$con = mysqli_connect($host, $user, $pass, $db) or die("Error al conectar a la base de datos");

// Recibir los datos del formulario
$email = $_POST["email"]; // El email del campo del formulario

// Validar los datos del formulario
if (empty($email)) {
  // Si el email está vacío, mostrar un mensaje de error
  echo "Por favor, ingresa un email";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  // Si el email no tiene un formato válido, mostrar un mensaje de error
  echo "Por favor, ingresa un email válido";
} else {
  // Si los datos son válidos, preparar la consulta SQL para insertarlos en la tabla
  $sql = "INSERT INTO email (email) VALUES (?)";
  $stmt = mysqli_prepare($con, $sql); // Preparar la consulta
  mysqli_stmt_bind_param($stmt, "s", $email); // Vincular los parámetros
  mysqli_stmt_execute($stmt); // Ejecutar la consulta
  if (mysqli_stmt_affected_rows($stmt) > 0) {
    // Si se insertó un nuevo registro, mostrar un mensaje de éxito
    echo "Gracias por suscribirte a nuestro newsletter";
  } else {
    // Si no se insertó ningún registro, mostrar un mensaje de error
    echo "Ocurrió un error al guardar tus datos";
  }
  mysqli_stmt_close($stmt); // Cerrar la consulta
}
mysqli_close($con); // Cerrar la conexión
?>

