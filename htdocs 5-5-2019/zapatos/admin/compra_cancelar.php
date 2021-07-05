<?php require_once('../Connections/conexionzapatos.php'); ?>
<?php ActualizacionEstadoCarrito($_GET["recordID"], 2);?>
<?php    
	$contenido = 'Hola xxxxx;<br><br>Tu compra ha sido cancelada. Contacta con nosotros para cualquier problema<br>';
	$asunto = 'Compra cancelada en tiendazapatos.com';
	EnvioCorreoHTML(ObtenerMailUsuario($_GET['usuario']), $contenido, $asunto)
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
    <h1>Compra Cancelada</h1>
    <p><a href="compras_edit.php?recordID=<?php echo $_GET["recordID"]; ?>">Volver</a></p>
  <!-- InstanceEndEditable -->
   
    <!-- end .content --></div>
  <div class="footer">
    <p>Administracion Tienda Zapatos</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>
