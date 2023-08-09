<?php
    require_once 'Config/Database.php';

    class Wallet{
        private $id;
        private $user_id;
        private $bitcoin;
        private $ethereum;
        private $litecoin;
        private $cardano;


        public function __construct(){
            $this->db = Database::connect();
        }



        //GETTERS
        public function getId() {
            return $this->id;
        }

        public function getUser_id() {
            return $this->name;
        }

        public function getBitcoin() {
            return $this->lastName;
        }

        public function getEthereum() {
            return $this->username;
        }

        public function getLitecoin() {
            return $this->email;
        }

		public function getCardano() {
            return $this->address;
        }

        





        //SETTERS      
        public function setUser_id($user_id): void {
            $this->user_id = $user_id;
        }

        public function setBitcoin($bitcoin): void {
            $this->bitcoin = $bitcoin;
        }

        public function setEthereum($ethereum): void {
            $this->ethereum = $ethereum;
        }

        public function setLitecoin($litecoin): void {
            $this->litecoin = $litecoin;
        }

        public function setCardano($cardano): void {
            $this->cardano = $cardano;
        }




        //METHODS
        public function showWallet($user){
            $sql = "SELECT * FROM wallets WHERE user_id = $user;";

            $query = $this->db->query($sql);

            if ($query && $query->num_rows == 1) {
                $data = $query->fetch_object();

               $result = $data;
            }

            return $result;
        }

        public function buyingBitcoin($user,$cpt){
            $sql = "UPDATE wallets SET bitcoin = ROUND(bitcoin + $cpt, 8) WHERE user_id = $user;";

            $query = $this->db->query($sql);

           if ($query && $query->num_rows == 1) {
                $data = $query->fetch_object();

               $result = $data;
            }

            return $result;
        }

        public function buyingEthereum($user,$cpt){
            $result = false;

            $sql = "UPDATE wallets SET ethereum = ROUND(ethereum + $cpt, 8) WHERE user_id = $user;";

            $query = $this->db->query($sql);

            if ($query) {
                $result = true;
            }

            return $result;
        }

        public function buyingLitecoin($user,$cpt){
            $result = false;

            $sql = "UPDATE wallets SET litecoin = ROUND(litecoin + $cpt, 8) WHERE user_id = $user;";

            $query = $this->db->query($sql);

            if ($query) {
                $result = true;
            }

            return $result;
        }

        public function buyingCardano($user,$cpt){
            $result = false;

            $sql = "UPDATE wallets SET cardano = ROUND(cardano + $cpt, 8) WHERE user_id = $user;";

            $query = $this->db->query($sql);

            if ($query) {
                $result = true;
            }

            return $result;
        }
    }


?>