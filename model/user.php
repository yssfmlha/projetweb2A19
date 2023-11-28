<?php
    class user
    {
       
        public $name;
        public $email;
        public $password;
        public function __construct($name,$email,$password)
        {
             
            $this->name=$name;  
            $this->email=$email; 
            $this->password=$password;  

        }
        public function setNom($n)
        {
            $this->name=$n;
        }
        public function getNom()
        {
            return $this->firstname;
        }
        
       
        public function getEmail()
        {
            return $this->email;
        }
        public function setEmail($n)
        {
            $this->email=$n;
        }
        public function getpass()
        {
            return $this->password;
        }
        public function setpassword($n)
        {
            $this->password=$n;
        }
       
    }
?>