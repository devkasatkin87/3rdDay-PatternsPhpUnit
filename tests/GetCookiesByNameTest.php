<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__.'/../source/request/GetCookiesByName.php';

class GetCookiesByNameTest extends TestCase {
    
    /**
     * @test
     * 
     * @dataProvider examplData
     * 
     */
    
    public function testGetData(array $valueArray, string $valueName, array $expect){
        
        $instance = new source\request\GetCookiesByName();
        
        $this->assertNotFalse($instance->getData($valueArray, $valueName));
        $this->assertEquals($expect, $instance->getData($valueArray, $valueName));
        
    }
    
    public function examplData(){
        
        return [
            'case_0' => [
                'valueArray' => ['user' => 'i_user','login' => 'username', 'date' => '23-10-2018'],
                'valueName' => 'user',
                'expect' => ['user' => 'i_user']
            ],
            'case_1' => [
                'valueArray' => ['user' => 'i_user','login' => 'username', 'date' => '23-10-2018'],
                'valueName' => 'login',
                'expect' => ['login' => 'username']
            ],
            'case_2' => [
                'valueArray' => ['user' => 'i_user','login' => 'username', 'date' => '23-10-2018'],
                'valueName' => 'date',
                'expect' => ['date' => '23-10-2018']
            ],
        ];
    }

}
