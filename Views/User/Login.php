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
		<form action="http://localhost/cryptoverse/?controller=user&action=signin" method="POST">
			<h2>Login</h2>
			<?php if(isset($_SESSION['error_login'])) : ?>
	            <li class="error"><?= $_SESSION['error_login']; ?></li>
			<?php endif; ?>
			<input type="text" name="username" placeholder="Usuario">
			<input type="number" name="dni" placeholder="Dni">
			<input type="password" name="password" placeholder="Contraseña">
			<button>Ingresar</button>
			<h3><input type="checkbox" checked> Acepto los <a href="#">términos y condicines</a></h3>
			<h3>¿No tiene cuenta? <a href="http://localhost/cryptoverse/?controller=user&action=register">Registrese acá</a></h3>
		</form>


	</section>

	<img src="<?= base_url ?>/Assets/Img/BannerForm.jpg" alt="Cascada">
	
</body>
</html>