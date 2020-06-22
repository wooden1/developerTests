<?php

namespace Controller;

use Exception;
use Middleware\AuthenticationMiddleware as Authenticate;
use Resource\Status as Status;

class Controller implements \Ifs\ControllerInterface
{

    // _view defines the default folder path for views
    protected $_viewPath = 'View/';
    protected $_layout = 'layout';
    protected $_data = [];
    protected $pdoName = 'client';
    protected $_newData = [];

    public function __construct()
    {
    }

    protected function bindRepos()
    {
    }

    public function init()
    {
        $this->connect();
        $this->_init();
        $this->_extendInit();
    }

    protected function _extendInit()
    {
    }

    private function _createPDOManager()
    {
        return new \Proaction\Database\Manager\Manager();
    }

    public function __destruct()
    {
        unset($this->db->pdo);
        unset($this->db);
    }

    public function connect()
    {
        // call to create database connection Manager class
    }

    /**
     *  Initialize any necessary variables within the controller
     */
    public function _init()
    {
    }

    /**
     *
     */
    protected function setRandProp()
    {
        $this->setDisplayAttribute('rand', rand(0, 200000));
    }

    /**
     *
     */
    protected function setStatusHandler()
    {
        $this->status = new Status();
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function setResponse()
    {
        $this->response = $_SESSION['response'] ?: $this->auth->getResponse();
    }
    /**
     *
     */
    public function authenticate()
    {
    }

    /**
     * Set top level user property
     */
    protected function setUser()
    {
    }

    /**
     *
     */
    protected function getUserDisplayData()
    {
    }

    /**
     *
     */
    protected function setDisplayAttribute($id, $value)
    {
        $this->_newData[$id] = $value;
    }

    /**
     *
     */
    protected function setAttribute($id, $value)
    {
        $this->{$id} = $value;
    }

    /**
     *
     */
    public function render($filePath, $data = [])
    {
        // render method has been removed for this demonstration
    }

    /**
     * redirect
     *
     * @param string $url url for redirect, defaults to global 'path_to_root'
     * @return void
     */
    public function redirect($url = null)
    {

        if ($url == null) {
            $url = header('Location: /');
        }
        header('Location: ' . $url);
    }

    /**
     * Binds repository to top level Controller::prop via pre-defined Repository::root value, becomes $this->[root]
     *
     * @param object $repository
     */
    public function bind($repository)
    {
        // phpCore try catch block
        try {

            // echo $repository->root;
            // echo '<hr />';
            if (isset($this->{$repository->root})) {

                // code block ....
                throw new \Exception('Repository->root overwritten. Please instantiate the second repository and change "root" value before binding.');
            }

            $this->{$repository->root} = $repository;
            //$this->message('');
        } catch (\Exception $e) {

            die($e->getMessage());
        }
    }

    /**
     * Deprecated. As you refactor, remove calls to _data, and replace
     * with props obj
     *
     * @param array $data
     * @return void
     */
    public function setData(array $data)
    {
        if (key_exists('props', $data)) {
            extract($data);
            $this->_registerProps($props);
        }

        $this->_data = $data;
    }

    public function setProps(array $props = [])
    {
        $this->_registerProps($props);
    }

    private function _registerProps($props = [])
    {
        if (!empty($props)) {
            $this->props = new \Resource\Props($props);
        }
    }
}
