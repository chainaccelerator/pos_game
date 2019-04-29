<?php

class Style
{

    public $name;
    public $value;
    public $tag;

    public function __construct(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
        $this->tag = '{' . $this->name . '}';
    }

    public function replace(string $template)
    {

        return str_replace($this->tag, $this->value, $template);
    }
}
