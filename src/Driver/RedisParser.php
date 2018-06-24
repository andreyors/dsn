<?php

namespace AndreyOrs\Driver;

class RedisParser extends UrlAwareParser
{
    /**
     * @var array
     */
    protected $defaults = [
        'port' => '6379',
    ];
}
