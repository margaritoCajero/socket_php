<?php
// galamos loa argumentos de la terminal con la variable reservada $argv..
array_shift($argv);// pasamos el $argv por el array_shift para quitar el primer elemento del arreglo ya que este trae la direccion de la web y no la necesitamos.
$cadena=implode(" ",$argv);// pasamos la variable reservada por implode para obtener cada elemento de el array seoarado por espacio y unirlo en una cadena para posterior mente mandarlo a el server
//$cadena=md5("hola mundo");
//especifica el servidor al cual se va a acceder - 127.0.0.1(local)
$host=array("127.0.0.1","","","");// creamos el array para que se conecte a diferentes ip de los server sea el caso que sea.
 
$socket=socket_create(AF_INET,SOCK_STREAM,SOL_TCP);// con el metodo socket_create crea el socket y lo devuelbe
 
//puerto de comunicacion que usara el socket
$puerto=4545;
 
/*con socket_connect se inicia una conexión hacia el $host esecificado*/
$conexion=socket_connect($socket,$host[0],$puerto);// en vez de la posicion cero se cambiara por un rand del o al 3
 
$tamaño=2048;// tamaño de el socket 
if($conexion){
    echo "Conexion Exitosa, puerto ".$puerto."\n\n";
    $buffer="".$cadena."\r\n"; //(".$host[0].") Mensaje que se envia al servidor con el mensaje que le pasamos en la terminal
    $salida='';// declaramos salida para posteriormente presentar la respuesta de el server
    //buffer->trabaja con almacenamiento de memoria
    socket_write($socket,$buffer);// escribimos lo que enviaemos a el server
 
    while($salida=socket_read($socket,$tamaño)){// pesentamos el mensaje
        echo "</br>".$salida;
    }
 
    }else{
    echo "\n la conexion no se a podido realizar, puerto: ".$puerto;
    }
 
socket_close($socket); //cierra el recurso socket dado por $socket
?>