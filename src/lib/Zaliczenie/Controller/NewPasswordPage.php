<?php

namespace Zaliczenie\Controller;

use Controller\BasePage;
use Http\Request;

class NewPasswordPage extends BasePage
{

    protected function doHandle(): void
    {
        if ($this->request->getQueryStringValue('success') === null) {
            $commonHash = $this->request->getQueryStringValue('hash');

            session_start();
            if (!isset($_SESSION['hash']) || $commonHash !== $_SESSION['hash'] ) $this->response->redirect('/error');
            if ($this->request->isMethod(Request::METHOD_POST)) {
                $data = $this->request->getValue('recoverPassword');
                $newPassword = trim($data['newPassword'] ?? '');
                $confirmedPassword = trim($data['confirmedPassword'] ?? '');

                $errors = [];
                $passRegex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
                if (!preg_match($passRegex, $newPassword)) {
                    $errors['newPassword'] =
                        <<<EOERROR
                    Minimum 8 znaków, jedna wielka litera, jedna cyfra, jeden znak specjalny.
                    EOERROR;
                }
                if ($confirmedPassword !== $newPassword) {
                    $errors['passwordsNotTheSame'] = 'Wprowadzone hasła muszą być takie same';
                }
                if (empty($errors)) {

                    $this->response->redirect($this->request->getCurrentUri(withQueryString: false) . '?success=true');
                    return;
                }
            }
        }
        $this->response->setBody($this->useTemplate('templates/new-password.html.php', [
            'title' => 'Wprowadź nowe hasło',
            'errors' => $errors ?? [],
            'data' => $data ?? [],
            'success' => $this->request->getValue('success', false)
        ]));
    }
}