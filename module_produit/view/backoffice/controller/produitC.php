<?php

require '../config.php';

class produitC
{

    public function listproduit()
    {
        $sql = "SELECT * FROM produit";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteproduit($id_produit)
    {
        $sql = "DELETE FROM produit WHERE id_produit = :id_produit";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_produit', $id_produit);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addproduit($produit)
    {
       
        $sql = "INSERT INTO produit 
        VALUES (NULL, :nom_produit,:prix_produit, :qte_produit)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom_produit' => $produit->getnom_produit(),
                'prix_produit' => $produit->getprix_produit(),
                'qte_produit' => $produit->getqte_produit(),
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function showproduit($id_produit)
    {
        $sql = "SELECT * from produit where id_produit = $id_produit";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $produit = $query->fetch();
            return $produit;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateproduit($produit, $id_produit)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE produit SET 
                nom_produit = :nom_produit, 
                prix_produit = :prix_produit, 
                qte_produit = :qte_produit 
                
            WHERE id_produit= :id_produit'
        );

        $query->execute([
            'id_produit' => $id_produit,
            'nom_produit' => $produit->getnom_produit(),
            'prix_produit' => $produit->getprix_produit(),
            'qte_produit' => $produit->getqte_produit()
        ]);

        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        throw $e; // Rethrow the exception to propagate the error
    }
}
}
