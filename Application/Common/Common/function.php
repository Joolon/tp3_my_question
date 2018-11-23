<?php 

/**
 * 保存日志信息
 * @param unknown $content
 */
function saveLog($content){
    $date = date('Y-m-d');
    if(!is_numeric($content) AND !is_string($content)){
        $content = json_encode($content);
    }
    
    $filename = DATA_PATH.'save_logs'.$date.'.txt';
    
    file_put_contents($filename, $content.PHP_EOL,FILE_APPEND);
}


/**
 * 保存 请求信息
 */
function requestLog(){
    $date = date('Y-m-d');
    $filename = DATA_PATH.'request_logs'.$date.'.txt';
    
    $ip         = $_SERVER["REMOTE_ADDR"];
    $content    = $ip.','.date('Y-m-d H:i:s');
    
    file_put_contents($filename, $content.PHP_EOL,FILE_APPEND);
}



function P_R($content){
    echo '<pre/>';
    
    print_r($content);
    exit;
}

function P_R_J($content){
    echo '<pre/>';
    
    print_r(json_decode($content,true));
    exit;
}





