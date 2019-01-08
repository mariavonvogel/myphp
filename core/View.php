<?php

class View
{
	protected $data;

	public function __get($name)
	{
        return $this->data[$name] ?? null;
	}

	public function __set($name, $value)
	{
	    $this->data[$name] = $value;
	}

    public function generate($templateView)
    {
        include registry::get('views') . $templateView;
    }
}