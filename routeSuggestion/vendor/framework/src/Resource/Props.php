<?php

namespace Resource;

class Props
{
    public function __construct($props)
    {
        $this->_init($props);
    }

    private function _init($props)
    {
        foreach ($props as $key => $val) {
            //
            $this->{$key} = $val;
        }
    }
}