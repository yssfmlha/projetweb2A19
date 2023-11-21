<?php
require "../../config.php";
class don_startupC{
    public function afficherdon_startup(){
        $sql="SELECT * FROM don_startup";
        $db=config::getConnexion();
        try{
            $list=$db->query($sql);
            return $list;
        }
        catch(Exception $e){
            die("erreur".$e->getMessage());                
        }
    }
    public function deletedon_startup($id){
        $sql="DELETE FROM don_startup WHERE id_don_startup=:id";
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
    public function updatedon_startup($don_startup,$id){
        $db=config::getConnexion();
        $sql="UPDATE don_startup SET id_startup=:id_startup,montant=:montant,cardnum=:cardnum,date_expire=:date_expire,CVV=:CVV WHERE id_don_startup=:id_don_Startup";
        $query=$db->prepare($sql);
        try{
            $query->execute(["id_don_Startup"=>$id,"id_startup"=>$don_startup->getid_startup(),"montant"=>$don_startup->gemontant(),"cardnum"=>$don_startup->getcardnum(),
            "date_expire"=>$don_startup->getdate_expire(),"CVV"=>$don_startup->getCVV()]);
        }
        catch(Exception $e){
            die("Error".$e->getMessage());
        }
    }

}
?>