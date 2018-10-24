<?php

namespace source\request;

require_once __DIR__.'/interfaces/GetDataByName.php';


class RequestEntity {
    
    private $type;
    private $headers;
    private $cookies;
    private $params;
    protected $dataHeaders;
    protected $dataCookies;


    public function __construct(
            string $type, 
            array $headers, 
            array $cookies, 
            array $params, 
            intefaces\GetDataByName $dataHeaders, 
            intefaces\GetDataByName $dataCookies
            ){
        
        $this->type = $type;
        $this->headers = $headers;
        $this->cookies = $cookies;
        $this->params = $params;
        $this->dataCookies = $dataCookies;
        $this->dataHeaders = $dataHeaders;
    }
    
    
    /**
     * 
     * @return string
     */
    public function getType(){
        
        return $this->type;
    }
    
    /**
     * 
     * @return array
     */
    public function getHeaders(){
        
        return $this->headers;
    }
    
    /**
     * 
     * @return array
     */
    public function getCookies(){
        
        return $this->cookies;
    }
    
    /**
     * 
     * @return array
     */
    public function getParams(){
        
        return $this->params;
    }
    
    /**
     * Find headers or cokkies by name
     * 
     * @param GetCookiesByName $method || GetHeadersByName $method
     * @param array $data
     * @param string $name
     * @return array || bool
     */
    public function getDataByName(intefaces\GetDataByName $method, array $data, $name){
        
        return $method->getData($data, $name);
    }
    
    
}


