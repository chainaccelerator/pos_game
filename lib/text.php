<?php

class Text
{

    public $name;
    public $en;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function set_en(string $en)
    {

        $this->en = $en;

        return true;

    }

    public function translate()
    {

        $lang = Conf::$lang;

        return $this->$lang;
    }
}
