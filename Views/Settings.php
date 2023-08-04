<?php if(isset($_SESSION['user'])) : ?>
	<?php
		require_once 'Layout/Header.php';
	?>

	<h2 class="h2_token">Su token de seguridad <i class="lni lni-protection"></i> es: <?= $_SESSION['token']; ?> </h2>

		<section id="form_update" class="form_flex">
			<form action="http://localhost/cryptoverse/?controller=user&action=update" method="POST" autocomplete="off">
				<h2>Actualizar usuario</h2>
				<?php if(isset($_SESSION['update']) && $_SESSION['update'] == true) : ?>
		            <h3 class="success"><?php echo "Usuario actualizado con exito!!!" ?></h2>
		        <?php elseif(isset($_SESSION['update']) && $_SESSION['update'] == false): ?>
		        	<h3 class="error"><?php echo "Hubo un error al actualizar el usuario" ?></h2>
				<?php endif; ?>
				<input type="text" name="address" placeholder="Direccion">
				<input type="text" name="city" placeholder="Ciudad">
				<input type="password" name="password" placeholder="Contraseña">
				<button>Actualizar</button>
			</form>

			<form action="http://localhost/cryptoverse/?controller=user&action=addReview" method="POST" autocomplete="off">
				<h2>Dejar reseña</h2>
				<?php if(isset($_SESSION['review']) && $_SESSION['review'] == true) : ?>
		            <h3 class="success"><?php echo "Reseña guardada con exito!!!" ?></h2>
		        <?php elseif(isset($_SESSION['review']) && $_SESSION['review'] == false): ?>
		        	<h3 class="error"><?php echo "Ya has hecho una reseña" ?></h2>
				<?php endif; ?>
				<span class="stars"><i class="lni lni-star-fill"></i></span>
				<input class="range" type="range" min="1" max="5" name="stars">
				<textarea name="review"></textarea>
				<button>Enviar</button>
			</form>
		</section>

	<?php
		require_once 'Layout/Footer.php';
	?>

<?php else : ?>
	<?php header('Location: http://localhost/cryptoverse/'); ?>
<?php endif; ?>