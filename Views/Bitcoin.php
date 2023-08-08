<?php
	require_once('Config/Parameters.php');
	if(isLogged()) : ?>
	<?php
		require_once 'Layout/Header.php';
	?>


	<section>
		<h2 class="section_title">Comprar Bitcoins</h2>
		<div class="center">
			<!--<h2>Precio bitcoin ARS: <span class="price_btc--ars"></span></h2>
			<h2>Precio bitcoin USD: <span class="price_btc--usd"></span></h2>-->

			<form class="buy" action="#" method="POST">
				<div class="prices_div">
					<h2 class="buy_title">Precios</h2>
					<div>
						<div><img src="http://localhost/cryptoverse/Assets/Img/ARS.png"> <span class="price_btc--ars"></span> $</div>
						<div><img src="http://localhost/cryptoverse/Assets/Img/USD.png"> <span class="price_btc--usd"></span> USD</div>
					</div>

					<div class="div_q">
						<input type="number" class="input_quantity" placeholder="Cantidad">
						<button class="btn_price">Agregar</button>
					</div>
					<span class="total_price"></span>
				</div>
			</form>
		</div>
	</section>

		<?php
		require_once 'Layout/Footer.php';
	?>



<?php else : ?>
	<?php header('Location: http://localhost/cryptoverse/'); ?>
<?php endif; ?>
