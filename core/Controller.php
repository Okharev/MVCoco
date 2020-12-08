<?php


namespace core;


/**
 * Class Controller
 * @package core
 */
class Controller
{
    /**
     * @param $view
     * @param array $params
     * @return string|string[]
     */
    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }
}