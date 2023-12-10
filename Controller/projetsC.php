<?php
require_once  "c:/xampp/htdocs/projet_web/config.php";
class projetsC{
    public function afficherprojets(){
        $sql="SELECT * FROM postes";
        $db=config::getConnexion();
        try{
            $list=$db->query($sql);
            return $list;
        }
        catch(Exception $e){
            die("erreur".$e->getMessage());                
        }
    }
    public function addprojets($projet){
        $sql="INSERT INTO postes VALUE (NULL,:id_startup,:Nom_projet,:Description_Projet,:Date_Debut,:Date_Fin,:Statut_Projet)";

        $db=config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute(["id_startup"=>$projet->getid_startup(),"Nom_projet"=>$projet->getNom_projet(),
            "Description_Projet"=>$projet->getDescription_Projet(),
            "Date_Debut"=>$projet->getDate_Debut(),"Date_Fin"=>$projet->getDate_Fin(),
            "Statut_Projet"=>$projet->getStatut_Projet()]);
        }
        catch(Exception $e){
            die("Error:".$e->getMessage());
        }
    
    }
    public function addprojets2($projet){
        $sql="INSERT INTO postes VALUES (?,?,?,?,?,?,?,?)";
        $db=config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->bindValue (1,NULL);
            $query->bindValue (2,$projet->getid_startup());
            $query->bindValue  (3,$projet->getNom_projet());
            $query->bindValue  (4,$projet->getDescription_Projet());
            $query->bindValue (5,$projet->getDate_Debut());
            $query->bindValue (6,$projet->getDate_Fin());
            $query->bindValue  (7,$projet->getStatut_Projet());
            $query->execute();
        }
        catch(Exception $e){
            die("Error".$e->getMessage());
        }
    }
    public function deleteprojets($id){
        $sql="DELETE FROM postes WHERE id_projet=:id";
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
    public function updateprojets($projet,$id){
        $db=config::getConnexion();
        $sql="UPDATE postes SET id_startup=:id_startup,Nom_projet=:Nom_projet,Description_Projet=:Description_Projet,Date_Debut=:Date_Debut,Date_Fin=:Date_Fin,Statut_Projet=:Statut_Projet WHERE id_projet=:id_Projet";
        $query=$db->prepare($sql);
        try{
            $query->execute(["id_Projet"=>$id,"id_startup"=>$projet->getid_startup(),"Nom_projet"=>$projet->getNom_projet(),"Description_Projet"=>$projet->getDescription_Projet(),
            "Date_Debut"=>$projet->getDate_Debut(),"Date_Fin"=>$projet->getDate_Fin(),"Statut_Projet"=>$projet->getStatut_Projet()]);
        }
        catch(Exception $e){
            die("Error".$e->getMessage());
        }
    }
    public function SearchProjet($Nom)
    {
        try
        {
            $db = Config::getConnexion();
            $stmt = $db->prepare('SELECT * FROM postes WHERE Nom_projet = :Nom');
            $stmt->execute(['Nom' => $Nom]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e)
        {
            die("Erreur!!".$e->getMessage()) ;
        } 
    }
    public function getStartupOptions()
    {
        $sql = "SELECT id_startup, Nom FROM startup2";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die("erreur" . $e->getMessage());
        }
    }
    public function afficherNomsProjetsParStartup() {
        $sql = "SELECT s.Nom AS Nom_startup, p.Nom_projet
                FROM startup2 s
                LEFT JOIN postes p ON s.id_startup = p.id_startup";
        $db = config::getConnexion();
        
        try {
            $result = $db->query($sql);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die("Erreur!!" . $e->getMessage());
        }
    }
    public function getProjectsByStartup($id_startup) {
        $sql = "SELECT * FROM postes WHERE id_startup = :id_startup";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':id_startup', $id_startup, PDO::PARAM_INT);
            $query->execute();
    
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die("Erreur!!" . $e->getMessage());
        }
    }
}
?>