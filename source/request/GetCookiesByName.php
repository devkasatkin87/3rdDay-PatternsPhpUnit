<?php

namespace source\request;

require_once 'source/request/interfaces/GetDataByName.php';

use source\request\intefaces\GetDataByName;

class GetCookiesByName implements GetDataByName{
    
    /**
     * Find Cookies by name
     *
     * @param array $cookies
     * @param string $name 
     * 
     * @return array || bool
     */
    public function getData(array $cookies, string $name) {
        
        foreach ($cookies as $nameCookie => $contentCookie){
    
            if ($nameCookie == $name){
                return [$nameCookie => $contentCookie];
            }
        }
        return false;
    }
}