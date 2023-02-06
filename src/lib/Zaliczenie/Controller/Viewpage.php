<?php

namespace Zaliczenie\Controller;

use Controller\BasePage;

class Viewpage extends BasePage
{

    protected function doHandle(): void
    {
        $authResult=$this->request->getQueryStringValue('auth');
        $message='Oops, chyba coś poszło nie tak';
        switch($authResult) {
            case 'true':
                $message='Hasło zostało zmienione';
                break;
            case 'false':
                $message='Link wygasł lub nie masz uprawnień do wyświetlenia zawartości';
                break;
        }

        $this->response->setBody($this->useTemplate('templates/viewpage.html.php', [
            'title' => 'Komunikat',
            'message'=>$message??'',
            'success' => $this->request->getValue('success', false)
        ]));
    }
}