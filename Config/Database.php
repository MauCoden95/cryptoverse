<?php
	class Database{
		public static function connect(){
			$db = new mysqli_connect("localhost","root","","cryptoverse");
			$db->query("SET NAMES 'UTF8'");



			return $db;
		}
	}



?>