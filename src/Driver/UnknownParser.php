<?php

namespace AndreyOrs\Driver;

class UnknownParser implements Parsable
{
    /**
     * @param $string
     *
     * @return array
     */
    public function parse($string)
    {
        return [];
    }
}
