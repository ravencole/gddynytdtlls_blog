<?php

namespace App\Http\SessionErrors;

interface SessionError
{
    public static function handle($request, $messageBagAdditions = []);
}