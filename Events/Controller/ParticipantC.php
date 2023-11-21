<?php   
    include_once '../Opener.php' ;
    class ParticipantC{
        public function listParticipants()
        {
            try
            {
                $stmnt = 'SELECT * FROM participant' ;
                $pd = config::getConnexion() ;
                return $pd->query($stmnt) ;    
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
                'INSERT INTO participant (id_EventPar, Nbtkt_Participant)
                    Values(:MatE ,:Nbtkt) '
                ) ; 
                $pst->execute(['MatE'=>$participant->getMatEP() , 'Nbtkt'=>$participant->getNBTKTP()]);  
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
                $stmt = $db->prepare('SELECT * FROM participant WHERE id_Participant like :Matricule');
                $stmt->execute(['Matricule' => '%' . $Mat . '%']);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            catch(Exception $e)
            {
                die("Erreur!!".$e->getMessage()) ;
            } 
        }
    }
?>