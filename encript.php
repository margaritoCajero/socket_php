<?php
class encript{
public function encriptar($cadena){
echo($cadena);
$antes = array('a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U',);// arreglos para remplasar
$despues = array('#', '%', '$', '&', '#1', '&#', '&', '23', '&O', 'hR');
$onlyconsonants = str_replace($antes, $despues, $cadena);//remplasamos
//var_dump($onlyconsonants);
$remplasadas = explode(" ", (string)$onlyconsonants);//combertimos en arreglo
$reverse = array_reverse($remplasadas, true);//volteamos el arreglo
$mensaje_emcriptado=implode(",*¡¿?",$reverse);//bolbemos ha acerlo cadena poniendole ,*¡¿? entre cada palabra
$palabra=$mensaje_emcriptado;
echo($palabra);
return $palabra;
}
}

?>