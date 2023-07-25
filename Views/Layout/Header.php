<?php
	require_once('Config/Parameters.php');

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url ?>/Assets/Styles.css">
    <!-- Lineicons CSS -->
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />

    <!--Swiper JS-->
    <link
	  rel="stylesheet"
	  href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
	/>
	<title>CryptoVerse</title>
</head>
<body>
	<header id="header">
		<div class="center">
			<a href="http://localhost/cryptoverse/">
				<img src="<?= base_url ?>/Assets/Img/Logo.png">
			</a>

			<nav>
				<ul>
					<li><a href="">Comprar cryptos</a></li>
					<li><a href="">Nosotros</a></li>
					<li><a href="">¿Cómo empezar?</a></li>
					<li><a href="">Trading</a></li>
					<li><a href="">Contacto</a></li>
				</ul>
			</nav>

			<a href="http://localhost/cryptoverse/?controller=user&action=register" class="register_link"><i class="lni lni-users"></i> Registro</a>
		</div>
	</header>