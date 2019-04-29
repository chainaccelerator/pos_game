<?php

class Account extends Graph_label
{

    CONST SALT = 'dsmlf,fsdf1s3d2f1s3df213sdf13sd1f3sdf';

    public static $version = 'Account';
    public static $label = 'Account';
    public static $instance_prefix = 'a';

    public $address;
    public $create_date;
    public $node;

    public function create(string $address, string $password, $node_ip = false, $node_port = false)
    {

        $this->address = $address;
        $this->hash = hash('sha256', $this->address . self::SALT . $password);

        $this->create_init();

        if ($node_ip !== false && $node_port !== false) {

            $node_version = Node::$version;
            $this->node = new $node_version();
            $this->node->create($node_ip, $node_port);

            $account_run_node = new Account_run_node($this, $this->node);
            $account_run_node->create_init_simple();
        }
        return true;
    }
}