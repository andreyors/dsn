<?php

namespace AndreyOrs\Driver;

class AmqpParser extends UrlAwareParser
{
    /**
     * @var array
     */
    protected $defaults = [
        'port' => '5672',
    ];
}
