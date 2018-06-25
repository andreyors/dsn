<?php

namespace AndreyOrs\Driver;

class UrlAwareParser implements Parsable
{
    /**
     * @const
     */
    const URL_LIKE_SCHEMA = '#^(?P<adapter>[^\:]+)\:\/\/(?:(?P<user>[^\:\@]+)(?:\:(?P<pass>[^\@]*))?\@)?(?P<host>[^\:\@\/]+)(?:\:(?P<port>[1-9][\d]*))?(?:\/(?P<name>[^\?]*)(?:\?(?P<query>.*))?)?$#';

    /**
     * @var array
     */
    private $knownFields = [
        'adapter',
        'user',
        'pass',
        'host',
        'port',
        'name',
    ];

    /**
     * @var array
     */
    protected $defaults = [];

    /**
     * @param string $dsn
     *
     * @return array
     */
    public function parse($dsn)
    {
        if (preg_match(self::URL_LIKE_SCHEMA, trim($dsn), $result)) {
            $extraOpts = [];

            if (!empty($result['query'])) {
                parse_str($result['query'], $extraOpts);
            }

            $result = array_filter(
                array_intersect_key(
                    $result,
                    array_flip($this->knownFields)
                )
            );

            $result = array_merge($result, $extraOpts);
        }

        foreach ($this->knownFields as $key) {
            if (!array_key_exists($key, $result)
                && isset($this->defaults[$key])) {
                $result[$key] = $this->defaults[$key];
            }
        }

        return $result;
    }
}
