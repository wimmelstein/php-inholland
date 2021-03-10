<?php


namespace app\core;
require_once dirname(__FILE__) . '/../bootstrap.php';

class Response
{
    public function setStatus(int $code)
    {
        http_response_code($code);
    }
}