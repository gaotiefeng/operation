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

    public function set($hkey,$val)
    {
        $key = $this->getPrefix($hkey);

        return $this->redis()->hSet($key,$hkey,$val);
    }

    public function get($hkey)
    {
        $key = $this->getPrefix($hkey);

        return $this->redis()->hGet($key,$hkey);
    }

    /**
     * @param $key
     * @return mixed 1 | 0
     */
    public function exists($hkey)
    {
        $key = $this->getPrefix($hkey);

        return $this->redis()->hExists($key,$hkey);
    }

    public function del($hkey)
    {
        $key = $this->getPrefix($hkey);

        $this->redis()->hDel($key,$hkey);
    }
}