<?php

namespace source\response;

require_once __DIR__.'/interfaces/sendingMethods.php';

use source\response\interfaces\sendingMethods;

class sendDataResponse implements sendingMethods {
    
    /**
     * Send Responding code
     * 
     * @param int $code
     *
     */
    public function sendCode(int $code){
        
        header('HTTP/1.1 ' . $code);
        
        return true;
    }

    /**
     * Send Cookies
     * 
     * @param array $cookies
     * @return bool
     */
    public function sendCookies(array $cookies, int $timeExpire) : bool{
    
        foreach ($cookies as $name => $value) {
    
            if (setcookie($name, $value, time()+$timeExpire)){
                
                return true;
            }
            
            return false;
            
        }
        
    }
    
    /**
     * Send Headers
     * 
     * @param array $headers
     * @return bool
     */
    public function sendHeaders(array $headers) {
        
        foreach ($headers as $name => $value){
       
            header("$name:$value");               
        }
        
        return true;
    }

    /**
     * Show html-content
     * 
     * @param string $name
     * @return string 
     */
    public function viewContent(string $content) {
    
        return $content;
    }

}
