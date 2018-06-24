<?php

namespace AndreyOrs\Driver;

class MysqlParser extends UrlAwareParser
{
    /**
     * @var array
     */
    protected $defaults = [
        'port' => '3306',
    ];
}
