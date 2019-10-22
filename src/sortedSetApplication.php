<?php


namespace Gao\redisApplication;


abstract class sortedSetApplication
{
    protected $prefix = 'redis:sortedSet';

    /**
     ** 返回Redis实例.
     * @return \Redis
     */
    abstract public function redis();
}