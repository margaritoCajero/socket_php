<?php
// we pulled the arguments of the terminal with the reserved Variable $argv..
array_shift($argv);//spent the $ argv by array_shift to remove the first element of the array as this brings the direction of the web and do not need it.
$word=implode(" ",$argv);// spent by implode reserved variable for each element of the array seoarado for space and attach a string to send back to the server mind
//$cadena=md5("hola mundo");
//specific server to which you are accessing - 127.0.0.1(local)
//$host=array("127.0.0.1","10.0.0.153","","");create the array to connect to different IP of the server that is the case.
$host[0] = array("127.0.0.1", "4545");
$host[1] = array("10.0.0.153", "3535");
$host[2] = array("10.0.0.195", "8000");
$host[3] = array("10.0.0.152", "7000");
$socket=socket_create(AF_INET,SOCK_STREAM,SOL_TCP);// socket_create the method creates the socket and returns
 
//communication port to use the socket
$address=0;//rand(0,3);
//$puerto=4545;
 
/*socket_connect with a connection to the specified host starts */
$Connect=socket_connect($socket,$host[$address][0],$host[$address][1]);// instead of the zero position is changed by a rand (0.3) o-3
 
$tamano_socket=2048;// socket size 
if($Connect){
    echo "Successful connection port ".$host[$address][1]."\n\n";
    $buffer="".$word.",\r\n"; //(".$host[0].") Message to be sent to the server with the message that you passed to the terminal
    $exit='';// declare exit then present the response of the server
    //buffer->works with memory storage
    socket_write($socket,$buffer);//write what you send to the server
 
    while($exit=socket_read($socket,$tamano_socket)){// present the message
        echo "</br>".$exit;
    }
 
    }else{
    echo "\n the connection is not able to make port: ".$host[$address][1];
    }
 
socket_close($socket); //closes the socket  resource given by $socket.
?>