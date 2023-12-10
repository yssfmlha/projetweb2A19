<?php
    class Charite{
        public ?string $nom_charite=null;
        public ?string $description=null;
        public ?string $fullnamefondateur=null;
        public ?string $email=null;
        public ?string $tel=null;

        public function setnom_charite($n){
            $this->nom_charite=$n;
        }
        public function getnom_charite(){
            return $this->nom_charite;
        }
        public function setfullnamefondateur($f){
            $this->fullnamefondateur=$f;
        }
        public function getfullnamefondateur(){
            return $this->fullnamefondateur;
        }
        public function setdesc($d){
            $this->description=$d;
        }
        public function getdesc(){
            return $this->description;
        }
        public function setemail($e){
            $this->email=$e;
        }
        public function getemail(){
            return $this->email;
        }
        public function settel($t){
            $this->tel=$t;
        }
        public function gettel(){
            return $this->tel;
        }
        public function __construct($n,$d,$f,$e,$t){
            $this->nom_charite=$n;
            $this->description=$d;
            $this->fullnamefondateur=$f;
            $this->email=$e;
            $this->tel=$t;
        }
    }
?>