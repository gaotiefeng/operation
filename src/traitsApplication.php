<?php


namespace Gao\redisApplication;


trait traitsApplication
{
    /**
     * @param $key
     * @return string
     */
    public function getPrefix($key)
    {
        return ''.$this->prefix.':'.$key;
    }

}