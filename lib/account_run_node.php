<?php

class Account_run_node extends Graph_relationship
{

    public function __construct($account, $node)
    {
        $this->match_add($account);
        $this->match_add($node);
    }


}