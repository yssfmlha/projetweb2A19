<?php
    require "c:/xampp/htdocs/projet_web/config.php";
    class ChariteC{
        public function listcharite(){
            $sql="SELECT * FROM charite";
            $db=config::getConnexion();
            try{
                $list=$db->query($sql);
                return $list;
            }
            catch(Exception $e){
                die("erreur".$e->getMessage());                
            }
        }
        public function addCharite($charite){
            echo($charite->getnom_charite());
            $sql="INSERT INTO charite VALUES (null,:nom_charite,:description,:fullnamefondateur,:email,:tel)";
            $db=config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute(["nom_charite"=>$charite->getnom_charite(),"description"=>$charite->getdesc(),"fullnamefondateur"=>$charite->getfullnamefondateur(),"email"=>$charite->getemail(),"tel"=>$charite->gettel()]);
            }
            catch(Exception $e){
                die("Error".$e->getMessage());
            }
        }
    }