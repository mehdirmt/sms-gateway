<?php

namespace App\Services\Interfaces;

interface IMessageService
{
    public function send(string $receptor, string $message): bool;
}