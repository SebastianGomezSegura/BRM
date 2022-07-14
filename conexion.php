<?php
$serverName = "SEBASTIAN"; 
$connectionInfo = array( "Database"=>"PRUEBA");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Conexion exitosa.<br />";
}else{
     echo "No se puede conectar.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>