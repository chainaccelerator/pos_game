<?php

class Node extends Graph_label
{

    CONST SALT = 'sdf5646e5g4df65g4df6g4df6g1vsvxcvxcv21';

    public static $version = 'Node';
    public static $label = 'Node';
    public static $instance_prefix = 'n';

    public $node_ip;
    public $node_port;

    public function create(string $node_ip, string $node_port)
    {

        $this->node_ip = $node_ip;
        $this->node_port = $node_port;
        $this->hash = hash('sha256', $this->node_ip . self::SALT . $this->node_port);

        $this->create_init();

        return true;
    }
}