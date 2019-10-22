<?php

namespace Gao\redisOperation;

abstract class stringOperation
{

    protected $prefix;
    /**
     * redis
     * @return mixed
     */
    abstract public function redis();

    public function setString($key,$val)
    {
        $this->redis()->set($this->prefix.$key,$val);
    }

    public function getString($key)
    {
        return $this->redis()->get($this->prefix.$key);
    }

    public function del($key)
    {
        $this->redis()->del($this->prefix.$key);
    }
}