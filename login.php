<?php

// Validar que el usuario exista
$usuarios = json_decode(file_get_contents("usuarios.json"));
if (!array_key_exists($_POST['usuario'], $usuarios)) {
  echo "El usuario no existe.";
  exit;
}

// Validar que la contraseña sea correcta
if ($usuarios[$_POST['usuario']]['contraseña'] != $_POST['contraseña']) {
  echo "La contraseña es incorrecta.";
  exit;
}

// Iniciar sesión
session_start();
$_SESSION['usuario'] = $_POST['usuario'];

echo "Inicio de sesión exitoso.";

?>