<?php

namespace Zaliczenie\Controller;

use Controller\BasePage;

class CheckEmailPage extends BasePage
{

    protected function doHandle(): void
    {
        $this->response->setBody($this->useTemplate('templates/check-email.html.php', [
            'title' => 'Sprawdź e-mail'
        ]));
    }
}