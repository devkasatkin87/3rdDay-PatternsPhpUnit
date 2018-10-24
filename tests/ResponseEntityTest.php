<?php

require_once __DIR__.'/../source/response/ResponseEntity.php';

use PHPUnit\Framework\TestCase;

class ResponseEntityTest extends PHPUnit\Framework\TestCase{
    
    public function testSendReponseData(){
        
        $dataMethodStub = $this->getMockBuilder(source\response\sendDataResponse::class)
                                ->disableOriginalConstructor()
                                ->setMethods(['sendCode', 'sendCookies', 'sendHeaders'])
                                ->getMock();
        $dataMethodStub->method('sendCode')->willReturn(true);
        $dataMethodStub->method('sendCookies')->willReturn(true);
        $dataMethodStub->method('sendHeaders')->willReturn(true);
        
        $instance = new \source\response\ResponseEntity(200, [], [], '', $dataMethodStub);
        
        $this->assertTrue($instance->sendResponseData($instance->getCode(), $instance->getCookies(), 1800, $instance->getHeaders()));
    }
}
