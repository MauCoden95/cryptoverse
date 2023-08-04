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


        public function update($id,$address,$city,$password){
            $result = false;
            $sql = "UPDATE users SET address = '{$this->getAddress()}', city = '{$this->getCity()}', password = '{$this->getPassword()}' WHERE id = $id;";

            $query = $this->db->query($sql);

            if ($query) {
                $result = true;
            }



            return $result;
        }

        public function cardData($id){
            $result = false;

            $sql = "SELECT u.name, u.lastname, c.number, c.code, c.expiration
            FROM users u
            JOIN cards c ON u.id = c.user_id
            WHERE u.id = $id;";

            $query = $this->db->query($sql);

            if ($query && $query->num_rows == 1) {
                $data_card = $query->fetch_object();

                $result = $data_card;
            }

            return $result;
        }

        public function createCard($username){
            $sql = "SELECT id FROM users WHERE username = '{$username}';";

            $query = $this->db->query($sql);

            if ($query && $query->num_rows == 1) {
                $user = $query->fetch_object();

                $year = strval(rand(2025, 2030)); 
                $month = strval(rand(1,12));

                $date_exp = $month.'/'.$year;

                $number = strval(rand(1000, 9999)).' '.strval(rand(1000, 9999)).' '.strval(rand(1000, 9999)).' '.strval(rand(1000, 9999));

                //echo $number;
                $cvv = rand(100,999);

                $create = "INSERT INTO cards VALUES(NULL,$user->id,'{$date_exp}','{$number}',$cvv);";
                $create_card = $this->db->query($create); 
            }
        }

        public function createWallet($username){
            $sql = "SELECT id FROM users WHERE username = '{$username}';";

            $query = $this->db->query($sql);

            if ($query && $query->num_rows == 1) {
                $user = $query->fetch_object();

                $create = "INSERT INTO wallets VALUES(NULL,$user->id,0,0,0,0);";
                $create_wallet = $this->db->query($create);
            }
        }


        public function addReview($user_id,$review,$stars){
            $result = false;

            try {

                $sql = "INSERT INTO reviews VALUES(NULL,$user_id,'{$review}',$stars);";
                $query = $this->db->query($sql);
                header('Location: http://localhost/cryptoverse/?controller=user&action=settings');
                if ($query) {
                     $result = true;
                } 
                exit(); 

            } catch (mysqli_sql_exception $e) {
                echo "Error al insertar el registro: " . $e->getMessage();
                header('Location: http://localhost/cryptoverse/?controller=user&action=settings');
            }

           

            

            return $result;
        }

        public function cardWallet($id){
            $result = false;

            $sql = "SELECT u.name, w.bitcoin, w.ethereum, w.litecoin, w.cardano
                    FROM users u
                    JOIN wallets w ON u.id = w.user_id
                    WHERE w.user_id = $id;";

            $query = $this->db->query($sql);

            if ($query && $query->num_rows == 1) {
                $data_wallet = $query->fetch_object();

                $result = $data_wallet;
            }

            return $result;
        }

    }


?>