<?php
    require "config.php";
    class postc{
        public function listpost(){
            $sql="SELECT * FROM posts";
            $db=config::getConnexion();
            try{
                $list=$db->query($sql);
                return $list;
            }
            catch(Exception $e){
                die("erreur".$e->getMessage());                
            }
        }
        public function deletepost($id){
            $sql="DELETE FROM posts WHERE id= :id";
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
        public function addpost($post){
            $sql="INSERT INTO posts VALUE (NULL,:text,:image)";
            $db=config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute(["text"=>$post->gettext(),"image"=>$post->getimage()]);
            }
            catch(Exception $e){
                die("Error".$e->getMessage());
            }
        }
        public function updatepost($post,$id){
            try{
                $db=config::getConnexion();
                $query=$db->prepare("UPDATE post SET text=:text,image=:image WHERE id=:id");
                $query->execute(["id"=>$id,"text"=>$post->gettext(),"image"=>$post->getimage(),]);
            }
            catch(Exception $e){
                die("Eroor".$e->getMessage());
            }
        }
    }
?>