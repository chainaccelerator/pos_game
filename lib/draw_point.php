<?php

class Draw_point extends Draw_color
{

    public $x_min = 0;
    public $x_max = 100;
    public $y_min = 0;
    public $y_max = 100;
    public $z_min = 0;
    public $z_max = 100;
    public $point_size_min = 0;
    public $point_size_max = 5;
    public $x = 0;
    public $y = 0;
    public $z = 0;
    public $size = 0;

    public function size_init(int $x_min = 0, int $x_max = 100, int $y_min = 0, int $y_max = 100, int $z_min = 0, int $z_max = 100, int $point_size_min = 5, int $point_size_max = 0)
    {
        $this->x_min = $x_min;
        $this->x_max = $x_max;
        $this->y_min = $y_min;
        $this->y_max = $y_max;
        $this->z_min = $z_min;
        $this->z_max = $z_max;
        $this->point_size_min = $point_size_min;
        $this->point_size_max = $point_size_max;

        return true;
    }

    public function gen()
    {

        parent::gen();

        $this->x = rand($this->x_min, $this->x_max);
        $this->y = rand($this->y_min, $this->y_max);
        $this->z = rand($this->z_min, $this->z_max);
        $this->size = rand($this->point_size_min, $this->point_size_max);

        return true;
    }
}