<?php

class UsersView extends View
{
    public function render($templateView, $data)
    {
        include registry::get('views') . $templateView;
    }
}