<?php
    class projets{
        public  $id_projet;
        public  $id_startup;
        public  $Nom_projet;
        public  $Description_Projet;
        public  $Date_Debut;
        public  $Date_Fin;
        public  $Statut_Projet;
    
        public function __construct($id=NULL,$id_startup,$Nom_projet,$Description_Projet,$Date_Debut,$Date_Fin,$Statut_Projet)
        {
            $this->id_projet=$id;
            $this->id_startup=$id_startup;
            $this->Nom_projet=$Nom_projet;
            $this->Description_Projet=$Description_Projet;
            $this->Date_Debut=$Date_Debut;
            $this->Date_Fin=$Date_Fin;
            $this->Statut_Projet=$Statut_Projet;

        }
        public function getid_projet()
        {
            return $this->id_projet;
        }
        public function getid_startup()
        {
            return $this->id_startup;
        }
        public function getNom_projet()
        {
            return $this->Nom_projet;
        }
        public function getDescription_Projet()
        {
            return $this->Description_Projet;
        }
        public function getDate_Debut()
        {
            return $this->Date_Debut;
        }
        public function getDate_Fin()
        {
            return $this->Date_Fin;
        }
        public function getStatut_Projet()
        {
            return $this->Statut_Projet;
        }
        public function setid_startup($n)
        {
            $this->id_startup=$n; 
        }
        public function setNom_projet($n)
        {
            $this->Nom_projet=$n;
        }
        public function setDescription_Projet($n)
        {
            $this->Description_Projet=$n;
        }
        public function setDate_Debut($n)
        {
            $this->Date_Debut=$n;
        }
        public function setDate_Fin($n)
        {
            $this->Date_Fin=$n;
        }
        public function setStatut_Projet($n)
        {
            $this->Statut_Projet=$n;
        }     
    }
?>