<?php
$mensaje = '';  // Variable para almacenar mensajes

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos (actualiza con tus propios valores)
    $servername = "localhost";
    $username = "root";
    $password = '';
    $dbname = "proyecto_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Obtener datos del formulario
    $credito_id = $_POST["credito_id"];
    $nuevo_estado = $_POST["nuevo_estado"];

    // Actualizar el estado en la base de datos
    $sql = "UPDATE credito SET estadoSoli = '$nuevo_estado' WHERE id = $credito_id";

    if ($conn->query($sql) === TRUE) {
        $mensaje = "Solicitud confirmada. El estado de la solicitud se le hará llegar al cliente.";
        echo "<div style='display: flex; justify-content: center; align-items: center; height: 100vh; flex-direction: column; text-align: center;'>";
        echo "<p style='font-size: 18px; color: #4CAF50;'>" . $mensaje . "</p>";
        echo "<a href='admin.php'><button style='padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;'>Regresar</button></a>";
        echo "</div>";
        
    } else {
        $mensaje = "Error al actualizar el estado: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>