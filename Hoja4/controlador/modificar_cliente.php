<?php
$archivo = "../data/clientes.txt";
$clientes = file_exists($archivo) ? file($archivo, FILE_IGNORE_NEW_LINES) : [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];

    $modificado = false;

    foreach ($clientes as &$cliente) {
        $datos = explode("|", $cliente);
        if ($datos[0] == $id) {
            $cliente = "$id|$nombre|$direccion|$telefono";
            $modificado = true;
        }
    }

    if ($modificado) {
        file_put_contents($archivo, implode(PHP_EOL, $clientes) . PHP_EOL);
        $mensaje = "Cliente modificado correctamente.";
    } else {
        $mensaje = "Cliente con ID $id no encontrado.";
    }
}
?>