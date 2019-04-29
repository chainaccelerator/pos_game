<?php

abstract class Graph_relationship
{

    public $var;
    public $var_label;
    public $create_date;
    public $instance_count;
    public $state;
    public $match_list = array();

    public function match_add($match)
    {

        $this->match_list[] = $match;

        return true;
    }

    public function create_init_simple($count = 0)
    {

        $this->create_date = D::now();
        $class = get_called_class();
        $file = __DIR__ . '../data/' . $class . '.count';

        if (is_file($file) === true) {

            $count = file_get_contents($file);
            $count = trim($count);
        }
        $this->instance_count = $count;
        $this->state = 'created';
        $this->var = $class::$instance_prefix . $class::$instance_count;
        $this->var_label = $class::$label;

        file_put_contents($file, $count);

        $cypher = '';

        foreach ($this->match_list as $match) {

            $cypher .= 'MATCH (' . $match->var . ':' . $match->var_label . ' {hash: "' . $match->hash . '"}) ';
        }
        Graph::$client->run($cypher . ' CREATE (' . $this->match_list[0]->var . ')-[' . $this->var . ':' . $this->var_label . ' ' . json_encode($this) . ']->(' . $this->match_list[1]->var . ') RETURN ' . $this->var . ':' . $this->var_label);

        return true;
    }
}