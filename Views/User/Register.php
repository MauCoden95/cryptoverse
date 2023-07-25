<?php
	require_once('Config/Parameters.php');

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url ?>/Assets/StylesLoginRegister.css">
    <!-- Lineicons CSS -->
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
	<title>CryptoVerse</title>
</head>
<body>
	<section id="form_section">
		<a href="http://localhost/cryptoverse/">
			<img src="<?= base_url ?>/Assets/Img/Logo.png" alt="Logo">
		</a>
		<form action="#" method="POST">
			<h2>Registro</h2>
			<input type="text" placeholder="Nombre completo">
			<input type="text" placeholder="Apellidos">
			<input type="text" placeholder="Usuario">
			<input type="email" placeholder="Correo electrónico">
			<input type="text" placeholder="Dirección">
			<input type="text" placeholder="Ciudad">
			<input type="text" placeholder="Dni">
			<input type="number" placeholder="Teléfono">
			<button>Registrarse</button>
			<h3>¿Ya tiene cuenta? <a href="">Ingrese acá</a></h3>
		</form>


	</section>

	<img src="<?= base_url ?>/Assets/Img/BannerForm.jpg" alt="Cascada">
	
</body>
</html>