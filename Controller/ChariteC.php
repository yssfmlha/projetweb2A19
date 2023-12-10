<?php
    require "c:/xampp/htdocs/projet_web/config.php";
    class ChariteC{
        public function listcharite(){
            $sql="SELECT * FROM charite";
            $db=config::getConnexion();
            try{
                $list=$db->prepare($sql);
                $list->execute();
                return $list->fetchAll();
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
        public function deleteCharite($id){
            $sql="DELETE FROM charite WHERE id_charite= :id";
            $db=config::getConnexion();
            $req=$db->prepare($sql);
            $req->bindValue(':id',$id);
            try{
                $req->execute();
            }
            catch(Exception $e){
                die("Error".$e->getMessage());
            }
        }
        public function updateCharite($charite,$id){
            try {
                $db = config::getConnexion();
                $query = $db->prepare("UPDATE charite SET nom_charite = :nom_charite , description=:description , fullnamefondateur=:fullnamefondateur , email=:email , tel=:tel WHERE id_charite= :id");
                $query->execute(['id' =>$id,'nom_charite'=>$charite->getnom_charite(),'description'=>$charite->getdesc(),'fullnamefondateur'=>$charite->getfullnamefondateur(),'email'=>$charite->getemail(),'tel'=>$charite->gettel()]);
                echo $query->rowCount()." records UPDATED successfully <br>";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function searchCharite($id){
            $sql="SELECT * FROM charite WHERE id_charite=".$id;
            $db=config::getConnexion();
            try{
                $list=$db->query($sql);
                return $list;
            }
            catch(Exception $e){
                die("erreur".$e->getMessage());                
            }
        }
        public function dataCharite(){
            $sql="SELECT COUNT(id_don) AS don,nom_charite FROM don,charite WHERE don.id_charite=charite.id_charite GROUP BY don.id_charite";
            $db=config::getConnexion();
            try{
                $list=$db->query($sql);
                return $list;
            }
            catch(Exception $e){
                die("erreur".$e->getMessage());                
            }
        }
        public function Total(){
            $sql="SELECT COUNT(*) AS d FROM don";
            $db=config::getConnexion();
            try{
                $list=$db->query($sql);
                return $list->fetchAll();
            }
            catch(Exception $e){
                die("erreur".$e->getMessage());                
            }
        }
        public function dataAmount(){
            $sql="SELECT SUM(don.amount) AS sum,nom_charite AS chart FROM don,charite WHERE don.id_charite=charite.id_charite GROUP BY don.id_charite";
            $db=config::getConnexion();
            try{
                $list=$db->query($sql);
                return $list;
            }
            catch(Exception $e){
                die("erreur".$e->getMessage());                
            }
        }
    }