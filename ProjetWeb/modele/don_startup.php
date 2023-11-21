<?php
    class don_startup{
        public  $id_don_startup;
        public  $id_startup;
        public  $montant;
        public  $cardnum;
        public  $date_expire;
        public  $CVV;
    
        public function __construct($id=NULL,$id_startup,$montant,$cardnum,$date_expire,$CVV)
        {
            $this->id_don_startup=$id;
            $this->id_startup=$id_startup;
            $this->montant=$montant;
            $this->cardnum=$cardnum;
            $this->date_expire=$date_expire;
            $this->CVV=$CVV;

        }
        public function getid_don_startup()
        {
            return $this->id_don_startup;
        }
        public function getid_startup()
        {
            return $this->id_startup;
        }
        public function gemontant()
        {
            return $this->montant;
        }
        public function getcardnum()
        {
            return $this->cardnum;
        }
        public function getdate_expire()
        {
            return $this->date_expire;
        }
        public function getCVV()
        {
            return $this->CVV;
        }
        public function setid_startup($n)
        {
            $this->id_startup=$n; 
        }
        public function setmontant($n)
        {
            $this->montant=$n;
        }
        public function setcardnum($n)
        {
            $this->cardnum=$n;
        }
        public function setdate_expire($n)
        {
            $this->date_expire=$n;
        }
        public function setCVV($n)
        {
            $this->CVV=$n;
        }    
    }
?>