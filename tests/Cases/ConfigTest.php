<?php
/**
 * This file is part of Mini.
 * @auth lupeng
 */
declare(strict_types=1);

namespace Tests\Cases;

use Tests\TestCase;

class ConfigTest extends TestCase
{
    public function testGetConfig(): void
    {
        $this->assertEquals('Asia/Shanghai', \Mini\Config::getInstance()->get('mini.timezone'));
    }
}