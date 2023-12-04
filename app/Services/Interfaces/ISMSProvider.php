<?php

namespace App\Services\Interfaces;

interface ISMSProvider
{
    public function send(string $receptor, string $message): bool;

    public function bulkSend(array $receptors, string $message): bool;
}