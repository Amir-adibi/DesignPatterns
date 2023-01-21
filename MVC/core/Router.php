<?php

namespace app\core;

class Router
{
    public Request $request;
    protected array $routes = [];

    /*
     * $routes array would look like this:
     *
     * $routes = [
     *      'get' => [
     *          '/' => $callback,
     *          '/contact' => $callback,
     *      ],
     *      'post' => [
     *          ...
     *      ]
     * ]
     */

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            echo "Not found";
        }

        echo call_user_func($callback);
    }
}