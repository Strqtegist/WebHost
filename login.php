<?php

// Define la variable usuarios
$usuarios = json_decode(fread($archivo, filesize("usuarios.json")));

// Abre el archivo usuarios.json
$archivo = fopen("usuarios.json", "r");

// Lee el archivo
$usuarios = json_decode(fread($archivo, filesize("usuarios.json")));

// Cierra el archivo
fclose($archivo);

// Comprueba si el usuario existe
if (!isset($usuarios[$_POST["usuario"]])) {

  // El usuario no existe
  echo "USUARIO NO EXISTE";

} else {

  // El usuario existe
  if ($usuarios[$_POST["usuario"]]["contraseña"] == $_POST["contraseña"]) {

    // La contraseña es correcta
    header("Location: principal.html");
  } else {

    // La contraseña es incorrecta
    echo "La contraseña es incorrecta";
  }

}

?>