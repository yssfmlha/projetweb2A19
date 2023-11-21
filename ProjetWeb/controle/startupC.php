<?php
require "../../config.php";
class startupC{
    public function afficherstartup(){
        $sql="SELECT * FROM startup2";
        $db=config::getConnexion();
        try{
            $list=$db->query($sql);
            return $list;
        }
        catch(Exception $e){
            die("erreur".$e->getMessage());                
        }
    }
    public function deletestartup($id){
        $sql="DELETE FROM startup2 WHERE id_startup=:id";
        $db=config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue('id',$id);
        try{
            $req->execute();
        }
        catch(Exception $e){
            die("Error".$e->getMessage());
        }
    }
    public function addstartup($startup){
        $sql="INSERT INTO startup2 VALUE (NULL,:Nom,:domaine,:nom,:prenom,:de,:email,:tel)";
        $db=config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute(["Nom"=>$startup->getNom(),"domaine"=>$startup->getDomaine(),"nom"=>$startup->getNom_f(),
            "prenom"=>$startup->getPrénom_f(),"de"=>$startup->getdes(),
            "email"=>$startup->getemail(),"tel"=>$startup->gettelephone()]);
        }
        catch(Exception $e){
            die("Error".$e->getMessage());
        }
    }

    public function addstartup2($startup){
        $sql="INSERT INTO startup2 VALUES (?,?,?,?,?,?,?,?)";
        $db=config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->bindValue (1,NULL);
            $query->bindValue (2,$startup->getNom());
            $query->bindValue  (3,$startup->getDomaine());
            $query->bindValue  (4,$startup->getNom_f());
            $query->bindValue (5,$startup->getPrénom_f());
            $query->bindValue (6,$startup->getdes());
            $query->bindValue  (7,$startup->getemail());
            $query->bindValue  (8,$startup->gettelephone());
            $query->execute();
        }
        catch(Exception $e){
            die("Error".$e->getMessage());
        }
    }
    
    public function updatestartup($startup,$id){
        try{
            $db=config::getConnexion();
            $query=$db->prepare("UPDATE startup2 SET Nom=:Nom,domaine=:domaine,nom_f=:nom_f,prenom=:prenom,de=:de,email=:email,telephone=:tel WHERE id_startup=:id_Startup");
            $query->execute(["id_Startup"=>$id,"Nom"=>$startup->getNom(),"domaine"=>$startup->getDomaine(),"nom_f"=>$startup->getNom_f(),
            "prenom"=>$startup->getPrénom_f(),"de"=>$startup->getdes(),
            "email"=>$startup->getemail(),"tel"=>$startup->gettelephone()]);
        }
        catch(Exception $e){
            die("Error".$e->getMessage());
        }
    }
}
?>