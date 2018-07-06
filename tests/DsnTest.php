<?php

namespace Tests\AndreyOrs;

use AndreyOrs\Dsn;

class DsnTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     *
     * @dataProvider getCorrectDSNs
     *
     * @param string $dsn
     * @param array  $expected
     */
    public function itParsesCorrectDSN($dsn, array $expected)
    {
        $this->assertEquals($expected, Dsn::parse($dsn));
    }

    /**
     * @return array
     */
    public function getCorrectDSNs()
    {
        return [
            'empty dsn' => [
                $dsn = '',
                $expected = [
                    'adapter' => null,
                    'user' => null,
                    'pass' => null,
                    'host' => null,
                    'port' => null,
                    'name' => null,
                ],
            ],
            'mysql with host only' => [
                $dsn => 'mysql://localhost/',
                $expected = [
                    'adapter' => 'mysql',
                    'host' => 'localhost',
                    'port' => '3306',
                ],
            ],
            'mysql with host and non-default port' => [
                $dsn => 'mysql://localhost:3305/',
                $expected = [
                    'adapter' => 'mysql',
                    'host' => 'localhost',
                    'port' => '3305',
                ],
            ],
            'redis with host and port' => [
                $dsn => 'redis://localhost:6379',
                $expected = [
                    'adapter' => 'redis',
                    'host' => 'localhost',
                    'port' => '6379',
                ],
            ],
            'pgsql with host and database' => [
                $dsn => 'pgsql://localhost.localdomain/db',
                $expected = [
                    'adapter' => 'pgsql',
                    'host' => 'localhost.localdomain',
                    'name' => 'db',
                    'port' => '5432',
                ],
            ],
            'redis with ip, port and database' => [
                $dsn = 'redis://127.0.0.1:5005/1',
                $expected = [
                    'adapter' => 'redis',
                    'host' => '127.0.0.1',
                    'port' => '5005',
                    'name' => '1',
                ],
            ],
            'redis with ip, port, user, password and parameters' => [
                $dsn = 'redis://user:pass@0.0.0.0:6379/1?prefix=foo_&duration=1',
                $expected = [
                    'adapter' => 'redis',
                    'host' => '0.0.0.0',
                    'port' => '6379',
                    'name' => '1',
                    'user' => 'user',
                    'pass' => 'pass',
                    'prefix' => 'foo_',
                    'duration' => '1',
                ],
            ],
            'ftp' => [
                $dsn = 'ftp://user:pass@1.1.1.1/folder',
                $expected = [
                    'adapter' => 'ftp',
                    'user' => 'user',
                    'pass' => 'pass',
                    'host' => '1.1.1.1',
                    'name' => 'folder',
                    'port' => '21',
                ],
            ],
            'sftp' => [
                $dsn = 'sftp://user:pass@9.9.9.9/secure_folder',
                $expected = [
                    'adapter' => 'sftp',
                    'user' => 'user',
                    'pass' => 'pass',
                    'host' => '9.9.9.9',
                    'name' => 'secure_folder',
                    'port' => '22',
                ],
            ]
        ];
    }
}
