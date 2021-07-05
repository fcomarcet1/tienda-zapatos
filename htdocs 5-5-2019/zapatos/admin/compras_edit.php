<?php require_once('../Connections/conexionzapatos.php'); ?>
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

$varCompra_Datoscompra = "0";
if (isset($_GET["recordID"])) {
  $varCompra_Datoscompra = $_GET["recordID"];
}
mysql_select_db($database_conexionzapatos, $conexionzapatos);
$query_Datoscompra = sprintf("SELECT * FROM tblcompra WHERE tblcompra.idCompra = %s", GetSQLValueString($varCompra_Datoscompra, "int"));
$Datoscompra = mysql_query($query_Datoscompra, $conexionzapatos) or die(mysql_error());
$row_Datoscompra = mysql_fetch_assoc($Datoscompra);
$totalRows_Datoscompra = mysql_num_rows($Datoscompra);

$varCarrito_ProductosCompra = "0";
if (isset($_GET["recordID"])) {
  $varCarrito_ProductosCompra = $_GET["recordID"];
}
$varUsuario_ProductosCompra = "0";
if (isset($row_Datoscompra['idUsuario'])) {
  $varUsuario_ProductosCompra = $row_Datoscompra['idUsuario'];
}
mysql_select_db($database_conexionzapatos, $conexionzapatos);
$query_ProductosCompra = sprintf("SELECT tblproducto.strNombre, tblproducto.dblPrecio, tblcarrito.intCantidad FROM tblcarrito Inner Join tblproducto ON tblcarrito.idProducto = tblproducto.idProducto WHERE tblcarrito.intTransaccionEfectuada =  %s AND tblcarrito.idUsuario =  %s", GetSQLValueString($varCarrito_ProductosCompra, "int"),GetSQLValueString($varUsuario_ProductosCompra, "int"));
$ProductosCompra = mysql_query($query_ProductosCompra, $conexionzapatos) or die(mysql_error());
$row_ProductosCompra = mysql_fetch_assoc($ProductosCompra);
$totalRows_ProductosCompra = mysql_num_rows($ProductosCompra);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/BaseAdmin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Administracion Principal Tienda Zapatos</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<link href="../estilo/twoColFixLtHdr.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="container">
  <div class="header"><img src="../images/logo2.jpg" width="185" height="65" alt="Administracion" />
   </div>
  <div class="sidebar1">
<?php include("../includes/cabeceraadmin.php");
?>
    
    <!-- end .sidebar1 --></div>
  <div class="content"><!-- InstanceBeginEditable name="Contenido" -->
    <h1>Consultar Compra</h1>
    <p>Nombre: <?php echo ObtenerNombreUsuario($row_Datoscompra['idUsuario']); ?><br />
      Fecha: <?php echo $row_Datoscompra['fchCompra']; ?><br />
      Forma de Pago: <?php echo TextoFormaPago($row_Datoscompra['intTipoPago']); ?><br />
    Total: <?php echo $row_Datoscompra['dblTotal']; ?></p>
    <p>Estado Actual de la compra: <?php echo TextoEstadoCompra($row_Datoscompra['intEstado']); ?><br />
      <a href="compra_cancelar.php?recordID=<?php echo $row_Datoscompra['idCompra']; ?>&usuario=<?php echo $row_Datoscompra['idUsuario']; ?>">Cancelar Compra</a><br />
    <a href="compra_aceptar.php?recordID=<?php echo $row_Datoscompra['idCompra']; ?>&usuario=<?php echo $row_Datoscompra['idUsuario']; ?>">Compra Confirmada</a></p>
    <p>Productos: </p>
    <table width="100%" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td bgcolor="#009966">Producto</td>
        <td bgcolor="#009966">Precio</td>
        <td bgcolor="#009966">Cantidad</td>
      </tr>
      <?php do { ?>
        <tr>
          <td><?php echo $row_ProductosCompra['strNombre']; ?></td>
          <td><?php echo $row_ProductosCompra['dblPrecio']; ?></td>
          <td><?php echo $row_ProductosCompra['intCantidad']; ?></td>
        </tr>
        <?php } while ($row_ProductosCompra = mysql_fetch_assoc($ProductosCompra)); ?>
    </table>
    <p><br />
    </p>
  <!-- InstanceEndEditable -->
   
    <!-- end .content --></div>
  <div class="footer">
    <p>Administracion Tienda Zapatos</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($Datoscompra);

mysql_free_result($ProductosCompra);
?>
