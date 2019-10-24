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

    /**
     * @param $key
     * @param mixed ...$val
     * @return bool|int
     */
    public function sAdd($key, $val)
    {
        $setKey = $this->getPrefix($key);

        return $this->redis()->sAdd($setKey, ...$val);
    }

    /**
     * 获取集合的数量
     * @param $key
     * @return int
     */
    public function sCard($key)
    {
        $setKey = $this->getPrefix($key);

        return $this->redis()->sCard($setKey);
    }

    /**
     * 移除集合中元素
     * return 被成功移除的元素的数量
     * @param $key
     * @param $val
     * @return int
     */
    public function sRem($key, $val)
    {
        $setKey = $this->getPrefix($key);

        return $this->redis()->sRem($setKey, ...$val);
    }

    /**
     * 集合中的所有成员
     * @param $key
     * @return array
     */
    public function sMembers($key)
    {
        $setKey = $this->getPrefix($key);

        return $this->redis()->sMembers($setKey);
    }
}
