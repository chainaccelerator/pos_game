<?php

class Game_node extends Node
{

    use Draw;

    public function create(string $node_ip, string $node_port)
    {

        $this->draw_gen();

        return parent::create($node_ip, $node_port);
    }
}

