<?php

namespace AndreyOrs\Driver;

class PgsqlParser extends UrlAwareParser
{
    protected $defaults = [
        'port' => '5432',
    ];
}
