<?php
namespace Library;


/**
 * Redis 操作类 封装 单例模式
 * Class RedisHandle
 */
class RedisHandle{

    private static $_handler = null;// Redis 操作手柄
    private static $_message = null;// 提示信息
    private static $_error   = null;// 错误信息

    private function __construct()
    {

    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     * 获得 Redis 连接对象
     * @return bool|null|\Redis
     */
    public static function getRedis(){
        if(self::$_handler instanceof \Redis){
            return self::$_handler;
        }else{
            // 实例化对象
            self::$_handler = new \Redis();
            self::$_handler->connect('47.107.183.46', 6379);

            try{// 判断连接是否成功
                self::$_handler->auth('root.Jolon.123456');
                self::$_handler->ping();// 连通返回 +PONG

                self::setMessage('SUCCESS');

                return self::$_handler;
            }catch(\Exception $e){
                self::setError($e->getMessage());// ERROR
                return false;
            }
        }
    }

    /**
     * 设置 提示信息
     * @param $message
     */
    public static function setMessage($message){
        self::$_message = $message;
    }

    /**
     * 获取 提示信息
     * @return null
     */
    public static function getMessage(){
        return self::$_message;
    }

    /**
     * 设置 错误信息
     * @param $error
     */
    public static function setError($error){
        self::$_error = $error;
    }

    /**
     * 获取 错误信息
     * @return null
     */
    public static function getError(){
        return self::$_error;
    }

}
