<?php

namespace Resource;

/**
 * Props class takes an array and sets the keys to top-level properties 
 * of the Props class. Props is then accessed in the controller from 
 * $this->props, and  * then values are directly accessed as properties,
 * rather than array syntax.
 * 
 * Considering recursively calling Props all the way down, or possibly, 
 * just on captured JSON strings
 * 
 * Since all data gets placed into the Props class, we can validate all
 * user input in one place
 */
class Props
{
    public function __construct($props)
    {
        $this->_init($props);
    }

    /**
     * Set incoming array keys as top level props for the prop object
     * goal is to access them without using array syntax, i.e., 
     * props->var, rather than props['var']
     *
     * @param array $props - array of incoming props
     *
     * @return void
     */
    private function _init($props): void
    {
        // loop through each key/value pair and set the key as a 
        // top-level property.
        foreach ($props as $key => $val) {
            $this->{$key} = $val;
        }
    }
}
