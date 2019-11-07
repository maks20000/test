<?php

interface IZmtech {

    public function ZMgetInfo();

    public function ZMsendSms( $pack );
        
    public function ZMsendViber( $pack );
       
    public function ZMgetStatuses();

}


?>