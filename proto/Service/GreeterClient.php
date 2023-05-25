<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Service;

/**
 * The greeting service definition.
 */
class GreeterClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Sends a greeting
     * @param \Service\HelloRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function SayHello(\Service\HelloRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/service.Greeter/SayHello',
        $argument,
        ['\Service\HelloReply', 'decode'],
        $metadata, $options);
    }

    /**
     * Sends another greeting
     * @param \Service\HelloRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function SayHelloAgain(\Service\HelloRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/service.Greeter/SayHelloAgain',
        $argument,
        ['\Service\HelloReply', 'decode'],
        $metadata, $options);
    }

}
