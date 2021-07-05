<?php require_once('Connections/conexionzapatos.php'); ?>
<?php

$total = number_format($_SESSION["TotalCompra"], 2, ".", "");
$total= $total *100; 

echo "M978".$total."\r\n1\r\nZAPATOS\r\nProductos Zapatos\r\n1\r\n".$total;

?>
