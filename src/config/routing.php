<?php

use Zaliczenie\Controller\Error404Page;
use Zaliczenie\Controller\HomePage;
use Zaliczenie\Controller\NewPasswordPage;
use Zaliczenie\Controller\RecoverPasswordPage;

return [
    '/' => HomePage::class,
    '/recover-password' => RecoverPasswordPage::class,
    '/new-password' => NewPasswordPage::class,
    '/error' => Error404Page::class
];