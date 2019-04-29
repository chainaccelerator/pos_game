<?php

Class Draw_color
{

    public $color_min = 0;
    public $color_max = 255;
    public $opacity_min = 0.1;
    public $opacity_max = 1;
    public $color_r = 0;
    public $color_g = 0;
    public $color_b = 0;
    public $opacity = 1;

    public function construct(int $color_min = 0, int $color_max = 255, $opacity_min = 0.1, $opacity_max = 1)
    {

        $this->color_min = $color_min;
        $this->color_max = $color_max;
        $this->opacity_min = $opacity_min;
        $this->opacity_max = $opacity_max;
    }

    public function gen()
    {

        $this->color_r = rand($this->color_min, $this->color_max);
        $this->color_g = rand($this->color_min, $this->color_max);
        $this->color_b = rand($this->color_min, $this->color_max);
        $this->opacity = rand($this->opacity_min, $this->opacity_max);

        return true;
    }
}