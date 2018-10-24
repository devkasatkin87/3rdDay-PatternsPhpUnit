<?php

require_once __DIR__.'/../source/request/RequestEntity.php';

use PHPUnit\Framework\TestCase;

class RequestEntityTest extends TestCase {
    
    /**
     * @test
     * 
     * @dataProvider getDataDataProvider
     * 
     *      */
    public function sendDataTest(array $headers, array $cookies, string $type, array $params, $expectCookies, $expectHeaders, $nameHeaders, $nameCookies) {
        
        $dataCookiesMethodStub = $this->getMockBuilder(source\request\GetCookiesByName::class)
                                ->disableOriginalConstructor()
                                ->setMethods(['getData'])
                                ->getMock();
        
        $dataHeadersMethodStub = $this->getMockBuilder(source\request\GetHeadersByName::class)
                                ->disableOriginalConstructor()
                                ->setMethods(['getData'])
                                ->getMock();
        
        $dataCookiesMethodStub->method('getData')->willReturn($expectCookies);
        $dataHeadersMethodStub->method('getData')->willReturn($expectHeaders);
        
        $instance = new source\request\RequestEntity(
                                                        $type, 
                                                        $headers, 
                                                        $cookies, 
                                                        $params, 
                                                        $dataCookiesMethodStub, 
                                                        $dataHeadersMethodStub
                                                    );
        $this->assertEquals($expectHeaders, $instance->getDataByName($dataHeadersMethodStub, $headers, $nameHeaders));
        
        $this->assertEquals($expectCookies, $instance->getDataByName($dataCookiesMethodStub, $cookies, $nameCookies));
        
    }
    
    public function getDataDataProvider(){
        
        return [
            'case_0' => [
                'headers' => ['Connection: Keep-Alive','Server: Nginx', 'Content-type :text/pdf'],
                'cookies' => ['user' => 'i_user','login' => 'username', 'date' => '23-10-2018'],
                'type' => 'GET',
                'params' => [],
                'nameHeaders' =>'content',
                'nameCookies' =>'user',
                'expectCookies' => ['user' => 'i_user'],
                'expectHeaders' => 'Connection: Keep-Alive',
            ],
           'case_1' => [
                'headers' => ['Connection: Keep-Alive','Server: Nginx', 'Content-type :text/pdf'],
                'cookies' => ['user' => 'i_user','login' => 'username', 'date' => '23-10-2018'],
                'type' => 'GET',
                'params' => [],
                'nameHeaders' =>'date',
                'nameCookies' =>'login',
                'expectCookies' => ['login' => 'username'],
                'expectHeaders' => false,
            ],
            'case_2' => [
                'headers' => ['Connection: Keep-Alive','Server: Nginx', 'Content-type :text/pdf'],
                'cookies' => ['user' => 'i_user','login' => 'username', 'date' => '23-10-2018'],
                'type' => 'GET',
                'params' => [],
                'nameHeaders' =>'server',
                'nameCookies' =>'time',
                'expectCookies' => false,
                'expectHeaders' => 'Server: Nginx',
            ],
        ];
        
    }
}
