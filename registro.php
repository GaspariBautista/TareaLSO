<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$database = "bancoprov";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni = $_POST['dni'];
    $apellido = $_POST['apellido'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];


    $sql = "INSERT INTO usuarios (nombre, apellido, email, dni)
            VALUES ('$nombre', '$apellido', '$email', '$dni')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Registro exitoso. ¡Tu cuenta se ha creado correctamente!');
                window.location.href='index.html';
              </script>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
