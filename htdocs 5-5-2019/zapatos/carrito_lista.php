<?php require_once('Connections/conexionzapatos.php'); ?>
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

$varUsuario_DatosCarrito = "0";
if (isset($_SESSION["MM_IdUsuario"])) {
  $varUsuario_DatosCarrito = $_SESSION["MM_IdUsuario"];
}
mysql_select_db($database_conexionzapatos, $conexionzapatos);
$query_DatosCarrito = sprintf("SELECT * FROM tblcarrito WHERE tblcarrito.idUsuario = %s AND tblcarrito.intTransaccionEfectuada = 0", GetSQLValueString($varUsuario_DatosCarrito, "int"));
$DatosCarrito = mysql_query($query_DatosCarrito, $conexionzapatos) or die(mysql_error());
$row_DatosCarrito = mysql_fetch_assoc($DatosCarrito);
$totalRows_DatosCarrito = mysql_num_rows($DatosCarrito);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/Principal.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Documento sin título</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<link href="estilo/principal.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="container">
  <div class="header"><div class="headerinterior"><img src="images/logo2.jpg" width="188" height="97" alt="Tienda Zapatos" /></div></div>
  <div class="subcontenedor">
              <div class="sidebar1">
               <?php include("includes/catalogo.php"); ?>
<!-- end .sidebar1 --></div>
              <div class="content">
                <h1><!-- InstanceBeginEditable name="Titulo" -->Carrito de la compra<!-- InstanceEndEditable --></h1>
                <!-- InstanceBeginEditable name="EditRegion4" -->
                <?php if ($totalRows_DatosCarrito > 0) { // Show if recordset not empty ?>
                <a href="carrito_eliminar_todo.php">Vaciar</a> tu carrito de la compra.<br /><br />

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
                    <td>Producto</td>
                    <td>Unidades</td>
                    <td>Precio</td>
                    <td>Acciones</td>
                  </tr>
                  <?php $preciototal = 0;?>
                  <?php do { ?>
                  <tr>
                    <td><?php echo ObtenerNombreProducto($row_DatosCarrito['idProducto']); ?></td>
                    <td><?php echo $row_DatosCarrito['intCantidad']; ?></td>
                    <td><?php echo ObtenerPrecioProducto($row_DatosCarrito['idProducto']); ?> Euros</td>
                    <td><a href="carrito_eliminar.php?recordID=<?php echo $row_DatosCarrito['intContador']; ?>">Eliminar</a></td>
                  </tr>
                  <?php   $preciototal = $preciototal + ObtenerPrecioProducto($row_DatosCarrito['idProducto']);?>
                  <?php } while ($row_DatosCarrito = mysql_fetch_assoc($DatosCarrito)); ?>
                  <tr>
                    <td>&nbsp;</td>
                    <td align="right">Subtotal:</td>
                    <td><?php echo $preciototal; ?> Euros</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td align="right">IVA:</td>
                    <td><?php echo ObtenerIVA(); ?>%</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td align="right">Valor del IVA:</td>
                    <td><?php 
		  $multiplicador =  ObtenerIVA()/100;
		  $valordelIVA = $preciototal * $multiplicador;
		  echo $valordelIVA;?> Euros</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td align="right">Total con IVA:</td>
                    <td><?php 
		  $multiplicador =  (100 + ObtenerIVA())/100;
		  $valorconIVA = $preciototal * $multiplicador;
		  $_SESSION["TotalCompra"] = $valorconIVA;
		  echo $valorconIVA;?> Euros</td>
                    <td>&nbsp;</td>
                  </tr>
              </table>
                <a href="carrito_forma_pago.php">Seleccionar Forma de Pago</a>
                  <?php } // Show if recordset not empty ?>
                  <?php if ($totalRows_DatosCarrito == 0) { // Show if recordset empty ?>
                    Tu carrito esta vacio.
  <?php } // Show if recordset empty ?>
                <!-- InstanceEndEditable --><!-- end .content --></div>
    <!-- end .subcontenedor -->
    </div>
  <div class="footer">
    <p>Pie de pagina</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($DatosCarrito);
?>
