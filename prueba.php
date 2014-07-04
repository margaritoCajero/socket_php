<?php
require_once('encript.php');
$encriptation=new encript();// instanciamos el encript para poder hacer uso de sus metodos posteriormente
$palabra=$encriptation->encriptar("hola Jaguar");
echo($palabra);
?>