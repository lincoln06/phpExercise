<?php

namespace Zaliczenie\Controller;

class HashGenerator
{
    public function generateHash(): string
    {
        return sha1(time());
    }
}