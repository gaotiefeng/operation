
## redis-application

>composer require gaotiefeng/redis-application



```
class testApplication extends stringApplication
{
    protected $prefix = 'localhost:redis:string';

    public function redis()
    {
        $res =  new \Redis();
        $res->connect('127.0.0.1','6379');
        return $res;
    }

    public function setKey($key, $val)
    {
        return $this->set($key,$val);
    }
}

```