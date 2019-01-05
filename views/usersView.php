<?php

class UsersView extends View
{
    public function render($templateView, $data)
    {
        include VIEW_PATH . $templateView;
    }
}