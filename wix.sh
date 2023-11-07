#!/bin/bash

# Asignar el primer parámetro a una variable
contenido="$1"

# Creamos los directorios y archivos necesarios
mkdir -m 777 $1
mkdir -m 777 $1/css
mkdir -m 777 $1/css/user
mkdir -m 777 $1/css/admin
mkdir -m 777 $1/img
mkdir -m 777 $1/img/avatars
mkdir -m 777 $1/img/buttons
mkdir -m 777 $1/img/products
mkdir -m 777 $1/img/pets
mkdir -m 777 $1/js
mkdir -m 777 $1/js/validations
mkdir -m 777 $1/js/effects
mkdir -m 777 $1/tpl
mkdir -m 777 $1/php

# Creamos el archivo "index.php" e inyectamos el contenido desde el primer parámetro
echo "$contenido" > $1/index.php

# Creamos los demás archivos dentro de los directorios (código omitido)

# Mensaje de confirmación
echo "Estructura de directorios y archivos creada con éxito."
