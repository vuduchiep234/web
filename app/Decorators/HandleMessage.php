<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/6/2019
 * Time: 4:04 PM
 */

namespace App\Decorators;


trait HandleMessage
{
    private $message;
    public function getMessage():string
    {
        return $this->message;
    }

    public function setMessage(string $message):void
    {
        $this->message = $message;
    }
}