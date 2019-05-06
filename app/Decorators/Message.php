<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 5/6/2019
 * Time: 4:02 PM
 */

namespace App\Decorators;


interface Message
{
    public function getMessage():string;

    public function setMessage(string $message):void ;
}