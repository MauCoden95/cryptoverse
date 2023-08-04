<?php
	require_once 'Models/User.php';


	class UserController{
		public function register(){
			require_once 'Views/User/Register.php';
		}

		public function login(){
			require_once 'Views/User/Login.php';
		}

		public function create(){ 
			if (isset($_POST)) {
				$user = new User();
				$user->setName($_POST['name']);
				$user->setLastName($_POST['lastname']);
				$user->setUsername($_POST['username']);
				$user->setEmail($_POST['email']);
				$user->setAddress($_POST['address']);
				$user->setDni($_POST['dni']);
				$user->setCity($_POST['city']);
				$user->setPassword($_POST['password']);
				



				$_SESSION['errors'] = array();

				//print_r($user);


				
				//VALIDATE NAME
				if (!preg_match('/^[a-zA-Z\s]+$/', $user->getName())) {
				        $_SESSION['errors']['name']  = "Error, el nombre solo puede contener letras";
				} 
				


				//VALIDATE LASTNAME
				if (!preg_match('/^[a-zA-Z\s]+$/', $user->getLastName())) {
				        $_SESSION['errors']['lastname']  = "Error, el apellido solo puede contener letras";
				} 
				




				//VALIDATE USERNAME			    
			    if (strlen($user->getUsername()) < 5 || strlen($user->getUsername()) > 10) {
			        $_SESSION['errors']['username']  = "Error, el usuario debe tener entre 5 y 10 caracteres";
			    }




			    //VALIDATE EMAIL
			    if (!filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL)) {
			        $_SESSION['errors']['email']  = "Error, correo electrónico inválido";
			    } 



			    //VALIDATE ADDRESS
				if (!preg_match('/^[a-zA-Z\d\s]+$/', $user->getAddress())) {
				    $_SESSION['errors']['address']  = "Error, la dirección solo puede contener letras";
				}


				//VALIDATE CITY
				if (!preg_match('/^[a-zA-Z\s]+$/', $user->getCity())) {
				    $_SESSION['errors']['city']  = "Error, la ciudad solo puede contener letras";
				}


				//VALIDATE DNI
				if (!ctype_digit($user->getDni())) {
				        $_SESSION['errors']['dni']  = "Error, el dni no puede contener letras";
				}
			



				//VALIDATE PASSWORD
				$pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W\_])[A-Za-z\d\W\_]+$/';

				if (!preg_match($pattern, $user->getPassword())) {
			    	$_SESSION['errors']['password']  = "Error, La contraseña debe contener al menos una letra minúscula, una mayúscula, un número y un símbolo";
			    }


			    //echo count($_SESSION['errors']);


			  	if (count($_SESSION['errors']) < 1) {	
			  		$save = $user->createUser();	

			  		if ($save) {
			  			$_SESSION['register'] = true;
			  			unset($_SESSION['errors']);
			  			$user->createCard($user->getUsername());
			  			$user->createWallet($user->getUsername());
			  		}else{
			  			$_SESSION['register'] = false;
			  		}
			  	}else{
			  		print_r($_SESSION['errors']);
			  	}
			    
			    
			}


	        header('Location: http://localhost/cryptoverse/?controller=user&action=register');
		}


		public function signin(){
			if (isset($_POST)) {
				$user = new User();
				$user->setUsername($_POST['username']);
				$user->setDni($_POST['dni']);
				$user->setPassword($_POST['password']);

				$identity = $user->login($_POST['username'],$_POST['dni'],$_POST['password']);



				if ($identity) {
					header('Location: http://localhost/cryptoverse/');
					$_SESSION['user'] = $identity;
					unset($_SESSION['error_login']);
					$_SESSION['token'] = rand(100000, 999999);

					
					$data_card = $user->cardData($_SESSION['user']->id);
					$_SESSION['card'] = $data_card;

					$data_wallet = $user->cardWallet($_SESSION['user']->id);
					$_SESSION['wallet'] = $data_wallet;

					//print_r($_SESSION['card']);
				}else{
					header('Location: http://localhost/cryptoverse/?controller=user&action=login');
					$_SESSION['error_login'] = "Nombre de usuario, dni y/o contraseña incorrectos";
				}


			}


		}


		public function logout(){
			session_destroy();
			header('Location: http://localhost/cryptoverse/');
		}

		public function myWallet(){
			require_once 'Views/MyWallet.php';
		}

		public function settings(){
			require_once 'Views/Settings.php';
		}

		public function update(){
			if (isset($_POST)) {
				$user = new User();
				$user->setAddress($_POST['address']);
				$user->setCity($_POST['city']);
				$user->setPassword($_POST['password']);

				$_SESSION['errors_update'] = array();

				//VALIDATE ADDRESS
				if (!preg_match('/^[a-zA-Z\d\s]+$/', $user->getAddress())) {
				    $_SESSION['errors_update']['address']  = "Error, la dirección solo puede contener letras";
				}


				//VALIDATE CITY
				if (!preg_match('/^[a-zA-Z\s]+$/', $user->getCity())) {
				    $_SESSION['errors_update']['city']  = "Error, la ciudad solo puede contener letras";
				}

				//VALIDATE PASSWORD
				$pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W\_])[A-Za-z\d\W\_]+$/';

				if (!preg_match($pattern, $user->getPassword())) {
			    	$_SESSION['errors_update']['password']  = "Error, La contraseña debe contener al menos una letra minúscula, una mayúscula, un número y un símbolo";
			    }


			    if (count($_SESSION['errors_update']) < 1) {	
			  		$update = $user->update($_SESSION['user']->id,$user->getAddress(),$user->getCity(),$user->getPassword());

					
					$_SESSION['update'] = true;
					
					
			  	}else{
			  		$_SESSION['update'] = false;
			  	}


				
			}

			header('Location: http://localhost/cryptoverse/?controller=user&action=settings');
		}

		public function addReview(){
			if (isset($_POST)) {
				$stars = $_POST['stars'];
				$review = $_POST['review'];

				$user = new User();
				$review = $user->addReview($_SESSION['user']->id,$review,$stars);

				if ($review) {
					$_SESSION['review'] = true;
				}else{
					$_SESSION['review'] = false;
					exit();
					//header('Location: http://localhost/cryptoverse/?controller=user&action=settings');
				}
			}

			header('Location: http://localhost/cryptoverse/?controller=user&action=settings');
		}
	}


?>