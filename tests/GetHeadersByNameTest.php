<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__.'/../source/request/GetHeadersByName.php';

class GetHeadersByNameTest extends TestCase {
    
    /**
     * @test
     * 
     * @dataProvider examplData
     * 
     */
    
    public function testGetData(array $valueArray, string $valueName, string $expect){
        
        $instance = new source\request\GetHeadersByName;
        
        $this->assertNotFalse($instance->getData($valueArray, $valueName));
        $this->assertEquals($expect, $instance->getData($valueArray, $valueName));
        
    }
    
    public function examplData(){
        
        return [
            'case_0' => [
                'valueArray' => ['Connection: Keep-Alive','Server: Nginx', 'Content-type :text/pdf'],
                'valueName' => 'Connection',
                'expect' => 'Connection: Keep-Alive'
            ],
            'case_1' => [
                'valueArray' => ['Connection: Keep-Alive','Server: Nginx', 'Content-type :text/pdf'],
                'valueName' => 'server',
                'expect' => 'Server: Nginx'
            ],
            'case_2' => [
                'valueArray' => ['Connection: Keep-Alive','Server: Nginx', 'Content-type :text/pdf'],
                'valueName' => 'content',
                'expect' => 'Content-type :text/pdf'
            ],
        ];
    }

}
