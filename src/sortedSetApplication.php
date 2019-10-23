<?php


namespace Gao\redisApplication;


use App\Model\PayOrder;

abstract class sortedSetApplication
{
    use traitsApplication;

    protected $prefix = 'redis:sortedSet';

    protected $options = [];
    /**
     ** 返回Redis实例.
     * @return \Redis
     */
    abstract public function redis();

    public function zAdd($key, $score, $value)
    {
        $zKey = $this->getPrefix($key);

        return $this->redis()->zAdd($zKey, $this->options, $score, $value);
    }

    public function zRem($key, $val)
    {
        $zKey = $this->getPrefix($key);

        return $this->redis()->zRem($zKey, ...$val);
    }
    /**
     * 计算集合中元素的数量
     * @param $key
     * @return int
     */
    public function zCard($key)
    {
        $zKey = $this->getPrefix($key);

        return $this->redis()->zCard($zKey);
    }

    /**
     * @param $key
     * @param $val
     * @return bool|float
     */
    public function zScore($key, $val)
    {
        $zKey = $this->getPrefix($key);

        return $this->redis()->zScore($zKey, $val);
    }
    /**
     * @param $key
     * @param $min
     * @param $max
     * @return int
     */
    public function zCount($key, $min, $max)
    {
        $zKey = $this->getPrefix($key);

        return $this->redis()->zCount($zKey, $min, $max);
    }
}