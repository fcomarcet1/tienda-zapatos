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
                <h1><!-- InstanceBeginEditable name="Titulo" -->Finalizaci&oacute;n de Pago<!-- InstanceEndEditable --></h1>
                <!-- InstanceBeginEditable name="EditRegion4" -->
<?php if ($_POST["radio"] == 2)
	  { 
	  ConfirmacionPago($_POST["radio"]);
	  ?>
                <p>Has elegido pago por transferencia.</p>
                <p>Deber&aacute;s remitirnos un email con el justificante de pago a zapatos@zapatos.com, realizado a este n&uacute;mero de cuenta:</p>
                <p>IBAN: 12341234123412341234</p>
                
<?php    
	$contenido = 'Hola xxxxx;<br><br>Deber&aacute;s remitirnos un email con la certificaci&oacute;n de tu pago a zapatos@zapatos.com, realizado a este n&uacute;mero de cuenta:<br><p>IBAN: 12341234123412341234</p>';
	$asunto = 'Compra realizada en tiendazapatos.com';
	EnvioCorreoHTML(ObtenerMailUsuario($_SESSION['MM_IdUsuario']), $contenido, $asunto)
?>                <?php }?>



<?php if ($_POST["radio"] == 3)
	  { 
	  ConfirmacionPago($_POST["radio"]);
	  ?>
                <p>Has elegido pago por Tarjeta de credito/debito.</p>
        <p>Haz click aqui para Efectuar el pago seguro con tarjeta.</p>

<form id="form2" name="form2" method="post" action="https://tpv2.4b.es/simulador/teargral.exe">
	     <input name="order" type="hidden" id="order" value="<?php echo $_SESSION["compraactivavisa"]; ?>" />
	     <input name="store" type="hidden" id="store" value="PV00002287633" />                        
         <input type="submit" name="button3" id="button3" value="Confirmar Pago por Tarjeta" />
</form>                
                
<?php }?>


<?php if ($_POST["radio"] == 1)
	  { 
	  ConfirmacionPago($_POST["radio"]);
	  ?>
                <p>Has elegido pago por PayPal.</p>
        <p>Haz click aqui para Efectuar el pago seguro con PayPal.</p>

       <FORM action="https://www.paypal.com/cgi-bin/webscr" method="post" id="paypal_form">
	<input type="hidden" name="upload" value="1" />
	<input type="hidden" name="amount" value="<?php echo $_SESSION["TotalCompra"]; ?>" />
	<input type="hidden" name="business" value="cuentabusiness@zapatos.com" />
	<input type="hidden" name="receiver_email" value="cuentabusiness@zapatos.com" />
	<input type="hidden" name="cmd" value="_xclick" />
	<input type="hidden" name="charset" value="utf-8" />
	<input type="hidden" name="currency_code" value="EUR" />
	<input type="hidden" name="item_name" value="Compra en la Web de TiendaZapatos.com " />
	<input type="hidden" name="payer_id" value="<?php echo $_SESSION['MM_IdUsuario']; ?>" />
	<input type="hidden" name="payer_email" value="<?php echo ObtenerMailUsuario($_SESSION['MM_IdUsuario']); ?>" />
	<input type="hidden" name="return" 
	value="http://www.tiendazapatos.com/carrito_ok.php?control=<?php echo $_SESSION["compraactivavisa"]; ?>" />
	<input type="hidden" name="cancel_return" 
	value="http://www.tiendazapatos.com/carrito_ko.php?control=<?php echo $_SESSION["compraactivavisa"]; ?>" />
  	<input type="hidden" name="rm" value="2" />
	<input type="hidden" name="bn" value="PRESTASHOP_WPS" />
	<input type="hidden" name="cbt" value="Volver a www.tiendazapatos.com" />

        
        <input type="image" src="https://www.paypal.com/es_ES/ES/i/btn/btn_xpressCheckout.gif" name="image">
        </FORM>
                
<?php }?>

                <!-- InstanceEndEditable --><!-- end .content --></div>
    <!-- end .subcontenedor -->
    </div>
  <div class="footer">
    <p>Pie de pagina</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>
