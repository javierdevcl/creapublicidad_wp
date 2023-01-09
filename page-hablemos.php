<?php
/**
 * Template Name: Hablemos
 * Description: A Page Template with a darker design.
 */

if (!empty($_POST))
{
	$titulo = $_POST['titulo'];
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];

	$whatsapp = array("+56953768917", "+56935421429", "+56935831178");
	$numero = array_rand($whatsapp);

	$url = "https://wa.me/".$whatsapp[$numero]."?text=Hola quiero cotizar: '".$titulo."' en CreaPublicidad%0D%0AMi Nombre es: $nombre%0D%0AMi Email es: $email%0D%0AGracias.";

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
</head>
<body>
<?php if (isset($nombre) AND isset($email)): ?>
	<script>
		localStorage.setItem('Nombre', '<?php echo $nombre; ?>');
		localStorage.setItem('Email', '<?php echo $email; ?>');
	</script>
<?php endif ?>
</body>
</html>
