<?php
    class Event
    {
        public $Mat_Evt ;
        public $Nom_Evt ;
        public $Date_Evt ;
        public $Comment_Evt ;
        public $Adresse_Evt ;
        public $DateF_Evt ;
        public $Price_Evt ;
        public $NbTKT_Evt ;

        public function __construct($Mat ,$nomEVT,$Matadresse,$date,$duree,$Commentaire,$prix,$Nbr_Tkt)
        {
            $this->Mat_Evt = $Mat ;
            $this->Nom_Evt = $nomEVT ;
            $this->Adresse_Evt = $Matadresse ;
            $this->Date_Evt = $date ; 
            $this->DateF_Evt = $duree ;
            $this->Comment_Evt = $Commentaire ;  
            $this->Price_Evt = $prix;
            $this->NbTKT_Evt = $Nbr_Tkt ;
        }

        public function getMatE()
        {
            return $this->Mat_Evt ;
        }

        public function getNomE()
        {
            return $this->Nom_Evt ;
        }

        public function getAdresseE()
        {
            return $this->Adresse_Evt ;
        }

        public function getDateE()
        {
            return $this->Date_Evt ;
        }

        public function getDateFE()
        {
            return $this->DateF_Evt ;
        }

        public function getCommentE()
        {
            return $this->Comment_Evt ;
        }

        public function getPriceE()
        {
            return $this->Price_Evt ;
        }

        public function getNTKTE()
        {
            return $this->NbTKT_Evt ;
        }
    } 
?>