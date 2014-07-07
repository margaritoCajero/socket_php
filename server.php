<?php
require_once('encript.php');
/*socket_create=>Creates and returns a socket resource*/
$socket=socket_create(AF_INET,SOCK_STREAM,0);
 

$address=0;// with zero we say we aseptar any ip ba 
 
$port=4545;// port through which we will be communicating. 1025 has minor ports usually are occupied by other system applications
 $puerto_envio=8000;
/*socket_bind=>Binds the name given in $address the socket described by $socket.
this has to be done before establishing a connection
using socket_connect() o socket_listen().*/
socket_bind($socket,$address,$port);
 
/*socket_listen=>After the socket socket has been created using socket_create()
and linked to a name socket_bind(), you can indicate
listen for incoming connections on socket.*/
$socket1=socket_create(AF_INET,SOCK_STREAM,0);
$address_server="127.0.0.1";
$small_socket=2048;//socket size
//socket_bind($socket1,$direccion_server,$puerto);
$Connect=socket_connect($socket1,$address_server,$puerto_envio);
if($Connect){
    echo "Successful Connection, port ".$puerto_envio."\n\n";
    $buffer="".$address_server."the port".$puerto_envio."\r\n"; //(".$host[0].") Message to be sent to the server with the message that you passed to the terminal
    //buffer->works with memory storage
    socket_write($socket1,$buffer);// write what enviaemos on server
    }else{
    echo "\n the connection is not able to make port: ".$puerto_envio;
    }
socket_listen($socket);// put the socket in listening mode
$encriptation=new encript();// encrypt instantiate the class to use its methods later
 

while(true){// while this is true of run to do that is always listening and perform the process
	
    $cliente=socket_accept($socket);
    $buffer=socket_read($cliente, $small_socket); //read client message
	$word=$encriptation->encriptar($buffer);//send to encrypt the message that came through the socket
    socket_write($cliente, $word); //write the buffer
    socket_close($cliente); //close customer
}


socket_close($socket);// close socket
?>