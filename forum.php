<?php
    class forum
    {
        public $id;
        public $auther;
        public $title;
        public $text;
        public $date;
    
        public function __construct($id=NULL ,$auther,$title, $text,$date)
        {
            $this->id = $id ;
            $this->auther = $auther;
            $this->title = $title ;
            $this->text = $text ;
            $this->date = $date ;
        }
        public function getauther()
        {
            return $this->auther;
        }
        public function gettitle()
        {
            return $this->title;
        }
        public function gettext()
        {
            return $this->text;
        }
        public function getdate()
        {
            return $this->date;
        }
        
    }
?>