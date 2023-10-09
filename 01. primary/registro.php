<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "newsletter";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

$email = $_POST['prueba'];

$sql = "INSERT INTO emails (email) VALUES (?)";

$stmt = $conn->prepare($sql);
if ($stmt) {
    $stmt->bind_param("s", $email);
    if ($stmt->execute()) {
        echo "Registro exitoso. Gracias por suscribirte.";
    } else {
        echo "Error al insertar el registro: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $conn->error;
}

$conn->close();
?>
