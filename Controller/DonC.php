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
        function updateDon($newid,$id)
        {   
            try {
                $db = config::getConnexion();
                $query = $db->prepare('UPDATE don SET id_user = :id_newuser WHERE id_user= :id');
                $query->execute(['id_newuser' => $newid,'id' => $id]);
                echo $query->rowCount()." records UPDATED successfully <br>";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
    }
?>