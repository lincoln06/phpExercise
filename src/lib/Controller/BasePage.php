<?php

namespace Controller;

use Http\Request;
use Http\Response;

abstract class BasePage
{
    protected Request $request;
    protected Response $response;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->response = new Response();
    }

    public function useTemplate(string $file, array $params = []): string
    {
        foreach ($params as $param => $value) {
            $$param = $value;
        }
        ob_start();
        include $file;
        return ob_get_clean();
    }

    public function handle(): Response
    {
        $this->doHandle();
        return $this->response;
    }

    abstract protected function doHandle(): void;
}