<?php
include '../Opener.php';

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
                    VALUES(NULL, :nom_cat)'
            ) ;
            $pst->execute(['nom_cat' => $categorie->nom_cat]);
        }
        catch(Exception $e)
        {
            die("Erreur!!".$e->getMessage()) ;
        }
    }

    public function updatecategorie($categorie, $Id_categorie)
    {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE categorie SET nom_cat = :nom_cat
            WHERE Id_categorie  = :Id_categorie '
        );
        try {
            $query->execute([
                'Id_categorie ' => $Id_categorie,
                'nom_cat' => $categorie->nom_cat
            ]);
        } catch (Exception $e) {
            die("Erreur!!" . $e->getMessage());
        }
    }
}
?>
