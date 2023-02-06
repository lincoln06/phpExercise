<?php

namespace App;

use Controller\BasePage;
use Controller\Error404Page;
use Http\Request;

class App
{
    public function run():void
    {
        $request=new Request();
        $page=$this->getPageForRequest($request);
        $response=$page->handle();
        $response->send();
    }

    private function getPageForRequest(Request $request):BasePage
    {
        $uri = $request->getCurrentUri(withQueryString: false);
        $page = $this->getPageFromRouting($uri, $request);

        return ($page ?? $this->getError404Page($request));
    }
    protected function getError404Page(Request $request): Error404Page
    {
        $page = $this->getPageFromRouting('_404', $request);

        return (isset($page) ? new $page($request) : new Error404Page($request));
    }

    protected function getPageFromRouting(string $route, Request $request): ?BasePage
    {
        $routing = require 'config/routing.php';
        if (!isset($routing[$route])) {
            return null;
        }

        $class = $routing[$route];
        if (class_exists($class) === false) {
            return null;
        }

        $page = new $class($request);
        if (($page instanceof BasePage) === false) {
            return null;
        }

        return $page;
    }
}