<?php
	define("base_url", "http://localhost/cryptoverse");
	
	function isLogged(){
	    if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
	        return true; 
	    } else {
	        return false; 
	    
		}
	}
?>