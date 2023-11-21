<?php
    class Participant
    {
        public $Mat_Part ;
        public $MatEvt_Part ;
        public $NBTKT_Part ;
        public function __construct($Mat = NULL ,$MatEvt,$Nbr_Tkt)
        {
            $this->Mat_Part = $Mat ;
            $this->MatEvt_Part = $MatEvt ;
            $this->NBTKT_Part = $Nbr_Tkt ;
        }

        public function getMatP()
        {
            return $this->Mat_Part ;
        }

        public function getMatEP()
        {
            return $this->MatEvt_Part ;
        }

        public function getNBTKTP()
        {
            return $this->NBTKT_Part ;
        }

    } 
?>