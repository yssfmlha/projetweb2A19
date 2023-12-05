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
    public function SearchStartup($Nom1)
    {
            try
            {
                $db = Config::getConnexion();
                $stmt = $db->prepare('SELECT * FROM startup2 WHERE Nom = :Nom1');
                $stmt->execute(['Nom1' => $Nom1]);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            catch(Exception $e)
            {
                die("Erreur!!".$e->getMessage()) ;
            } 
    }
    public function statistiqueDomaine() {
        $startups = $this->afficherstartup(); 

        $domaineCount = array();

        foreach ($startups as $startup) {
            $domaine = $startup['domaine'];

            if (isset($domaineCount[$domaine])) {
                $domaineCount[$domaine]++;
            } else {
                $domaineCount[$domaine] = 1;
            }
        }

        // Préparer les données pour le graphique
        $domaines = array_keys($domaineCount);
        $nombreStartups = array_values($domaineCount);

        // Générer le code JavaScript pour le graphique
        echo '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';
        echo '<canvas id="myChart" width="100" height="100"></canvas>';
        echo '<script>';
        echo 'var ctx = document.getElementById("myChart").getContext("2d");';
        echo 'var myChart = new Chart(ctx, {';
        echo 'type: "bar",';
        echo 'data: {';
        echo 'labels: ' . json_encode($domaines) . ',';
        echo 'datasets: [{';
        echo 'label: "Nombre de Startups par Domaine",';
        echo 'data: ' . json_encode($nombreStartups) . ',';
        echo 'backgroundColor: "rgba(75, 192, 192, 0.2)",';
        echo 'borderColor: "rgba(75, 192, 192, 1)",';
        echo 'borderWidth: 1';
        echo '}]';
        echo '},';
        echo 'options: {';
        echo 'scales: {';
        echo 'y: {';
        echo 'beginAtZero: true';
        echo '}';
        echo '}';
        echo '}';
        echo '});';
        echo '</script>';
    }
}
?>