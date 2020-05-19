<?php

namespace Controller;

use System\Helpers\Arr;

class FruitsController extends Controller
{
    protected $_viewPath = 'View/';

    public function index()
    {
        echo 'fruit index';
    }
    public function store()
    {
    }
    public function create()
    {
    }
    public function show()
    {
        $class = __CLASS__;
        $func = __FUNCTION__;

        echo "<h3>$class::$func()</h3>";

        // any data sent to the route ends up the props object w/ values 
        // being accessible as top level properties...
        Arr::pre($this->props);

        // this means we can access the id value by using:
        echo '<h2>My fruit id is: ' . $this->props->id . '</h2>';

        // this was far cleaner than treating incoming data as an array
        // and having to do $this->props['name']
    }
    public function edit()
    {
    }
    public function update()
    {
    }
    public function destroy()
    {
    }

    /**
     * Custom non-template public methods
     */

    public function getFruitByName()
    {
        $class = __CLASS__;
        $func = __FUNCTION__;

        echo "<h3>$class::$func()</h3>";

        // any data sent to the route ends up the props object w/ values 
        // being accessible as top level properties...
        Arr::pre($this->props);

        // this means we can access the name value by using:
        echo '<h2>My fruit name is: ' . $this->props->name . '</h2>';

        // this was far cleaner than treating incoming data as an array
        // and having to do $this->props['name']
    }
}
