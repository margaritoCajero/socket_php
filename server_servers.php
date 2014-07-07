<?php
//$socket=socket_create(AF_INET,SOCK_STREAM,0);
set_time_limit (0);
$socket=stream_socket_server("tcp://127.0.0.1:8000", $errno, $errstr);

$connected_clients=array();// declare the array to store the connected clients.

while(true){// always be running
	$client = $connected_clients;
    $client[] = $socket;// keep the socket on customers under
if(in_array($socket, $client))//in_array looking with the new socket clients to see if there is any incoming
    {
$incoming_client = stream_socket_accept($socket);//accept the new incoming client
if ($incoming_client)
        {
            //print the new client IP
            echo 'A new customer I connect to the address: ' . stream_socket_get_name($incoming_client, true) . " \n";
             
            $connected_clients[] = $incoming_client;
            echo "currently there ". count($connected_clients) . " connected clients. \n\n";
        }
		        unset($client[ array_search($socket, $client) ]);//removed with unset the socket that reads array_serch customers by looking through the key value.
		}
		foreach($client as $sock)//spent by reading freach arrangement
    {
        $data = fread($sock, 200);// the file (socket) open while the size is greater than the.
        if(!$data)// if there had not been the if
        {
            //Remove the client to disconnect customers fix
			unset($connected_clients[ array_search($sock, $connected_clients)]);//unset eliminated with the client that no longer exists fix customers
            fclose($sock);//close the socket
            echo "a client has disconnected. there are ". count($connected_clients) . " clients \n";
            continue;
        }
    }
         
}
/*$direccion=0;
$puerto=8000;
socket_bind($socket,$direccion,$puerto);
socket_listen($socket);
$tamano_socket=2048;
//$cliente1=array[];
while(true){// mientras sea verdadero de ejecutara esto lo hacemos para que siempre este escuchando y aga el proceso 
	//string_select
    $cliente=socket_accept($socket);
    $buffer=socket_read($cliente, $tamano_socket); //leemos mensaje del cliente
	echo "conexion entrante del servidor ".$buffer;
    socket_write($cliente, $buffer); //escribimos el buffer
    socket_close($cliente); //cerramos cliente
}
socket_close($socket);// cerramos el socket
*/
?>