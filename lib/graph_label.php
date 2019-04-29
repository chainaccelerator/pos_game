<?php

abstract class Graph_label
{

    public $var;
    public $var_label;
    public $hash;
    public $create_date;
    public $instance_count;
    public $state;

    public function create_init($count = 0)
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

        Graph::$client->run('CREATE (' . $this->var . ':' . $this->var_label . ' ' . json_encode($this) . ')');

        return true;
    }
}