<?php

namespace Zaliczenie\Controller;

use Controller\BasePage;

class Error404Page extends BasePage
{
    protected function doHandle(): void
    {
        $this->response->setBody($this->useTemplate('templates/_404.html.php', [
            'title'=>'Strona nie istnieje'
        ]));
    }
}