<?php

namespace AndreyOrs\Driver;

class SftpParser extends UrlAwareParser
{
    /**
     * @var array
     */
    protected $defaults = [
        'port' => '22',
    ];
}
