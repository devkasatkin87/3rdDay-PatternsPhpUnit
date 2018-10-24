<?php

namespace source\response;

require_once __DIR__.'/interfaces/sendingMethods.php';

use source\response\interfaces\sendingMethods;

class ResponseEntity {
    
    private $code;
    private $headers;
    private $cookies;
    private $content;
    protected $sendData;


    public function __construct(int $code, array $headers, array $cookies, string $content, sendingMethods $sendData) {
        
        $this->code = $code;
        $this->headers = $headers;
        $this->cookies = $cookies;
        $this->content = $content;
        $this->sendData = $sendData;
    }

    /**
     * @return int
     * 
     */
    public function getCode() {
        
        return $this->code;
    }
    
    /**
     * @return array
     * 
     */
    public function getHeaders(): array {
        
        return $this->headers;
    }
    
    /**
     * @return array
     * 
     */
    public function getCookies(): array {
        
        return $this->cookies;
    }
    
    /**
     * @return string
     * 
     */
    public function getContent() {
        
        return $this->content;
    }
    
    /**
     * 
     * @param int $code
     *      */
    function setCode($code) {
        
        $this->code = $code;
    }
    
    /**
     * @param array $headers
     * 
     */
    public function setHeaders($headers) {
        
        $this->headers = $headers;
    }

    /**
     * @param array $cookies
     * 
     */
    public function setCookies($cookies) {
        
        $this->cookies = $cookies;
    }

    /**
     * 
     * @param string $content
     *      */
    public function setContent($content) {
        
        $this->content = $content;
    }
    
    /**
     * Send Response data
     * @param int $code
     * @param array $cookies
     * @param int $timeExpire in sec
     * @param array $headers
     */
    public function sendResponseData($code, $cookies, $timeExpire, $headers){
        
        $this->sendData->sendCode($code);
        $this->sendData->sendCookies($cookies, $timeExpire);
        $this->sendData->sendHeaders($headers);
        
        return true;
    }
    
    /**
     * Displays content on the page
     * 
     */
    public function viewContent(){
        
        return $this->sendData->viewContent($this->content);
    }
    
}
