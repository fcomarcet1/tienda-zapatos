<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}


//***************************************************
//***************************************************
//***************************************************

function ObtenerNombreUsuario($identificador)
{

	global $database_conexionzapatos, $conexionzapatos;
	mysql_select_db($database_conexionzapatos, $conexionzapatos);
	$query_ConsultaFuncion = sprintf("SELECT tblusuario.strNombre FROM tblusuario WHERE tblusuario.idUsuario = %s", $identificador);
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion, $conexionzapatos) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['strNombre']; 
	mysql_free_result($ConsultaFuncion);
}

//***************************************************
//***************************************************
//***************************************************

function ObtenerMailUsuario($identificador)
{

	global $database_conexionzapatos, $conexionzapatos;
	mysql_select_db($database_conexionzapatos, $conexionzapatos);
	$query_ConsultaFuncion = sprintf("SELECT tblusuario.strEmail FROM tblusuario WHERE tblusuario.idUsuario = %s", $identificador);
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion, $conexionzapatos) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['strEmail']; 
	mysql_free_result($ConsultaFuncion);
}

//***************************************************
//***************************************************
//***************************************************

function ObtenerNombreProducto($identificador)
{

	global $database_conexionzapatos, $conexionzapatos;
	mysql_select_db($database_conexionzapatos, $conexionzapatos);
	$query_ConsultaFuncion = sprintf("SELECT strNombre FROM tblproducto WHERE idProducto = %s", $identificador);
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion, $conexionzapatos) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['strNombre']; 
	mysql_free_result($ConsultaFuncion);
}

//***************************************************
//***************************************************
//***************************************************

function ObtenerPrecioProducto($identificador)
{

	global $database_conexionzapatos, $conexionzapatos;
	mysql_select_db($database_conexionzapatos, $conexionzapatos);
	$query_ConsultaFuncion = sprintf("SELECT dblPrecio FROM tblproducto WHERE idProducto = %s", $identificador);
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion, $conexionzapatos) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['dblPrecio']; 
	mysql_free_result($ConsultaFuncion);
}

//***************************************************
//***************************************************
//***************************************************

function ObtenerIVA()
{

	global $database_conexionzapatos, $conexionzapatos;
	mysql_select_db($database_conexionzapatos, $conexionzapatos);
	$query_ConsultaFuncion = "SELECT intIVA FROM tblvariables WHERE idContador = 1";
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion, $conexionzapatos) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	
	return $row_ConsultaFuncion['intIVA']; 
	mysql_free_result($ConsultaFuncion);
}

//***************************************************
//***************************************************
//***************************************************

function ActualizacionCarrito($varcompra)
{
	
	global $database_conexionzapatos, $conexionzapatos;
	$updateSQL = sprintf("UPDATE tblcarrito SET intTransaccionEfectuada=%s WHERE idUsuario=%s AND intTransaccionEfectuada = 0",
                       $varcompra,$_SESSION['MM_IdUsuario']);
  mysql_select_db($database_conexionzapatos, $conexionzapatos);
  $Result1 = mysql_query($updateSQL, $conexionzapatos) or die(mysql_error());

}

//***************************************************
//***************************************************
//***************************************************

function ActualizacionEstadoCarrito($varcompra, $varestado)
{
	
	global $database_conexionzapatos, $conexionzapatos;
	$updateSQL = sprintf("UPDATE tblcompra SET intEstado=%s WHERE idCompra = %s",
                       $varestado,$varcompra);
  mysql_select_db($database_conexionzapatos, $conexionzapatos);
  $Result1 = mysql_query($updateSQL, $conexionzapatos) or die(mysql_error());

}

//***************************************************
//***************************************************
//***************************************************

function ConfirmacionPago($tipopago)
{

	global $database_conexionzapatos, $conexionzapatos;
	mysql_select_db($database_conexionzapatos, $conexionzapatos);
	
	$insertSQL = sprintf("INSERT INTO tblcompra (idUsuario, fchCompra, intTipoPago, dblTotal) VALUES (%s, NOW(), %s, %s)",
                       GetSQLValueString($_SESSION['MM_IdUsuario'], "int"),
					   $tipopago,
					   $_SESSION["TotalCompra"]);
  $Result1 = mysql_query($insertSQL, $conexionzapatos) or die(mysql_error());
  $ultimacompra = mysql_insert_id();
  ActualizacionCarrito($ultimacompra);
}

//***************************************************
//***************************************************
//***************************************************

function EnvioCorreoHTML($destinatario, $contenido, $asunto)
{

	$mensaje = '<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<table width="100%" border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td><img src="images/logo1.png" width="318" height="65" /></td>
  </tr>
  <tr>
    <td><p>Estimado Cliente:</p>
    <p>';
	$mensaje.= $contenido;
	$mensaje.='</p></td>
  </tr>
  <tr>
    <td>Muchas gracias, puede contactarnos a través de nuestro correo electrónico:<br />      <a href="mailto:info@tiendazapatos.com">info@tiendazapatos.com</a></td>
  </tr>
</table>
</body>
</html>';

	// Para enviar correo HTML, la cabecera Content-type debe definirse
	$cabeceras  = 'MIME-Version: 1.0' . "\n";
	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
	// Cabeceras adicionales
	$cabeceras .= 'From: info@tiendazapatos.com' . "\n";
	$cabeceras .= 'Bcc: info@tiendazapatos.com' . "\n";
	
	// Enviarlo
	mail($destinatario, $asunto, $mensaje, $cabeceras);
	echo $mensaje;
	
}

//***************************************************
//***************************************************
//***************************************************

function TextoFormaPago($vartipopago)
{
	if ($vartipopago == 1) return "PayPal";
	if ($vartipopago == 2) return "Transferencia";
	if ($vartipopago == 3) return "VISA/Mastercard";
	
}

//***************************************************
//***************************************************
//***************************************************

function TextoEstadoCompra($varestado)
{
	if ($varestado == 0) return "Pendiente";
	if ($varestado == 1) return "Pagado y enviado";
	if ($varestado == 2) return "Compra cancelada";
	
}

function Mostrar_Carrito_Usuario($identificador)
{

	global $database_conexionzapatos, $conexionzapatos;
	mysql_select_db($database_conexionzapatos, $conexionzapatos);
	$query_ConsultaFuncion = sprintf("SELECT * FROM tblcarrito WHERE intTransaccionEfectuada = %s", $identificador);
	$ConsultaFuncion = mysql_query($query_ConsultaFuncion, $conexionzapatos) or die(mysql_error());
	$row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysql_num_rows($ConsultaFuncion);
	?>
    <div class="subproductos">
    <?php

	do { 
	echo ObtenerNombreProducto($row_ConsultaFuncion['idProducto']); 
	echo "<br>";
    
	} while ($row_ConsultaFuncion = mysql_fetch_assoc($ConsultaFuncion));
	?>
    </div>
    <?php


	mysql_free_result($ConsultaFuncion);
}

?>