<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['email'];
    $direccion1 = $_POST['direccion1'];

    $linea = "$id,$nombre,$telefono,$correo,$direccion1 \n";
    file_put_contents("../datos/proveedores.csv", $linea, FILE_APPEND);

    header("Location: ../index.php?opcion=proveedores");
    exit();
}
?>
