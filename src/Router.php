<?php

namespace Src;

class Router {

    private $routes = [
        "upload",
        "sendEmail"
    ];

    private $viewer;
    private $calledRoute;

    public function __construct(String $action) {
        $this->checkRoute($action);
        $this->viewer = new Viewer();
        $this->calledRoute = $action;
    }

    private function getRoutes(): Array {
        return $this->routes;
    }

    public function checkRoute(String $action): Void {
        if (!in_array($action, $this->getRoutes())) {
            throw new \Exception("Página não encontrada");
        }
    }

    public function getCalledRoute(): String {
        return $this->calledRoute;
    }
}