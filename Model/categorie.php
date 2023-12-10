<?php
// Dans votre fichier categorie.php
class categorie
{
    public $Id_categorie;
    public $nom_cat;
    public $date;

    public function __construct($Id_categorie = NULL, $nom_cat,$date)
    {
        $this->Id_categorie = $Id_categorie;
        $this->nom_cat = $nom_cat;
        $this->date= $date;
    }

    public function get_Id_categorie()
    {
        return $this->Id_categorie;
    }

    public function getnom_cat()
    {
        return $this->nom_cat;
    }

    public function setnom_cat($n)
    {
        $this->nom_cat = $n;
    }
    public function getdate()
    {
        return $this->date;
    }

    public function setdate($d)
    {
        $this->date = $d;
    }
}

?>

