<?php

namespace App\Http\SessionErrors;

use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Session;

class LoginSessionError implements SessionError
{
    public static function handle($request, $messageBagAdditions = [])
    {
        Session::flash('error-login-email', $request->email);
        Session::flash('error-login-password', $request->password);

        if (count($messageBagAdditions)) {
            $messageBag = (new MessageBag())->getMessageBag();

            foreach($messageBagAdditions as $key => $message) {
                $messageBag->add($key, $message);
            }

            return $messageBag;
        }
    }
}