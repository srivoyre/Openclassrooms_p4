<?php

namespace App\src;

/**
 * Class Request
 * @package App\src
 */
class Request
{
    private $get;
    private $post;
    private $session;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->get = new Parameter(filter_input_array(INPUT_GET));
        $this->post = new Parameter(filter_input_array(INPUT_POST));
        $this->session = new Session($_SESSION);
    }

    /**
     * @return Parameter
     */
    public function getGet()
    {
        return $this->get;
    }

    /**
     * @return Parameter
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @return Session
     */
    public function getSession()
    {
        return $this->session;
    }
}