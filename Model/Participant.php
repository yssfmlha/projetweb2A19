<?php
    class Participant
    {
        public $Mat_Part ;
        public $MatEvt_Part ;
        public $NBTKT_Part ;
        public $DateP_Achat ;
        public $QrC_Part ;
        public function __construct($Mat , $MatEvt , $Nbr_Tkt , $DateA , $QRC)
        {
            $this->Mat_Part = $Mat ;
            $this->MatEvt_Part = $MatEvt ;
            $this->NBTKT_Part = $Nbr_Tkt ;
            $this->DateP_Achat = $DateA ;
            $this->QrC_Part = $QRC ;
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
        public function getDateAP()
        {
            return $this->DateP_Achat ;
        }
        public function getQrC()
        {
            return $this->QrC_Part ;
        }

    } 
?>