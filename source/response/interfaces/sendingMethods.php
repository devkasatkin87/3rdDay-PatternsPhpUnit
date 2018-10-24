<?php

namespace source\response\interfaces;

interface sendingMethods {
    
    public function sendCode(int $code);
    public function sendHeaders(array $headers);
    public function sendCookies(array $cookies, int $timeExpire);
    public function viewContent(string $content);
    
}
