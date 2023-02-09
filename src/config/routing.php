<?php

use Zaliczenie\Controller\CheckEmailPage;
use Zaliczenie\Controller\Error404Page;
use Zaliczenie\Controller\HomePage;
use Zaliczenie\Controller\NewPasswordPage;
use Zaliczenie\Controller\RecoverPasswordPage;
use Zaliczenie\Controller\Viewpage;

return [
    '/' => HomePage::class,
    '/recover-password' => RecoverPasswordPage::class,
    '/check-email' => CheckEmailPage::class,
    '/new-password' => NewPasswordPage::class,
    '/viewpage' => Viewpage::class,
    '/error' => Error404Page::class
];