<?php
	require_once 'Models/Wallet.php';


	class WalletController{
		public function buyBitcoin(){
			require_once 'Views/Bitcoin.php';
		}

		public function buyEthereum(){
			require_once 'Views/Ethereum.php';
		}		

		public function buyLitecoin(){
			require_once 'Views/Litecoin.php';
		}

		public function buyCardano(){
			require_once 'Views/Cardano.php';
		}

		public function buyingBitcoin(){
			if (isset($_POST)) {
				$token = $_POST['token'];
				$quantity = $_POST['quantity'];
				$receive = $_POST['receive'];
				$card1 = $_POST['card1'];
				$card2 = $_POST['card2'];
				$card3 = $_POST['card3'];
				$card4 = $_POST['card4'];

				$_SESSION['errors_buy'] = array();

				if (!$token == $_SESSION['token']) {
					$_SESSION['errors_buy']['token'] = "Error, token incorrecto";
				}

				if ($quantity == '') {
					$_SESSION['errors_buy']['quantity'] = "Error, input pagaré vacío";
				}

				if ($receive == '') {
					$_SESSION['errors_buy']['receive'] = "Error, input recibiré vacío";
				}

				if ($card1 == '' || $card2 == '' || $card3 == '' || $card4 == '') {
					$_SESSION['errors_buy']['card'] = "Error, numero tarjeta vacío";
				}

				
				
				if (count($_SESSION['errors_buy']) <= 0) {
					$wallet = new Wallet();
					$wallet->setBitcoin($receive);

					$wallet->buyingBitcoin($_SESSION['user']->id,$receive);

					unset($_SESSION['errors_buy']);
					$_SESSION['buy_success'] = true;
					$wallets = $wallet->showWallet($_SESSION['user']->id);
					print_r($wallets);
					$_SESSION['wallet'] = $wallets;
				}else{
					unset($_SESSION['buy_success']);

					//echo "NO OK";
				}
			}

			header('Location: http://localhost/cryptoverse/?controller=wallet&action=buyBitcoin');
		}


		public function buyingEthereum(){
			if (isset($_POST)) {
				$token = $_POST['token'];
				$quantity = $_POST['quantity'];
				$receive = $_POST['receive'];
				$card1 = $_POST['card1'];
				$card2 = $_POST['card2'];
				$card3 = $_POST['card3'];
				$card4 = $_POST['card4'];

				$_SESSION['errors_buy'] = array();

				if (!$token == $_SESSION['token']) {
					$_SESSION['errors_buy']['token'] = "Error, token incorrecto";
				}

				if ($quantity == '') {
					$_SESSION['errors_buy']['quantity'] = "Error, input pagaré vacío";
				}

				if ($receive == '') {
					$_SESSION['errors_buy']['receive'] = "Error, input recibiré vacío";
				}

				if ($card1 == '' || $card2 == '' || $card3 == '' || $card4 == '') {
					$_SESSION['errors_buy']['card'] = "Error, numero tarjeta vacío";
				}

				
				
				if (count($_SESSION['errors_buy']) <= 0) {
					$wallet = new Wallet();
					$wallet->setBitcoin($receive);

					$wallet->buyingEthereum($_SESSION['user']->id,$receive);

					unset($_SESSION['errors_buy']);
					$_SESSION['buy_success'] = true;
					$wallets = $wallet->showWallet($_SESSION['user']->id);
					print_r($wallets);
					$_SESSION['wallet'] = $wallets;
				}else{
					unset($_SESSION['buy_success']);

					//echo "NO OK";
				}
			}

			header('Location: http://localhost/cryptoverse/?controller=wallet&action=buyEthereum');
		}


		public function buyingLitecoin(){
			if (isset($_POST)) {
				$token = $_POST['token'];
				$quantity = $_POST['quantity'];
				$receive = $_POST['receive'];
				$card1 = $_POST['card1'];
				$card2 = $_POST['card2'];
				$card3 = $_POST['card3'];
				$card4 = $_POST['card4'];

				$_SESSION['errors_buy'] = array();

				if (!$token == $_SESSION['token']) {
					$_SESSION['errors_buy']['token'] = "Error, token incorrecto";
				}

				if ($quantity == '') {
					$_SESSION['errors_buy']['quantity'] = "Error, input pagaré vacío";
				}

				if ($receive == '') {
					$_SESSION['errors_buy']['receive'] = "Error, input recibiré vacío";
				}

				if ($card1 == '' || $card2 == '' || $card3 == '' || $card4 == '') {
					$_SESSION['errors_buy']['card'] = "Error, numero tarjeta vacío";
				}

				
				
				if (count($_SESSION['errors_buy']) <= 0) {
					$wallet = new Wallet();
					$wallet->setBitcoin($receive);

					$wallet->buyingLitecoin($_SESSION['user']->id,$receive);

					unset($_SESSION['errors_buy']);
					$_SESSION['buy_success'] = true;
					$wallets = $wallet->showWallet($_SESSION['user']->id);
					print_r($wallets);
					$_SESSION['wallet'] = $wallets;
				}else{
					unset($_SESSION['buy_success']);

					//echo "NO OK";
				}
			}

			header('Location: http://localhost/cryptoverse/?controller=wallet&action=buyLitecoin');
		}

		public function buyingCardano(){
			if (isset($_POST)) {
				$token = $_POST['token'];
				$quantity = $_POST['quantity'];
				$receive = $_POST['receive'];
				$card1 = $_POST['card1'];
				$card2 = $_POST['card2'];
				$card3 = $_POST['card3'];
				$card4 = $_POST['card4'];

				$_SESSION['errors_buy'] = array();

				if (!$token == $_SESSION['token']) {
					$_SESSION['errors_buy']['token'] = "Error, token incorrecto";
				}

				if ($quantity == '') {
					$_SESSION['errors_buy']['quantity'] = "Error, input pagaré vacío";
				}

				if ($receive == '') {
					$_SESSION['errors_buy']['receive'] = "Error, input recibiré vacío";
				}

				if ($card1 == '' || $card2 == '' || $card3 == '' || $card4 == '') {
					$_SESSION['errors_buy']['card'] = "Error, numero tarjeta vacío";
				}

				
				
				if (count($_SESSION['errors_buy']) <= 0) {
					$wallet = new Wallet();
					$wallet->setBitcoin($receive);

					$wallet->buyingCardano($_SESSION['user']->id,$receive);

					unset($_SESSION['errors_buy']);
					$_SESSION['buy_success'] = true;
					$wallets = $wallet->showWallet($_SESSION['user']->id);
					print_r($wallets);
					$_SESSION['wallet'] = $wallets;
				}else{
					unset($_SESSION['buy_success']);

					//echo "NO OK";
				}
			}

			header('Location: http://localhost/cryptoverse/?controller=wallet&action=buyCardano');
		}
	}


?>