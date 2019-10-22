<?php


namespace Gao\redisApplication;


abstract class listApplication
{
    use traitsApplication;

    protected $prefix = 'redis:list';

    /**
     ** 返回Redis实例.
     * @return \Redis
     */
    abstract public function redis();
}