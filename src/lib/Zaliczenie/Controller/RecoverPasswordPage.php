<?php

namespace Zaliczenie\Controller;


use Controller\BasePage;
use Http\Request;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;

class RecoverPasswordPage extends BasePage
{
    protected string $email;

    protected function sendEmailResetLink(string $emailAddress): void

    {
        $hashGenerator = new HashGenerator();
        $hash = $hashGenerator->generateHash();

        session_start();
        $_SESSION['hash'] = $hash;
        $transport = Transport::fromDsn('smtp://apsl-dev@gmx.com:apslDEV2023@mail.gmx.com:587');
        $mailer = new Mailer($transport);
        $emailMessage = (new Email())
            ->from('apsl-dev@gmx.com')
            ->to(" {$emailAddress}")
            ->subject('Link do resetowania hasła')
            ->text("Link do resetowania hasła: localhost/new-password?hash={$hash}");

        $mailer->send($emailMessage);
    }


    protected function doHandle(): void
    {
        if ($this->request->isMethod(Request::METHOD_POST)) {
            $data = $this->request->getValue('contact');
            $email = trim($data['email'] ?? '');

            $errors = [];
            if ($email === '') {
                $errors['email'] = 'Field required';
            } elseif (filter_var($email, filter: FILTER_VALIDATE_EMAIL) === false) {
                $errors['email'] = 'Wrong email format';
            }

            if (empty($errors)) {
                $this->sendEmailResetLink($email);
                $this->response->redirect('/check-email');

                return;
            }
        }

        $this->response->setBody($this->useTemplate('templates/recover-password.html.php', [
            'title' => 'Odzyskiwanie hasła',
            'errors' => $errors ?? [],
            'success' => $this->request->getValue('success', false)
        ]));

    }
}