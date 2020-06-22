<?php

namespace Controller;

use System\Helpers\Arr;

class FruitsController extends Controller
{
    protected $_viewPath = 'View/fruits';

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

        echo "<h2>$class::$func()</h2>";

        // this means we can access the id value by using:
        echo '<h3>My fruit id is: ' . $this->props->id . '</h3>';

        // this was far cleaner than treating incoming data as an array
        // and having to do $this->props['name']

        // any data sent to the route ends up the props object w/ values
        // being accessible as top level properties...
        // `uri` prop is a debug hold-over, but needs to be removed
        echo '<pre>';
        print_r($this->props);
        echo '</pre>';

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
