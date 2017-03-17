<?php

namespace App\Presenters;

abstract class Presenter
{
    public function __get($property)
    {
        if (method_exists($this, $property)) {
            return call_user_func([$this, $property]);
        }

        $message = '%s does not have a "%s" method or property.';

        throw new \Exception(sprintf($message, static::class, $property));
    }
}