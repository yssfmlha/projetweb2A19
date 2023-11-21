<?php
    require "c:/xampp/htdocs/projet_web/config.php";
    class DonC{
        public function listdon(){
            $sql="SELECT * FROM don";
            $db=config::getConnexion();
            try{
                $list=$db->query($sql);
                return $list;
            }
            catch(Exception $e){
                die("erreur".$e->getMessage());                
            }
        }
        public function deleteDon($id){
            $sql="DELETE FROM don WHERE id_don= :id";
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
        public function updateDonUserid($newid,$id)
        {   echo($newid.'-------------'.$id);
            try {
                $db = config::getConnexion();
                $query = $db->prepare("UPDATE don SET id_user = :id_newuser WHERE id_user= :id");
                $query->execute(['id_newuser' => $newid,'id' => $id]);
                echo $query->rowCount()." records UPDATED successfully <br>";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function updateDonUsernom($newnom,$id)
        {
            try {
                $db = config::getConnexion();
                $query = $db->prepare("UPDATE don SET fullname = :newnom WHERE id_user= :id");
                $query->execute(['newnom' => $newnom,'id' => $id]);
                echo $query->rowCount()." records UPDATED successfully <br>";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function updateDonUsermsg($newmsg,$id)
        {
            try {
                $db = config::getConnexion();
                $query = $db->prepare("UPDATE don SET message = :newmsg WHERE id_user= :id");
                $query->execute(['newmsg' => $newmsg,'id' => $id]);
                echo $query->rowCount()." records UPDATED successfully <br>";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function addDon($Don){
            $sql="INSERT INTO don VALUES (null,:id_user,:nom,:amount,:message,:cardnum,:dateexpir,:CVV)";
            $db=config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute(["id_user"=>$Don->getid_user(),"nom"=>$Don->getfullname(),"amount"=>$Don->getamount(),"message"=>$Don->getmessage(),"cardnum"=>$Don->getcardnum(),"dateexpir"=>$Don->getdateexpir(),"CVV"=>$Don->getCVV()]);
            }
            catch(Exception $e){
                die("Error".$e->getMessage());
            }
        }
        public function searchdon($id){
            $sql="SELECT * FROM don WHERE id_user=".$id;
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
?>