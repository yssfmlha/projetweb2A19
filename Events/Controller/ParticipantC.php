<?php   
    include_once '../Opener.php' ;
    class ParticipantC{
        public function listParticipants()
        {
            try
            {
                $stmnt = 'SELECT * FROM participant' ;
                $pd = config::getConnexion() ;
                return $pd->query($stmnt)->fetchAll(PDO::FETCH_ASSOC) ;  
            }
            catch(Exception $e)
            {
                die("Erreur!!".$e->getMessage()) ;
            }
        }
        public function delParticipant($id)
        {
            $stmnt = 'DELETE FROM participant WHERE id_Participant=:Matricule' ;
            $pd = config::getConnexion() ;
            $pst = $pd->prepare($stmnt) ;
            $pst->bindValue ('Matricule',$id) ;
            try
            {
                $pst->execute() ;    
            }
            catch(Exception $e)
            {
                die("Erreur!!".$e->getMessage()) ;
            }
        }

        public function AddParticipant($participant)
        {
            try
            {
                $pd = config::getConnexion() ;
                $pst = $pd->prepare(
                'INSERT INTO participant (id_EventPar, Nbtkt_Participant , DateP_Achat)
                    Values(:MatE ,:Nbtkt ,:DateP) '
                ) ; 
                $pst->execute(['MatE'=>$participant->getMatEP() , 'Nbtkt'=>$participant->getNBTKTP() , 'DateP'=>$participant->getDateAP()]);  
            }
             catch(Exception $e)
            {
                die("Erreur!!".$e->getMessage()) ;
            }
        }

        public function UpdParticipant( $Nbtkt , $Mat )
        {
            $pd = config::getConnexion() ;
            $pst = $pd->prepare(
            'UPDATE participant SET  Nbtkt_Participant = :NBTKT where id_Participant = :Matricule'
            ) ;
            try
            {
                $pst->execute(['Matricule'=>$Mat ,'NBTKT'=>$Nbtkt]);  
            }
            catch(Exception $e)
            {
                die("Erreur!!".$e->getMessage()) ;
            }
        }
        public function CherPaticipant($Mat)
        {
            try
            {
                $db = Config::getConnexion();
                $stmt = $db->prepare('SELECT * FROM participant WHERE id_Participant LIKE :Matricule');
                $stmt->execute(['Matricule' => '%' . $Mat . '%']);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            catch(Exception $e)
            {
                die("Erreur!!".$e->getMessage()) ;
            } 
        }
        public function TotalSale($id)
        {
            $stmt = 'SELECT SUM(Nbtkt_Participant) AS totalTickets FROM participant WHERE id_EventPar = :id';
            $pdo = config::getConnexion();
            $query = $pdo->prepare($stmt);
            $query->bindValue(':id', $id);
            try
            {
                $query->execute();
                $result = $query->fetch(PDO::FETCH_ASSOC);
                $totalTickets = $result['totalTickets'];
                return $totalTickets;
            }
            catch(Exception $e)
            {
                die("Erreur!!" . $e->getMessage());
            }
        }
        public function PastWeekSales($id)
        {
            date_default_timezone_set('Africa/Tunis');
            $currentDate = date('Y-m-d');
            $startOfPastWeek = date('Y-m-d', strtotime('-6 days', strtotime($currentDate)));
            $weekSales = [];
            for ($i = 0; $i < 7; $i++) {
                $currentDay = date('Y-m-d', strtotime($startOfPastWeek . " +$i days"));
                $stmt = 'SELECT SUM(Nbtkt_Participant) AS totalTickets 
                         FROM participant 
                         WHERE DATE(DateP_Achat) = :currentDay AND id_EventPar = :id';
                $pdo = config::getConnexion();
                $query = $pdo->prepare($stmt);
                $query->bindValue(':currentDay', $currentDay);
                $query->bindValue(':id', $id);
                try {
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_ASSOC);
                    $totalTickets = $result['totalTickets'] ?? 0;
                    $weekSales[$currentDay] = $totalTickets;
                } catch (Exception $e) {
                    die("Erreur!!" . $e->getMessage());
                }
            }
            return $weekSales;
        }     
    }
?>