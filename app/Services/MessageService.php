<?php

namespace App\Services;

use App\Services\Interfaces\IMessageService;
use App\Services\Interfaces\ISMSProvider;
use App\Services\Interfaces\ISMSProviderFactory;

class MessageService implements IMessageService
{
    protected ISMSProviderFactory $factory;
    protected ISMSProvider $provider;

    public function __construct(ISMSProviderFactory $factory)
    {
        $this->provider = $factory->getProvider();
    }

    public function send(string $receptor, string $message): bool
    {
        return $this->provider->send($receptor, $message);
    }
}