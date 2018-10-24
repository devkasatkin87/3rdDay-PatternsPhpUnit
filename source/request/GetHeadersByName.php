<?php

namespace source\request;

require_once 'source/request/interfaces/GetDataByName.php';

use source\request\intefaces\GetDataByName;

class GetHeadersByName implements GetDataByName {
    
    /**
     * Find Request Header by name
     *
     * @param array $headers
     * @param string $name 
     * 
     * @return array || bool
     */
    public function getData(array $headers, string $name) {
        
            foreach ($headers as $header){
                
                if (stristr($header, $name)){
                    
                    return stristr($header, $name);
                }
            }
        return false;
    }
}
