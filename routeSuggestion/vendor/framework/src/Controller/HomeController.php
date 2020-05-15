<?php

namespace Controller;


class HomeController extends Controller
{
    protected $_viewPath = 'View/';

    public function index()
    {
        echo 'home index';
    }
}