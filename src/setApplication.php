<?php


namespace Gao\redisApplication;


abstract class setApplication
{
    use traitsApplication;

    protected $prefix = 'redis:set';

    /**
     ** 返回Redis实例.
     * @return \Redis
     */
    abstract public function redis();
}