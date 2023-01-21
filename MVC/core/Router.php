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
            return "Not found";
        }

        if(is_string($callback)) {
            return $this->renderView($callback);
        }

        return call_user_func($callback);
    }

    public function renderView($view)
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view);

        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/main.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view)
    {
        /*
         * the 'ob_start()' function starts output caching which means
         * when it is called, nothing is outputted in the browser, instead
         * the data (which was meant to be outputted in the browser) is cached
         * in a buffer.
         *
         * when the 'ob_get_clean()' function is called, the data stored in
         * the buffer would be returned and deleted.
         */
        
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }
}