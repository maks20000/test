<?php
require_once 'IZmtech.php';
class sms implements IZmtech {
    public $url;
    public $header=[];
    private $response;

    public function __construct ($url, $header=[]) {
        $this->url=$url;
        $this->header=$header;
    }
    
    public function ZMgetInfo() {
        return $this->request( '/' );
    }

    public function ZMsendSms( $pack ) {
        if ( ! isset( $pack[ 0 ] ) || ! is_array( $pack[ 0 ] ) ) {
            $pack = [ $pack ];
        }
        return $this->request( '/brand', [ 'pack' => $pack ] );
    }
        
    public function ZMsendViber( $pack ) {
        if ( ! isset( $pack[ 0 ] ) || ! is_array( $pack[ 0 ] ) ) {
            $pack = [ $pack ];
        }
        return $this->request( '/viber', [ 'pack' => $pack ] );
    }
       
    public function ZMgetStatuses() {
        return $this->request( '/statuses' );
    }
    
    private function request ($url_path, $params=[]) {
        $curl = curl_init();
        curl_setopt( $curl, CURLOPT_URL, $this->url.$url_path);
        curl_setopt( $curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json'
        ] );
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode(array_merge($this->header,$params))); 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HEADER, 1);
        $this->response = curl_exec($curl);
        $header_size = curl_getinfo( $curl, CURLINFO_HEADER_SIZE );
        $http_code = curl_getinfo( $curl, CURLINFO_HTTP_CODE );
        $body = substr( $response, $header_size );
        $headers = substr( $response, 0, $header_size );
        curl_close( $curl );
        return $http_code;
    }
}

?>