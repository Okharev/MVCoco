<?php

namespace core;

/**
 * Class Request
 * @package core
 */
class Request
{
    /**
     * @return false|mixed|string
     */
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $pos = strpos($path, '?');

        if($pos === false)
        {
            return $path;
        }
        return substr($path, 0, $pos);
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}