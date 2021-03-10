<?php

use app\service\UserService;

class ServiceTest extends PHPUnit\Framework\TestCase
{
    public function testCase1()
    {
        $service = new UserService();
        $users = $service->getUsers();
        $this->assertEquals(2, count($users));
    }
}