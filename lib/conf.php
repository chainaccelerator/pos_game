<?php

class Conf
{
    public static $company;
    public static $lang;

    public static function load(string $conf_name)
    {
        $file_name = '../conf/' . $conf_name . '.json';

        if (is_file($file_name) === false) exit(10);

        $conf_json = json_decode(file_get_contents($file_name));

        foreach ($conf_json as $var => $value) {

            switch ($var) {

                case 'graph':

                    Graph::load($value);
                    break;
                case 'game_text':

                    Game_text::load($value);
                    break;
                case 'game_style':

                    Game_style::load($value);
                    Game_style::write();
                    break;
                case 'game_score':

                    Game_score::load($value);
                    break;
                case 'conf':

                    foreach ($value as $var2 => $value2) {

                        self::$$var2 = $value2;
                    }
                    break;
                default:
                    self::$$var = $value;
                    break;
            }
        }
        return true;
    }
}

