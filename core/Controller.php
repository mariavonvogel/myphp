<?php

class Controller
{
    protected $_model;
    protected $_view;

    protected function __construct()
    {
        $this->_view = new View();
    }
}