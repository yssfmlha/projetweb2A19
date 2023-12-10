<?php
    require_once "c:/xampp/htdocs/projet_web/config.php";
    class UserC{
        public function listuser($id){
            $sql="SELECT * FROM user_form WHERE id=".$id;
            $db=config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();
                $list=$query->fetchAll();
                return $list;
            }
            catch(Exception $e){
                die("erreur".$e->getMessage());                
            }
        }
    }