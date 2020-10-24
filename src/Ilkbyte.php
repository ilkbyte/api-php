<?php

namespace Netinternet\Ilkbyte;

class Ilkbyte
{
    /**
     * Call requested class if exists.
     *
     * @param $name
     * @param $arguments
     *
     * @throws \Exception
     * @return bool
     */
    public function __call($name, $arguments)
    {
        if (is_null(config('ilkbyte.access_key')) || is_null(config('ilkbyte.secret_key'))) {
            throw new \Exception('Ilkbyte package: Please provide accesskey and secretkey.');
        }

        if ($name == 'base') {
            throw new \Exception('Can\'t initialize base class');
        }

        $class = "Netinternet\\Ilkbyte\\Api\\".ucwords($name);

        if (class_exists($class)) {
            $up = new $class($arguments);

            return $up;
        }

        return false;
    }
}
