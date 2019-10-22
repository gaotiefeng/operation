<?php

namespace Gao\redisApplication;

abstract class stringApplication
{
    use traitsApplication;

    protected $prefix = 'redis:string';

    /**
     ** 返回Redis实例.
     * @return \Redis
     */
    abstract public function redis();


    public function setString($key,$val)
    {
        $this->redis()->set($this->getPrefix($key),$val);
    }

    public function getString($key)
    {
        return $this->redis()->get($this->getPrefix($key));
    }

    public function del($key)
    {
        $this->redis()->del($this->getPrefix($keys));
    }
}