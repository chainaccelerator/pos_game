<?php

class Game_score_item
{

    public $name;
    public $type;
    public $name_translated;
    public $state = true;
    public $limit = 3;
    public $fields = array();
    public $list = array();

    public function __construct(stdClass $conf_json)
    {

        foreach ($conf_json as $var => $value) {

            $this->$var = $value;
        }
        $this->name_translated = Game_text::translate($this->name);

        return true;
    }

    public function get_score_list()
    {

        for ($i = 0; $i < $this->limit; $i++) {

            $this->list[] = new Score();
        }
        return $this->list;
    }
}
