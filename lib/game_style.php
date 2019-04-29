<?php


class Game_style
{

    public static $theme_name;
    public static $title;
    public static $title_leet;
    public static $theme_dir;
    public static $template;
    public static $list;

    public static function load(stdClass $conf_json)
    {

        self::$theme_name = $conf_json->theme_name;
        self::$title = $conf_json->title;
        self::$title_leet = $conf_json->title_leet;
        self::$theme_dir = $conf_json->theme_dir;

        foreach ($conf_json->list as $value) {

            self::$list[$value->name] = new Style($value->name, $value->value);
        }
        if ($conf_json->force === true || is_file(self::file_name_get()) === false) {

            unset($conf_json->force);
        }
        return true;
    }

    public static function file_name_get()
    {

        return self::$theme_dir . 'index.css';
    }

    public static function write()
    {

        $template = file_get_contents(self::file_tempalte_name_get());

        foreach (self::$list as $style) {

            $template = $style->replace($template);
        }
        return file_put_contents(self::file_name_get(), $template);
    }

    public static function file_tempalte_name_get()
    {

        return self::$theme_dir . 'index_template.css';
    }
}
