<?php

namespace Controller;

use Http\Response;

class Error404Page extends BasePage
{
    protected function doHandle(): void
    {
        $this->response->setBody($this->useTemplate('templates/_404.html.php', [
            'title' => 'Strona nie istnieje'
        ]));
        $this->response->setStatusCode(Response::CODE_404_NOT_FOUND);
    }
}