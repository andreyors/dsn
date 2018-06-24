<?php

namespace AndreyOrs\Driver;

interface Parsable
{
    /**
     * @param $string
     *
     * @return array
     */
    public function parse($string);
}
