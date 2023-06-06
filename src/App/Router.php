<?php

declare(strict_types=1);

namespace App;

class Router
{
    private array $routes;

    public function register(string $route, callable $action): self 
    {
        $this->routes[$route] = $action;

        return $this;
    }
}