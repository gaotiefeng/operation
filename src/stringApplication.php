<?php

namespace Gao\redisApplication;

abstract class stringApplication
{
    use traitsApplication;

    protected $prefix = 'redis:string';

    protected $ttl;
    /**
     ** 返回Redis实例.
     * @return \Redis
     */
    abstract public function redis();

    /**
     * @param $key
     * @param $val
     * @return bool
     */
    public function set($key,$val)
    {
        $sKey = $this->getPrefix($key);

        return $this->redis()->set($sKey,$val,$this->ttl);
    }

    public function get($key)
    {
        return $this->redis()->get($this->getPrefix($key));
    }

    public function exists($key)
    {
        $strKey = $this->getPrefix($key);

        return $this->redis()->exists($strKey);
    }
    /**
     * 返回值 删除 key 的数量
     * @param $key
     * @return int
     */
    public function del($key)
    {
        return $this->redis()->del($this->getPrefix($key));
    }

    /**
     * @param $key
     * @param $dstKey
     * @return bool ok | error
     */
    public function rename($key, $dstKey)
    {
        $strKey = $this->getPrefix($key);
        $dstKey = $this->getPrefix($dstKey);
        return $this->redis()->rename($strKey, $dstKey);
    }
    /**
     * 设置过期时间
     * redis > 2.1.3 版本
     * @param $key
     * @return bool success 1 | fail 0
     */
    public function expire($key)
    {
        $strKey = $this->getPrefix($key);

        return $this->redis()->expire($strKey, $this->ttl);
    }

    /**
     * 移除key的过期时间
     * @param $key
     * @return bool success 1 | fail 0
     */
    public function persist($key)
    {
        $strKey = $this->getPrefix($key);

        return $this->redis()->persist($strKey);
    }

    /**
     * 返回剩余过期时间
     * @param $key
     * @return bool|int  -2 | -1 time
     */
    public function ttl($key)
    {
        $strKey = $this->getPrefix($key);

        return $this->redis()->ttl($strKey);
    }
}