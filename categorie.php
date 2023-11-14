<?php
// Dans votre fichier categorie.php
class categorie
{
    public $Id_cat;
    public $nom_cat;

    public function __construct($id = NULL, $nom_cat)
    {
        $this->Id_cat = $id;
        $this->nom_cat = $nom_cat;
    }

    public function get_Id_cat()
    {
        return $this->Id_cat;
    }

    public function setnom_cat($n)
    {
        $this->nom_cat = $n;
    }
}

?>

