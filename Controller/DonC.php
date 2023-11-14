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
        function updateJoueur($newid, $id)
        {   
            try {
                $db = config::getConnexion();
                $query = $db->prepare(
                    'UPDATE dont SET 
                        id_don = :id_newdon, 
                    WHERE id_don= :id'
                );
                
                $query->execute([
                    'id_newdon' => $newid,
                    'id' => $id,
                ]);
                
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
    }
?>