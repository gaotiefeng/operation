<?php


namespace Gao\redisApplication;

abstract class hashApplication
{
    use traitsApplication;

    protected $prefix = 'redis:hash';

    /**
     ** 返回Redis实例.
     * @return \Redis
     */
    abstract public function redis();

    public function set($hashKey, $val)
    {
        $key = $this->getPrefix($hashKey);

        return $this->redis()->hSet($key, $hashKey, $val);
    }

    public function get($hashKey)
    {
        $key = $this->getPrefix($hashKey);

        return $this->redis()->hGet($key, $hashKey);
    }

    /**
     * @param $hashKey
     * @return mixed 1 | 0
     */
    public function exists($hashKey)
    {
        $key = $this->getPrefix($hashKey);

        return $this->redis()->hExists($key, $hashKey);
    }

    public function del($hashKey)
    {
        $key = $this->getPrefix($hashKey);

        $this->redis()->hDel($key, $hashKey);
    }
}
