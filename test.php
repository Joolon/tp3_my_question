<?php

use Library\RedisHandle;

$redis = RedisHandle::getRedis();
if(RedisHandle::getError()){
    echo "<font color='red'>Error：".RedisHandle::getError(). '</font><br/>';
    exit;
}
$redis->set('user:name','fasf12333da');
var_dump($redis->get('user:name'));
echo 1;exit;