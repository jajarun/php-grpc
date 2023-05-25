<?php
require "../vendor/autoload.php";

spl_autoload_register(function ($class){
    $class = str_replace('\\', '/', $class);
    $file = '../proto/' . $class . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

class Greeter
{
    // 实现接口
    public function SayHello(
        \Service\HelloRequest $request,
        \Grpc\ServerContext $serverContext
    ):? \Service\HelloReply {
        // 获取请求参数
        $name = $request->getName();
        // 定义一个实例响应体
        $response = new \Service\HelloReply();
        // 服务逻辑实现
        $msg = "Hello ".$name;
        // 响应体返回
        $response->setMessage($msg);
        return $response;
    }

    public final function getMethodDescriptors(): array
    {
        return [
            '/service.Greeter/SayHello' => new \Grpc\MethodDescriptor(
                $this,
                'SayHello',
                '\Service\HelloRequest',
                \Grpc\MethodDescriptor::UNARY_CALL
            ),
        ];
    }
}

$server = new \Grpc\RpcServer();
$server->addHttp2Port('0.0.0.0:8972');// 定义服务端口
$server->handle(new Greeter());
$server->run(); //单线程  建议用其他多线程语言或者swoole做grpc服务器

