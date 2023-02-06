<?php

namespace Zaliczenie\Controller;

use Controller\BasePage;

class HomePage extends BasePage
{

    protected function doHandle(): void
    {
        $this->response->setBody($this->useTemplate('templates/index.html.php', [
            'title'=>'Witaj!'
        ]));
    }
}