<?php 
	require_once('Config/Parameters.php');
	
	if(isLogged()) : ?>
	<?php
		require_once 'Layout/Header.php';
	?>
	

	<section id="myWallet">
		<h2 class="section_title">Tu billetera</h2>
		<div class="center">
			<div class="wallet_card">
				<h2>Bitcoin</h2>
				<img src="<?= base_url ?>/Assets/Img/Bitcoin.png">
				<h4><?php print_r($_SESSION['wallet']->bitcoin) ?></h4>
				<a href="http://localhost/cryptoverse/?controller=wallet&action=buyBitcoin">Comprar</a>
			</div>

			<div class="wallet_card">
				<h2>Ethereum</h2>
				<img src="<?= base_url ?>/Assets/Img/Ethereum.png">
				<h4><?php print_r($_SESSION['wallet']->ethereum) ?></h4>
				<a href="http://localhost/cryptoverse/?controller=wallet&action=buyEthereum">Comprar</a>
			</div>

			<div class="wallet_card">
				<h2>Litecoin</h2>
				<img src="<?= base_url ?>/Assets/Img/Litecoin.png">
				<h4><?php print_r($_SESSION['wallet']->litecoin) ?></h4>
				<a href="http://localhost/cryptoverse/?controller=wallet&action=buyLitecoin">Comprar</a>
			</div>

			<div class="wallet_card">
				<h2>Cardano</h2>
				<img src="<?= base_url ?>/Assets/Img/Cardano.png">
				<h4><?php print_r($_SESSION['wallet']->cardano) ?></h4>
				<a href="http://localhost/cryptoverse/?controller=wallet&action=buyCardano">Comprar</a>
			</div>
		</div>
	</section>

	<div class="separate">
		<hr>
		<img src="<?= base_url ?>/Assets/Img/Separate.png">
	</div>

	<section id="cryptoverse_card">
		<h2 class="section_title">Tu tarjeta</h2>
		<div class="center">
			<div class="cryptoverse_card_card">
				<img src="<?= base_url ?>/Assets/Img/Logo.png" alt="logo">
				<h2><?php print_r($_SESSION['card']->number) ?></h2>
				<h4><?php print_r($_SESSION['card']->name) ?> <?php print_r($_SESSION['card']->lastname) ?></h4>
				<h2 class="expiration_date"><?php print_r($_SESSION['card']->expiration) ?></h2>
				<i class="lni lni-mastercard"></i>
				<i class="lni lni-btc"></i>
			</div>

			<div class="cryptoverse_card_card">
				<div class="band_card">

				</div>
				<div class="cvv"><?php print_r($_SESSION['card']->code) ?></div>
			</div>		
		</div>
	</section>

	<?php
		require_once 'Layout/Footer.php';
	?>

<?php else : ?>
	<?php header('Location: http://localhost/cryptoverse/'); ?>
<?php endif; ?>
