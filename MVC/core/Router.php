<?php

namespace app\core;

class Router
{
    public Request $request;
    public Response $response;
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

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderView('_404');
        }

        if(is_string($callback)) {
            return $this->renderView($callback);
        }

        return call_user_func($callback);
    }

    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);

        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/main.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params)
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