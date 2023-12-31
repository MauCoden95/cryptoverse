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
		<form action="http://localhost/cryptoverse/?controller=user&action=create" method="POST" autocomplete="off">
			<h2>Registro</h2>
			<?php if(isset($_SESSION['errors'])) : ?>
	            <div>
	                <ul>
	                    <?php foreach($_SESSION['errors'] as $error) :  ?>
	                        <li class="error"><?= "*".$error; ?></li>
	                    <?php endforeach; ?>
	                </ul>
	            </div>

	        <?php elseif(isset($_SESSION['register'])): ?>
	            <div class="success">
	                <p>El nuevo usuario se registró con exito!!!</p>
	            </div>
	        <?php endif; ?>
			<input type="text" name="name" placeholder="Nombre completo" required>
			<input type="text" name="lastname" placeholder="Apellidos" required>
			<input type="text" name="username" placeholder="Usuario" required>
			<input type="email" name="email" placeholder="Correo electrónico" required>
			<input type="text" name="address" placeholder="Dirección" required>
			<input type="text" name="city" placeholder="Ciudad" required>
			<input type="number" name="dni" placeholder="Dni" min="4000000" max="100000000" required>
			<input type="password" name="password" placeholder="Contraseña" required>
			<h3><input type="checkbox"> Acepto los <a href="#">términos y condiciones</a></h3>
			<button>Registrarse</button>
			<h3>¿Ya tiene cuenta? <a href="http://localhost/cryptoverse/?controller=user&action=login">Ingrese acá</a></h3>
		</form>


	</section>

	<img src="<?= base_url ?>/Assets/Img/BannerForm.jpg" alt="Cascada">
	
</body>
</html>