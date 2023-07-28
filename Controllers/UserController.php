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
				if (!preg_match('/^[a-zA-Z0-9\s]+$/', $user->getAddress())) {
				    $_SESSION['errors']['address']  = "Error, la dirección solo puede contener letras";
				}




				//VALIDATE DNI
				if (!ctype_digit($user->getDni())) {
				        $_SESSION['errors']['dni']  = "Error, el dni no puede contener letras";
				}
			



				//VALIDATE PASSWORD
				if (!preg_match('/[a-z]/', $user->getPassword()) || !preg_match('/[A-Z]/', $user->getPassword()) || !preg_match('/[0-9]/', $user->getPassword()) || !preg_match('/[^a-zA-Z0-9]/', $user->getPassword())) {
			    	$_SESSION['errors']['password']  = "Error, La contraseña debe contener al menos una letra minúscula, una mayúscula, un número y un símbolo";
			    }


			    echo count($_SESSION['errors']);


			  	if (count($_SESSION['errors']) < 1) {	
			  		$save = $user->createUser();	

			  		if ($save) {
			  			$_SESSION['register'] = true;
			  			unset($_SESSION['errors']);
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
					echo "LOGIN";
					header('Location: http://localhost/cryptoverse/');
					$_SESSION['user'] = $identity;
					//print_r($_SESSION['user']);
					unset($_SESSION['error_login']);
				}else{
					header('Location: http://localhost/cryptoverse/?controller=user&action=login');
					$_SESSION['error_login'] = "Hubo un error al iniciar sesión";
				}


			}


		}


		public function logout(){
			unset($_SESSION['user']);
			header('Location: http://localhost/cryptoverse/');
		}
	}


?>