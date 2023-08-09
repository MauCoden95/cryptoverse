<?php
	require_once('Config/Parameters.php');
	if(isLogged()) : ?>
	<?php
		require_once 'Layout/Header.php';
	?>


	<section>
		<h2 class="section_title">Comprar Ethereums</h2>
		<div class="center">
			

			<form class="buy" action="http://localhost/cryptoverse/?controller=wallet&action=buyingEthereum" method="POST">
				<?php if(isset($_SESSION['errors_buy'])) : ?>
		            <div>
		                <ul>
		                    <?php foreach($_SESSION['errors_buy'] as $error) :  ?>
		                        <li class="error"><?= "*".$error; ?></li>
		                    <?php endforeach; ?>
		                </ul>
		            </div>

			        <?php elseif(isset($_SESSION['buy_success'])): ?>
			            <div class="success">
			                <p>Compra realizada con exito!!!</p>
			            </div>
			        <?php endif; ?>
				<div class="prices_div">
					<h2 class="buy_title">Precio</h2>
					<div>
						<div><img src="http://localhost/cryptoverse/Assets/Img/ARS.png"> <span class="price_eth--ars"></span> $</div>
					</div>

					<div class="div_q">
						<input type="number" name="quantity" class="input_quantity" placeholder="Pagaré">
						<button class="btn_price">A pagar</button>
					</div>

					<input type="text" name="receive" class="input_calc input_calc_eth" placeholder="Recibiré">

					<input type="number" name="token" class="input_token" placeholder="Ingrese su token de seguridad...">
					


					<h2 class="buy_subtitle">Ingrese su tarjeta <i class="lni lni-mastercard"></i> <i class="lni lni-visa"></i></h2>
					<div class="div_card">
						<input type="" placeholder="XXXX" name="card1"><input type="" placeholder="XXXX" name="card2"><input type="" placeholder="XXXX" name="card3"><input type="" placeholder="XXXX" name="card4">
					</div>

					<button class="btn_buy">Comprar</button>
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
