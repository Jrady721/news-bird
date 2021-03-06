<?php

namespace NewsBird\Router;

use NewsBird\Request\IRequest;

class Router
{
    private $request;
    private $supportedHttpMethods = array(
        "GET",
        "POST"
    );

    function __construct(IRequest $request)
    {
        $this->request = $request;
    }

    function __call($name, $arguments)
    {
        list($route, $method) = $arguments;

        if (!in_array(strtoupper($name), $this->supportedHttpMethods)) {
            $this->invalidMethodHandler();
        }

        $this->{strtolower($name)}[$this->formatRoute($route)] = $method;
    }

    /**
     * Removes trailing forward slashes from the right of the route.
     * @param $route
     * @return string
     */
    private function formatRoute($route)
    {
        $result = rtrim($route, '/');
        if ($result === '') {
            return '/';
        }
        return $result;
    }

    private function invalidMethodHandler()
    {
        header("{$this->request->serverProtocol} 405 Method Not Allowed");
    }

    private function defaultRequestHandler()
    {
        header("{$this->request->serverProtocol} 404 Not Found");
    }

    /**
     * Resolves a route
     */
    function resolve()
    {
        // GET, POST 외의 Method가 넘어 왔을 때...
        if (!in_array(strtoupper($this->request->requestMethod), $this->supportedHttpMethods)) {
            $this->invalidMethodHandler();
            return;
        }

        $methodDictionary = $this->{strtolower($this->request->requestMethod)};

        $formatedRoute = $this->formatRoute($this->request->requestUri);

        if (!isset($methodDictionary[$formatedRoute])) {
            $this->defaultRequestHandler();
            return;
        }

        $method = $methodDictionary[$formatedRoute];
        if (is_null($method)) {
            $this->defaultRequestHandler();
            return;
        }

        echo call_user_func_array($method, array($this->request));
    }

    function __destruct()
    {
        $this->resolve();
    }
}