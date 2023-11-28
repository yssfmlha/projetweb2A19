<?php   
    include '../Opener.php' ;
    class EventC{
        public function listEvents()
        {
            try
            {
                $stmnt = 'SELECT * FROM Events' ;
                $pd = config::getConnexion() ;
                return $pd->query($stmnt)->fetchAll(PDO::FETCH_ASSOC) ;  
            }
            catch(Exception $e)
            {
                die("Erreur!!".$e->getMessage()) ;
            }
        }
        public function delEvent($id)
        {
            $stmnt = 'DELETE FROM Events WHERE Mat_Event=:Matricule' ;
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
        public function AddEvent($Event)
        {
            try
            {
                $pd = config::getConnexion() ;
                $pst = $pd->prepare(
                'INSERT INTO Events
                    Values(:Mat , :Nom ,:Adresse ,:Edate ,:DateF ,:Comment , :Prix ,:NbTKT) '
                ) ; 
                $pst->execute(['Mat'=>$Event->getMatE(),'Nom'=>$Event->getNomE(),'Adresse'=>$Event->getAdresseE(),'Edate'=>$Event->getDateE(),
                'DateF'=>$Event->getDateFE(),'Comment'=>$Event->getCommentE(),'Prix'=>$Event->getPriceE(),'NbTKT'=>$Event->getNTKTE()]);  
            }
             catch(Exception $e)
            {
                die("Erreur!!".$e->getMessage()) ;
            }
        }

        public function UpdEvent( $Event , $Mat )
        {
            $pd = config::getConnexion() ;
            $pst = $pd->prepare(
            'UPDATE Events SET Mat_Event = :Mat , Nom_Event = :Nom , Adresse_Event = :Adresse , Date_Event = :Edate , DateF_Event = :DateF ,
             About_Event = :Comment , Price_Event = :Prix , NBTKT_Event=:NTKT where Mat_Event = :Matricule'
            ) ;
            try
            {
                $pst->execute(['Matricule'=>$Mat,'Mat'=>$Event->getMatE(),'Nom'=>$Event->getNomE(),'Adresse'=>$Event->getAdresseE(),'Edate'=>$Event->getDateE(),
                'DateF'=>$Event->getDateFE(),'Comment'=>$Event->getCommentE(),'Prix'=>$Event->getPriceE(),'NTKT'=>$Event->getNTKTE()]);  
            }
            catch(Exception $e)
            {
                die("Erreur!!".$e->getMessage()) ;
            }
        }
        public function CherEvent($Mat)
        {
            try
            {
                $db = Config::getConnexion();
                $stmt = $db->prepare('SELECT * FROM Events WHERE Mat_Event = :Matricule');
                $stmt->execute(['Matricule' => $Mat]);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            catch(Exception $e)
            {
                die("Erreur!!".$e->getMessage()) ;
            } 
        }
        public function CherEarliestEvent()
        {
            try
            {
                $db = Config::getConnexion();
                $stmt = $db->prepare('SELECT * FROM Events ORDER BY Date_Event LIMIT 1');
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            catch(Exception $e)
            {
                die("Erreur!!" . $e->getMessage());
            }
        }
    }
?>