<?php
require '../opener.php';


class categorieC 
{   
    public function getcategorie($Id_categorie)
    {
        try
        {
            $stmnt = 'SELECT * FROM categorie WHERE Id_categorie = :Id_categorie';
            $pd = config::getConnexion();
            $pst = $pd->prepare($stmnt);
            $pst->bindValue(':Id_categorie', $Id_categorie);
            $pst->execute();

            return $pst->fetch(PDO::FETCH_ASSOC);
        }
        catch(Exception $e)
        {
            die("Erreur!!" . $e->getMessage());
        }
    }
    public function listcategorie()
    {
        try
        {
            $stmnt = 'SELECT * FROM categorie' ;
            $pd = config::getConnexion() ;
            return $pd->query($stmnt) ;    
        }
        catch(Exception $e)
        {
            die("Erreur!!".$e->getMessage()) ;
        }
    }

    public function deletecategorie($id)
    {
        $stmnt = 'DELETE FROM categorie WHERE Id_categorie =:id' ;
        $pd = config::getConnexion() ;
        $pst = $pd->prepare($stmnt) ;
        $pst->bindValue(':id', $id) ;
        try
        {
            $pst->execute() ;    
        }
        catch(Exception $e)
        {
            die("Erreur!!".$e->getMessage()) ;
        }
    }

    public function addcategorie($categorie)
    {
        try
        {
            $pd = config::getConnexion() ;
            $pst = $pd->prepare(
                'INSERT INTO categorie
                    VALUES(NULL, :nom_cat,:date)'
            ) ;
            $pst->execute(['nom_cat' => $categorie->nom_cat,'date'=>$categorie->date]);
        }
        catch(Exception $e)
        {
            die("Erreur!!".$e->getMessage()) ;
        }
    }
    function showcategorie($Id_categorie)
    {
        $sql = "SELECT * from categorie where Id_categorie = $Id_categorie";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $joueur = $query->fetch();
            return $categorie;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

public function updatecategorie($categorie, $Id_categorie)
{
    $db = config::getConnexion();
    $query = $db->prepare(
        'UPDATE categorie SET nom_categorie = :nom_cat
        WHERE Id_categorie = :Id_categorie'  // Remove the extra space in ':Id_categorie '
    );
    try {
        $query->execute([
            'Id_categorie' => $Id_categorie,
            'nom_cat' => $categorie->getnom_cat()
        ]);
    } catch (Exception $e) {
        die("Erreur!!" . $e->getMessage());
    }
}


public function SearchProjet($Id_categorie)
    {
        try
        {
            $db = Config::getConnexion();
            $stmt = $db->prepare('SELECT * FROM categorie WHERE Id_categorie = :Id_categorie');
            $stmt->execute(['Id_categorie' => $Id_categorie]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e)
        {
            die("Erreur!!".$e->getMessage()) ;
        } 
    }

}


?>
