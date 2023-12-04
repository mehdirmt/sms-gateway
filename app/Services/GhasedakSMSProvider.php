<?php

namespace App\Services;

use App\Services\Interfaces\ISMSProvider;

class GhasedakSMSProvider implements ISMSProvider
{
    public function send(string $receptor, string $message): bool
    {
        return true;
    }

    public function bulkSend(array $receptors, string $message): bool
    {
        return true;
    }
}