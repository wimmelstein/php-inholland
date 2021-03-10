<?php

namespace app\core;

require_once dirname(__FILE__) . '/../bootstrap.php';

class Router
{

    public Request $request;
    public Response $response;
    protected array $routes = [];
    /**
     * @var Response
     */


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
     * @param $path
     * @param $callback
     *
     * TODO: path starts with 'api' then call different routes
     */
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;

    }


    public function delete($path, $callback)
    {
        $this->routes['delete'][$path] = $callback;
    }


    public function resolve()
    {
        $path = explode('/', $this->request->getPath());
        $method = $this->request->getMethod();

        foreach ($path as $value) {
            if (is_numeric($value)) {
                $this->resolveResource($path);
            }
        }
        $path = implode("/", $path);

        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            $this->response->setStatus(404);
            return $this->renderView('_404');
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback)) {
            $callback[0] = new $callback[0]();
        }

        return call_user_func($callback, $this->request, $this->response);

    }

    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->layoutOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    private function layoutContent()
    {
        ob_start();
        include_once(Application::$ROOT_DIR . "/../layout/main.php");
        return ob_get_clean();
    }

    private function layoutOnlyView($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once(Application::$ROOT_DIR . "/../views/$view.php");
        return ob_get_clean();

    }

    private function renderContent($viewContent)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    private function resolveResource($path)
    {
        echo '<pre>';
        var_dump($path);
        echo '</pre>';
        exit;

    }
}
