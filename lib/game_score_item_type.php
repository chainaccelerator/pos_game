<?php

class Game_score_item_type
{

    public $name;
    public $name_translated;

    public function __construct(stdClass $conf_json)
    {

        foreach ($conf_json as $var => $value) {

            $this->$var = $value;
        }
        $this->name_translated = Game_text::translate($this->name);

        return true;
    }
}
