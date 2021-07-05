<?php require_once('Connections/conexionzapatos.php'); ?>
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
                <h1><!-- InstanceBeginEditable name="Titulo" -->Seleccionar la Forma de Pago<!-- InstanceEndEditable --></h1>
                <!-- InstanceBeginEditable name="EditRegion4" -->
                <p>Elije la forma de pago:</p>
                <form id="form1" name="form1" method="post" action="carrito_finalizacion.php">
                  <p>
                  <input name="radio" type="radio" id="radio" value="1" checked="checked" />
                  <label for="radio">PayPal</label><br />
 <input type="radio" name="radio" id="radio" value="2" />
                  <label for="radio">Transferencia</label>
                  <br />
 <input type="radio" name="radio" id="radio" value="3" />
                  <label for="radio">VISA/Mastercard</label>
                  </p>
                  <p>
                    <input type="submit" name="button" id="button" value="Pagar" />
                  </p>
                  <p>&nbsp;</p>
                </form>
                <p>&nbsp;</p>
                <!-- InstanceEndEditable --><!-- end .content --></div>
    <!-- end .subcontenedor -->
    </div>
  <div class="footer">
    <p>Pie de pagina</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>
