<?php
require_once('encript.php');
//$encriptation=new encript();// instanciamos el encript para poder hacer uso de sus metodos posteriormente

/*socket_create=>Crea y devuelve un recurso socket*/
$socket=socket_create(AF_INET,SOCK_STREAM,0);
 

$direccion=0;// con el cero le decimos que ba aseptar cualquier ip 
 
$puerto=4545;// puerto por el cual nos estaremos comunicando. los puertos menores ha 1025 por lo general estan ocupados por demas aplicaciones el sistema 
 
/*socket_bind=>Vincula el nombre dado en $direccion al socket descrito por $socket.
Esto tiene que ser hecho antes de establecer una conexión
usando socket_connect() o socket_listen().*/
socket_bind($socket, $direccion,$puerto);
 
/*socket_listen=>Después de que el socket socket haya sido creado usando socket_create()
y vinculado a un nombre con socket_bind(), se le puede indicar
que escuche conexiones entrantes sobre socket.*/
socket_listen($socket);
$encriptation=new encript();// instanciamos la clase encript para poder hacer uso de sus metodos posteriormente

/*Mientras sea verdadero se ejecuta, quiere decir que
siempre estara a la espera*/
 
$tamaño=2048;
while(true){
	
    $cliente=socket_accept($socket);
    $buffer=socket_read($cliente, $tamaño); //leemos mensaje del cliente
	$palabra=$encriptation->encriptar($buffer);//enviamos a encriptar el mensaje que llego atrabes de el socket
    socket_write($cliente, $palabra); //escribimos el buffer
    socket_close($cliente); //cerramos cliente
}
socket_close($socket);// cerramos el socket
?>