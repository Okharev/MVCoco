<?php

namespace core;

/**
 * Class Router
 * @package core
 */
class Router
{
    public Request $request;
    public Response $response;

    protected array $routes = [];


    /**
     * Router constructor.
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @param String $path
     * @param $callback
     */
    public function get(String $path, $callback): void
    {
        $this->routes['get'][$path] = $callback;
    }

    /**
     * @param String $path
     * @param $callback
     */
    public function post(String $path, $callback): void
    {
        $this->routes['post'][$path] = $callback;
    }


    /**
     * resolve this route method and path checks its existence and returns the callback function
     * else it just returns 404
     */
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;

        if($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderView("/errors/_404");
        }

        // if it is a string then we render a the view corresponding to the string
        if(is_string($callback)) {
            return $this->renderView($callback);
        }

        // if it is an array we instantiate the controller
        if(is_array($callback)) {
            $callback[0] = new $callback[0]();
        }

        return $callback();
    }

    /**
     * @param $view
     * @param array $params
     * @return string|string[]
     */
    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);

        return str_replace('{{ content }}', $viewContent, $layoutContent);
    }

    /**
     * @return false|string
     */
    protected function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/base.php";
        return ob_get_clean();
    }

    /**
     * @param $view
     * @param array $params
     * @return false|string
     */
    protected function renderOnlyView($view, $params = [])
    {
        // this is a Variable Variable which transforms the associative array in variables so that we can use it in the views
        foreach ($params as $key => $val) {
            $$key = $val;
        }

        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }
}