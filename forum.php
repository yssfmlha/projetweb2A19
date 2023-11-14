<?php
    class forum
    {
        public $idpost;
        public $text;
        public $image;
    
        public function __construct($id=NULL , $text,$image)
        {
            $this->idpost = $id ;
            $this->text = $text ;
            $this->image = $image ;
        }
        public function gettext()
        {
            return $this->text;
        }
        public function getimage()
        {
            return $this->image;
        }
        
    }
?>