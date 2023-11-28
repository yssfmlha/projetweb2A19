<?php
require '../config.php';
class userC 
{
    public function listuser()
    {
        $sql="SELECT *FROM user_db";
        $db=config::getConnexion();
        try
        {
            $list=$db->query($sql);
            return $list;
        }
        catch(Exception $e)
        {
            die('Erreur'.$e->getMessage());
        }
    }
    public function ajouter_user($user)
    {
        $sql='INSERT INTO users VALUES(:namee,:email,:pass)';
        $db=config::getConnexion();
        try
        {
           $query=$db->prepare($sql);
           $query->execute([
           'namee'=>$user->getNom(), 
           'email'=>$user->getemail(),'pass'=>$user->getpass()
            ]);

        }catch (Exception $e)
        {
            die('Erreur' . $e->getMessage());
        }
    }
    public function deleteuser($id)
    {
        $sql="DELETE FROM user_db WHERE namee=:id";
        $db=config::getConnexion();
        $req=$db->prepare ($sql);
        $req->bindValue (':id',$id) ;
        try
        {
            $req->execute();

        }catch (Exception $e)
        {
            die('Erreur' . $e->getMessage());
        }

    }
}  
?>