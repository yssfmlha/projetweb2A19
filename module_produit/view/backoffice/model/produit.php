<?php
class produit
{
    private ?int $id_produit = null;
    private ?string $nom_produit = null;
    private ?string $prix_produit = null;
    private ?string $qte_produit = null;


    public function __construct($id = null, $n, $p, $a)
    {
        $this->id_produit = $id;
        $this->nom_produit = $n;
        $this->prix_produit = $p;
        $this->qte_produit = $a;
        
    }


    public function getid_produit()
    {
        return $this->id_produit;
    }


    public function getnom_produit()
    {
        return $this->nom_produit;
    }


    public function setnom_produit($nom_produit)
    {
        $this->nom_produit = $nom_produit;

        return $this;
    }


    public function getprix_produit()
    {
        return $this->prix_produit;
    }


    public function setprix_produit($prix_produit)
    {
        $this->prix_produit = $prix_produit;

        return $this;
    }


    public function getqte_produit()
    {
        return $this->qte_produit;
    }


    public function setqte_produit($qte_produit)
    {
        $this->qte_produit = $qte_produit;

        return $this;
    }


   
}
