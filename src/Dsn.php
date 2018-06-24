<?php

namespace AndreyOrs;

class Dsn
{
    /**
     * @param string $dsn
     *
     * @return array
     */
    public static function parse($dsn)
    {
        $parserType = parse_url($dsn, PHP_URL_SCHEME);

        if (null === $parserType) {
            $parserType = 'unknown';
        }

        $processorName = sprintf(
            '%s\\Driver\\%sParser',
            __NAMESPACE__,
                ucfirst(strtolower($parserType))
            );

        $processor = new $processorName;

        return $processor->parse($dsn);
    }
}
