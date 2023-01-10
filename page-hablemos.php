<?php
/**
 * Template Name: Hablemos
 * Description: A Page Template with a darker design.
 */

if (!empty($_POST))
{
	$vendedor = $_POST['vendedor'];
	$titulo = $_POST['titulo'];
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];

	$whatsapp = array("+56953768917", "+56935421429", "+56935831178");
	$numero = array_rand($whatsapp);

	if (empty($vendedor)) {
		$vendedor = $whatsapp[$numero];
	}

	$url = "https://wa.me/".$vendedor."?text=Hola quiero cotizar: '".$titulo."' en CreaPublicidad%0D%0AMi Nombre es: $nombre%0D%0AMi Email es: $email%0D%0AGracias.";

	$data = array(
		'nombre' => $nombre,
		'email' => $email,
		'titulo' => $titulo,
		'fuente' => 'WhatsApp Producto Web',
	);

	$options = array(
		'http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($data),
		),
	);

	$context  = stream_context_create($options);

	$result = file_get_contents('https://hook.us1.make.com/mod9eosu2g99hji0nrc1fayhamx11d78', false, $context);


}else {
	$url = get_home_url();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>WhatsApp Producto We</title>
	<meta charset="UTF-8" />
	<meta http-equiv="refresh" content="0; URL=<?php echo $url; ?>" />
	<!-- Google Tag Manager for WordPress by gtm4wp.com -->
	<script data-cfasync="false" data-pagespeed-no-defer>
		var gtm4wp_datalayer_name = "dataLayer";
		var dataLayer = dataLayer || [];
	</script>
	<!-- End Google Tag Manager for WordPress by gtm4wp.com -->
	<!-- GTM Container placement set to automatic -->
	<script data-cfasync="false" data-pagespeed-no-defer type="text/javascript">
		var dataLayer_content = {"pagePostType":"page","pagePostType2":"single-page","pagePostAuthor":"creapublicidad"};
		dataLayer.push( dataLayer_content );
	</script>
	<script data-cfasync="false">
		(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
				new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'//www.googletagmanager.com/gtm.'+'js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-KBTP3N7');
	</script>
	<!-- End Google Tag Manager -->
</head>
<body>
<?php if (isset($nombre) AND isset($email)): ?>
	<script>
		localStorage.setItem('Vendedor', '<?php echo $vendedor; ?>');
		localStorage.setItem('Nombre', '<?php echo $nombre; ?>');
		localStorage.setItem('Email', '<?php echo $email; ?>');
	</script>
<?php endif ?>
</body>
</html>
