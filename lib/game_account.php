<?php

class Game_account extends Account
{

    use Draw;

    public function create(string $address, string $password, $node_ip = false, $node_port = false)
    {

        $this->draw_gen();

        return parent::create($address, $password, $node_ip, $node_port);
    }
}
