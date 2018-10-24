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
     * @return string || bool
     */
    public function getData(array $headers, $name) {
            
            $result = '';
            
            foreach ($headers as $header){
                
                if ($result = stristr($header, $name)){
                    
                    return $result;
                }
            }
        return false;
    }
}
