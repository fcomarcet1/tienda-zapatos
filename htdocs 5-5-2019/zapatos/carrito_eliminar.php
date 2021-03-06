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

if (isset($_GET['recordID'])) {
  $deleteSQL = sprintf("DELETE FROM tblcarrito WHERE intContador=%s",
                       GetSQLValueString($_GET['recordID'], "int"));

  mysql_select_db($database_conexionzapatos, $conexionzapatos);
  $Result1 = mysql_query($deleteSQL, $conexionzapatos) or die(mysql_error());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/Principal.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Documento sin t?tulo</title>
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
                <h1><!-- InstanceBeginEditable name="Titulo" -->Eliminando del carrito<!-- InstanceEndEditable --></h1>
                <!-- InstanceBeginEditable name="EditRegion4" -->Producto Eliminado. <a href="carrito_lista.php">Vuelva a su carrito de la compra.</a><!-- InstanceEndEditable --><!-- end .content --></div>
    <!-- end .subcontenedor -->
    </div>
  <div class="footer">
    <p>Pie de pagina</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>
