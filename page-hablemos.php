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

	if (isset($nombre) AND isset($email)) {
		header("Location: $url");
		die();
	}else {
		$url = get_home_url();
	}

}else {
	$url = get_home_url();
}
