<?php

require_once __DIR__.'/../source/response/sendDataResponse.php';

use PHPUnit\Framework\TestCase;

class SendDataResponseTest extends TestCase {
    
    /**
     * @test
     * @runInSeparateProcess
     */
    
    public function testSendCode() {
    
        $instance = new \source\response\sendDataResponse;
        
        $this->assertTrue($instance->sendCode(200));
    }
    
    /**
     * @test
     * @runInSeparateProcess
     * 
     */
    
    public function testSendCookies() {
    
        $instance = new \source\response\sendDataResponse;
        
        $this->assertTrue($instance->sendCookies([
                                                    'username'=>'login', 
                                                    'date'=>'24-10-2018'
                                                    ], 1800));
    }
    
    /**
     * @test
     * @runInSeparateProcess
     * 
     */
    
    public function testSendHeaders() {
    
        $instance = new \source\response\sendDataResponse;
        
        $this->assertTrue($instance->sendHeaders([
                                                    'Server'=>'Nginx 2.27', 
                                                    'Connection: keep-alive'
                                                ]));
    }
    
    /**
     * @test
     * 
     * @dataProvider ContentForTest
     *      */
    public function testViewContent($content, $expect){
        
        $instance = new \source\response\sendDataResponse;
        
        $this->assertEquals($expect, $instance->viewContent($content));
    }
    
    public function ContentForTest() {
        
        return[
            'case_0' => [
                'content' => "<h1>Hello World!</h1>",
                'expect' => "<h1>Hello World!</h1>",
                ],
            'case_1' => [
                'content' => "<p>Hello World!</p><br><hr>",
                'expect' => "<p>Hello World!</p><br><hr>",
            ],
            'case_2' => [
                'content' => "<div><h1>New Page</h1><p>Hello World!</p><br><hr></div>",
                'expect' => "<div><h1>New Page</h1><p>Hello World!</p><br><hr></div>",
            ],
        ];
    }
    
    
}
