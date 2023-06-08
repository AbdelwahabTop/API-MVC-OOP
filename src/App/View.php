<?php

namespace App;

class View
{
    public function __construct(protected string $view, protected array $params = [])
    {
    }

    public function render()
    {
        include VIEW_PATH . $this->view;
    }
}
