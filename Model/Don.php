<?php
     class Don{
        private ?string $id_user=null;
        private ?string $fullname=null;
        private ?string $amount=null;
        private ?string $message=null;
        private ?string $cardnum=null;
        private ?string $dateexpir=null;
        private ?string $CVV=null;
        private ?string $idc=null;
        
        public function setid_user($i){
            $this->id_user=$i;
        }
        public function getid_user(){
            return $this->id_user;
        }
        public function setfullname($f){
            $this->fullname=$f;
        }
        public function getfullname(){
            return $this->fullname;
        }
        public function setamount($a){
            $this->amount=$a;
        }
        public function getamount(){
            return $this->amount;
        }
        public function setmessage($m){
            $this->message=$m;
        }
        public function getmessage(){
            return $this->message;
        }
        public function setcardnum($c){
            $this->cardnum=$c;
        }
        public function getcardnum(){
            return $this->cardnum;
        }
        public function setdateexpir($d){
            $this->dateexpir=$d;
        }
        public function getdateexpir(){
            return $this->dateexpir;
        }
        public function setCVV($cv){
            $this->CVV=$cv;
        }
        public function getCVV(){
            return $this->CVV;
        }
        public function setidc($ic){
            $this->idc=$ic;
        }
        public function getidc(){
            return $this->idc;
        }
        public function __construct($id,$f,$a,$m,$c,$d,$cv,$ic){
            $this->id_user=$id;
            $this->fullname=$f;
            $this->amount=$a;
            $this->message=$m;
            $this->cardnum=$c;
            $this->dateexpir=$d;
            $this->CVV=$cv;
            $this->idc=$ic;
        }
     }
?>