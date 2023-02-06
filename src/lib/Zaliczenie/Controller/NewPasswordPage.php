<?php

namespace Zaliczenie\Controller;

use Controller\BasePage;
use Http\Request;

class NewPasswordPage extends BasePage
{

    protected function doHandle(): void
    {
        $commonHash = $this->request->getQueryStringValue('hash');

        session_start();
        if ($commonHash !== $_SESSION['hash']) $this->response->redirect('/viewpage?auth=false');
        if ($this->request->isMethod(Request::METHOD_POST)) {
            $data = $this->request->getValue('recoverPassword');
            $newPassword = trim($data['newPassword'] ?? '');
            $confirmedPassword = trim($data['confirmedPassword'] ?? '');

            $errors = [];
            $passRegex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
            if ($newPassword === '') {
                $errors['newPassword'] = 'Field required';
            } elseif (!preg_match($passRegex, $newPassword)) {
                $errors['newPassword'] = 'Password must be at least 8 characters length and include at least one big letter, at least one small letter one digit and one special character.';
            }
            if ($confirmedPassword === '') {
                $errors['confirmedPassword'] = 'Field required';
            }
            if ($confirmedPassword !== $newPassword) {
                $errors['passwordsNotTheSame'] = 'Passwords must be the same';
            }
            if (empty($errors)) {
                $this->response->redirect('/viewpage?auth=true');
                return;
            }

        }
        $this->response->setBody($this->useTemplate('templates/new-password.html.php', [
            'title' => 'Wprowadź nowe hasło',
            'errors' => $errors ?? [],
            'data' => $data ?? []
        ]));
    }
}