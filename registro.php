<?php

// Validar que la edad sea mayor de 18
if ($_POST['edad'] < 18) {
  echo "La edad debe ser mayor de 18.";
  exit;
}

// Validar que la tarjeta no esté vencida
$fecha_actual = new DateTime();
$fecha_vencimiento = new DateTime($_POST['mes_vencimiento'] . "/" . $_POST['anio_vencimiento']);
if ($fecha_vencimiento < $fecha_actual) {
  echo "La tarjeta está vencida.";
  exit;
}

// Guardar el usuario
$usuario = [
  "nombre" => $_POST['nombre'],
  "edad" => $_POST['edad'],
  "fecha_nacimiento" => $_POST['fecha_nacimiento'],
  "tarjeta" => $_POST['tarjeta'],
];

file_put_contents("usuarios.json", json_encode($usuario));

echo "Registro exitoso.";

?>