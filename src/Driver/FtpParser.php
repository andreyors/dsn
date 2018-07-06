<?php

namespace AndreyOrs\Driver;

class FtpParser extends UrlAwareParser
{
    /**
     * @var array
     */
    protected $defaults = [
        'port' => '21',
    ];
}
