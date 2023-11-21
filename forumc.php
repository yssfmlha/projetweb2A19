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
            $sql="INSERT INTO posts VALUE (NULL,:auther,:title,:text,:date)";
            $db=config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute(["auther"=>$post->getauther(),"title"=>$post->gettitle(),"text"=>$post->gettext(),"date"=>$post->getdate()]);
            }
            catch(Exception $e){
                die("Error".$e->getMessage());
            }
        }
        public function updatepost($post,$id){
            try{
                $db=config::getConnexion();
                $query=$db->prepare("UPDATE posts SET auther=:auther,title=:title,text=:text,date=:date WHERE id=:id");
                $query->execute(["id"=>$id,"auther"=>$post->getauther(),"title"=>$post->gettitle(),"text"=>$post->gettext(),"date"=>$post->getdate()]);
            }
            catch(Exception $e){
                die("Eroor".$e->getMessage());
            }
        }
    }
?>