<?php
    require_once 'Config/Database.php';

    class User{
        private $id;
        private $name;
        private $lastName;
        private $username;
        private $email;
        private $address;
        private $city;
        private $dni;
        private $password;
        private $db;

        public function __construct(){
            $this->db = Database::connect();
        }



        //GETTERS
        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getLastName() {
            return $this->lastName;
        }

        public function getUsername() {
            return $this->username;
        }

        public function getEmail() {
            return $this->email;
        }

		public function getAddress() {
            return $this->address;
        }

        public function getCity() {
            return $this->city;
        }

        public function getDni() {
            return $this->dni;
        }
        
        public function getPassword() {
            return $this->password;
        }






        //SETTERS      
        public function setName($name): void {
            $this->name = $name;
        }

        public function setLastName($lastname): void {
            $this->lastName = $lastname;
        }

        public function setUsername($username): void {
            $this->username = $username;
        }

        public function setEmail($email): void {
            $this->email = $email;
        }

        public function setAddress($address): void {
            $this->address = $address;
        }

        public function setCity($city): void {
            $this->city = $city;
        }

        public function setDni($dni): void {
            $this->dni = $dni;
        }


        public function setPassword($password): void {
            $this->password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
        }






        //FUNCTIONS
        public function createUser(){
            $sql = "INSERT INTO users VALUES(NULL,'{$this->getName()}','{$this->getLastName()}','{$this->getUsername()}','{$this->getEmail()}','{$this->getAddress()}','{$this->getCity()}','{$this->getDni()})','{$this->getPassword()}')";


            $query = $this->db->query($sql);

            $result = false;

            if ($query) {
                $result = true;
            }


            return $result;
        }


        public function login($user,$identity,$password){
            $result = false;

            $sql = "SELECT * FROM users WHERE username = '$user' AND dni = $identity";

            $query = $this->db->query($sql);

            if ($query && $query->num_rows == 1) {
                $data = $query->fetch_object();

                $verify = password_verify($password, $data->password);

                if ($verify) {
                    $result = $data;
                }
            }

            return $result;
        }

    }


?>