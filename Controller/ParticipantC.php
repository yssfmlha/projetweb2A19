<?php   
    include_once 'c:\xampp\htdocs\projet_web\config.php' ;
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
        public function listParticipant($Mat , $MatP)
        {
            try
            {
                $db = Config::getConnexion();
                $stmt = $db->prepare('SELECT * FROM participant WHERE id_Participant =:Matricule AND id_EventPar =:MatP ');
                $stmt->execute(['Matricule' => $Mat , 'MatP' => $MatP ]);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            catch(Exception $e)
            {
                die("Erreur!!".$e->getMessage()) ;
            }    
        }
        public function delParticipant($id,$idevent)
        {
            $stmnt = 'DELETE FROM participant WHERE id_Participant=:Matricule AND id_EventPar=:id' ;
            $pd = config::getConnexion() ;
            $pst = $pd->prepare($stmnt) ;
            $pst->bindValue ('Matricule',$id) ;
            $pst->bindValue ('id',$idevent) ;
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
                'INSERT INTO participant (id_Participant,id_EventPar, Nbtkt_Participant , DateP_Achat , QrCode_Participant )
                    Values(:idP ,:MatE ,:Nbtkt ,:DateP , :Code ) '
                ) ; 
                $pst->execute(['idP'=>$participant->getMatP() ,'MatE'=>$participant->getMatEP() , 'Nbtkt'=>$participant->getNBTKTP() , 'DateP'=>$participant->getDateAP() ,
                               'Code'=>$participant->getQrC()] );  
            }
             catch(Exception $e)
            {
                die("Erreur!!".$e->getMessage()) ;
            }
        }

        public function UpdParticipant( $Nbtkt , $Mat , $MatE )
        {
            $pd = config::getConnexion() ;
            $pst = $pd->prepare('UPDATE participant SET Nbtkt_Participant = Nbtkt_Participant + :NewQuantity 
                WHERE id_Participant = :Matricule AND id_EventPar =:MatE ');
            try
            {
                $pst->execute(['Matricule'=>$Mat ,'NewQuantity'=>$Nbtkt , 'MatE'=>$MatE ]);  
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
        public function CherPaticipant_MatE($Mat)
        {
            try
            {
                $db = Config::getConnexion();
                $stmt = $db->prepare('SELECT * FROM participant WHERE id_EventPar LIKE :Matricule');
                $stmt->execute(['Matricule' => '%' . $Mat . '%']);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            catch(Exception $e)
            {
                die("Erreur!!".$e->getMessage()) ;
            } 
        }
        public function CherPaticipant_NT($Mat)
        {
            try
            {
                $db = Config::getConnexion();
                $stmt = $db->prepare('SELECT * FROM participant WHERE Nbtkt_Participant =:Matricule');
                $stmt->execute(['Matricule' => $Mat]);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            catch(Exception $e)
            {
                die("Erreur!!".$e->getMessage()) ;
            } 
        }
        public function CherPaticipant_DA($Mat)
        {
            try
            {
                $db = Config::getConnexion();
                $stmt = $db->prepare('SELECT * FROM participant WHERE DateP_Achat >= :Matricule');
                $stmt->execute(['Matricule' => $Mat]);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            catch(Exception $e)
            {
                die("Erreur!!".$e->getMessage()) ;
            } 
        }
        public function getTopSalesEvents()
        {
            $stmt = 'SELECT id_EventPar, SUM(Nbtkt_Participant) AS totalTickets 
                     FROM participant 
                     GROUP BY id_EventPar 
                     ORDER BY totalTickets DESC 
                     LIMIT 5';
            $pdo = config::getConnexion();
            $query = $pdo->prepare($stmt);
            try
            {
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
            catch (Exception $e) 
            {
                die("Erreur!!" . $e->getMessage());
            }
        }
}
?>