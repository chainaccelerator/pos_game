<?php

class Game_text
{

    public static $lang_list = array();
    public static $list = array();

    public static function load(stdClass $conf_json)
    {

        self::$lang_list = $conf_json->lang_list;

        foreach ($conf_json->list as $value) {

            $text = new Text($value->name);

            $lang = Conf::$lang;
            $func = 'set_' . $lang;

            $text->$func($value->$lang);
            self::$list[$value->name] = $text;
        }
        return true;
    }

    public static function translate(string $name)
    {

        return self::$list[$name]->translate();
    }
}
