<?php
    class startup{
        public  $id_startup;
        public  $id_user;
        public  $Nom;
        public  $Domaine;
        public  $nom_f;
        public  $prénom_f;
        public  $de;
        public  $email;
        public  $telephone;
    
        public function __construct($id=NULL,$id_user,$Nom,$Domaine,$nom_f,$prénom_f,$de,$email,$telephone)
        {
            $this->id_startup=$id;
            $this->id_user=$id_user;
            $this->Nom=$Nom;
            $this->Domaine=$Domaine;
            $this->nom_f=$nom_f;
            $this->prénom_f=$prénom_f;
            $this->de=$de;
            $this->email=$email;
            $this->telephone=$telephone;

        }
        public function getid_startup()
        {
            return $this->id_startup;
        }
        public function getid_user(){
            return $this->id_user;
        }
        public function getNom()
        {
            return $this->Nom;
        }
        public function getDomaine()
        {
            return $this->Domaine;
        }
        public function getNom_f()
        {
            return $this->nom_f;
        }
        public function getPrénom_f()
        {
            return $this->prénom_f;
        }
        public function getdes()
        {
            return $this->de;
        }
        public function getemail()
        {
            return $this->email;
        }
        public function gettelephone()
        {
            return $this->telephone;
        }
        public function setNom($n)
        {
            $this->Nom=$n; 
        }
        public function setDomaine($n)
        {
            $this->Domaine=$n;
        }
        public function setNom_f($n)
        {
            $this->nom_f=$n;
        }
        public function setPrénom_f($n)
        {
            $this->prénom_f=$n;
        }
        public function setdes($n)
        {
            $this->de=$n;
        }
        public function setemail($n)
        {
            $this->email=$n;
        }
        public function settelephone($n)
        {
            $this->telephone=$n;
        }
    
    }
?>