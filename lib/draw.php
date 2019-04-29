<?php

Trait Draw
{

    public static $draw_line_size_min = 0;
    public static $draw_line_size_max = 5;
    public static $draw_x_min = 0;
    public static $draw_x_max = 100;
    public static $draw_y_min = 0;
    public static $draw_y_man = 100;
    public static $draw_z_min = 0;
    public static $draw_z_max = 100;
    public static $draw_point_size_max = 0;
    public static $draw_point_size_min = 5;
    public static $draw_point_number = 3;
    public static $draw_color_min = 0;
    public static $draw_color_max = 255;
    public static $draw_opacity_min = 0.1;
    public static $draw_opacity_max = 1;

    public $draw_point_list = array();
    public $draw_color;
    public $draw_line_size;

    public function draw_gen()
    {

        $draw_color = new Draw_color(
            self::$draw_color_min,
            self::$draw_color_max,
            self::$draw_opacity_min,
            self::$draw_opacity_max);
        $draw_color->gen();

        for ($i = 0; $i < self::$draw_point_number; $i++) {

            $point = new Draw_point(
                self::$draw_color_min,
                self::$draw_color_max,
                self::$draw_opacity_min,
                self::$draw_opacity_max);
            $point->size_init(
                self::$draw_x_min,
                self::$draw_x_max,
                self::$draw_y_min,
                self::$draw_y_man,
                self::$draw_z_min,
                self::$draw_z_max,
                self::$draw_point_size_max,
                self::$draw_point_size_min);

            $point->gen();

            $this->draw_point_list[] = $point;
        }
        $this->draw_line_size = rand(self::$draw_line_size_min, self::$draw_line_size_max);

        return true;
    }
}