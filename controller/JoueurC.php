<?php
require '../config.php';
class userC 
{
    public function listuser()
    {
        $sql="SELECT *FROM user";
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
    public function deleteuser($id)
    {
        $sql="DELETE FROM user WHERE iduser=:id";
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

    public function ajouter_user($user)
    {
        $sql='INSERT INTO user VALUE(:user,:domaine,:firstname,:lastname,:email,:passs)';
        $db=config::getConnexion();
        try
        {
           $query=$db->prepare($sql);
           $query->execute(['Nom_user'=>$user->get_Nom_user(),
           'firstname'=>$user->getNom(),'lastname'=>$user->getPrenom(), 
           'email'=>$user->getemail(),'pass'=>$user->getpass()
            ]);

        }catch (Exception $e)
        {
            die('Erreur' . $e->getMessage());
        }
    }
    public function modifier_user($user,$id)
    {
        $db=config::getConnexion();
        $query=$db->prepare('UPDATE user SET ,firstname=:firstname,lastname=:lastname,email=:email,pass=:pass WHERE Nom_user=:id');
        try
        {
            $query->execute(['Nom_user'=>$id,'domaine'=>$user->'nom'=>$user->getffirstname(),
            'prénom'=>$user->getlastname(),
            'email'=>$user->getEmail(),'tel'=>$user->getpass()]);
        }catch (Exception $e)
        {
            die('Erreur' . $e->getMessage());
        }
    }

}  



?>