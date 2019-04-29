<?php

class Game_score
{

    public static $list = array();
    public static $type_list = array();

    public static function load(stdClass $conf_json)
    {

        foreach ($conf_json->type_list as $value) {

            self::$type_list[] = new Game_score_item_type($value);
        }

        foreach ($conf_json->list as $value) {

            self::$list[] = new Game_score_item($value);
        }
        return true;
    }

    public static function get_score_list()
    {

        // @TODO GET DATA

        foreach (self::$list as $key => $game_score_item) {

            self::$list[$key]->get_score_list();
        }
        return true;
    }
}
