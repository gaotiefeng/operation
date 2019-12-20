<?php


namespace Gao\redisApplication;

abstract class listApplication
{
    use traitsApplication;

    protected $prefix = 'redis:list';

    protected $count = 0;  // > 0 | = 0 | < 0

    /**
     ** 返回Redis实例.
     * @return \Redis
     */
    abstract public function redis();

    /**
     * list length
     * @param $key
     * @return bool|int
     */
    public function len($key)
    {
        $listKey = $this->getPrefix($key);

        return $this->redis()->lLen($listKey);
    }

    /**
     * 一个或多个值插入到列表头部
     * @param $key
     * @param $val
     * @return bool|int list length
     */
    public function lPush($key, ...$val)
    {
        $listKey = $this->getPrefix($key);

        return $this->redis()->lPush($listKey, ...$val);
    }
    /**
     * 移除列表第一个元素
     * @param $key
     * @return bool|mixed  first | nil
     */
    public function lPop($key)
    {
        $listKey = $this->getPrefix($key);

        return $this->redis()->lPop($listKey);
    }

    /**
     * 根据count
     * 移除列表中与参数 VALUE 相等的元素
     * return 被移除元素的数量。 列表不存在时返回 0
     * @param $key
     * @param $val
     * @return bool|int
     */
    public function lRem($key, $val)
    {
        $listKey = $this->getPrefix($key);

        return $this->redis()->lRem($listKey, $val, $this->count);
    }

    /**
     * 列表，包含指定区间内的元素
     * @param $key
     * @param $start
     * @param $end
     * @return array
     */
    public function lRange($key, $start, $end)
    {
        $listKey = $this->getPrefix($key);

        return $this->redis()->lRange($listKey, $start, $end);
    }

    /**
     * 将一个或多个值插入到列表的尾部(最右边)
     * 2.4 版本以前只接受单个值
     * @param $key
     * @param $val
     * @return bool|int  list length
     */
    public function rPush($key, ...$val)
    {
        $listKey = $this->getPrefix($key);

        return $this->redis()->rPush($listKey, ...$val);
    }

    /**
     * 移除列表的最后一个元素，返回值为移除的元素
     * @param $key
     * @return bool|mixed
     */
    public function rPop($key)
    {
        $listKey = $this->getPrefix($key);

        return $this->redis()->rPop($listKey);
    }
}
