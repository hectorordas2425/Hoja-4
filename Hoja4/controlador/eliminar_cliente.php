<?php
$archivo = "../data/clientes.txt";
$clientes = file_exists($archivo) ? file($archivo, FILE_IGNORE_NEW_LINES) : [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $encontrado = false;

    // Filtrar clientes, eliminando el que coincide con el ID
    $nuevosClientes = array_filter($clientes, function($linea) use ($id, &$encontrado) {
        $datos = explode("|", $linea);
        if ($datos[0] == $id) {
            $encontrado = true;
            return false;
        }
        return true;
    });

    if ($encontrado) {
        file_put_contents($archivo, implode(PHP_EOL, $nuevosClientes) . PHP_EOL);
        $mensaje = "Cliente eliminado correctamente.";
    } else {
        $mensaje = "Cliente con ID $id no encontrado.";
    }
}
?>