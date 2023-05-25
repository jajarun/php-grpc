<?php
require "../vendor/autoload.php";

spl_autoload_register(function ($class){
    $class = str_replace('\\', '/', $class);
    $file = '../proto/' . $class . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

function greet($hostname, $name)
{
    // 初始化一个客户端实例
    $client = new \Service\GreeterClient($hostname, [
        'credentials' => Grpc\ChannelCredentials::createInsecure(),
    ]);
    // 初始化一个请求类
    $request = new \Service\HelloRequest();
    // 参数赋值
    $request->setName($name);
    // 请求服务
    list($response, $status) = $client->SayHello($request)->wait();
    // 响应处理
    if ($status->code !== Grpc\STATUS_OK) {
        echo "ERROR: " . $status->code . ", " . $status->details . PHP_EOL;
        exit(1);
    }
    echo $response->getMessage() . PHP_EOL;
}

$name = !empty($argv[1]) ? $argv[1] : 'world';
$hostname = !empty($argv[2]) ? $argv[2] : 'localhost:8972';
greet($hostname, $name);