<?php

namespace App\Services;

use App\Enums\SMSPRovidersEnum;
use App\Services\Interfaces\ISMSProvider;
use App\Services\Interfaces\ISMSProviderFactory;
use Exception;

class SMSProviderFactory implements ISMSProviderFactory
{
    public function getProvider(): ISMSProvider
    {

        return match ( config('sms.default_provider') ) {
            SMSPRovidersEnum::KAVENEGAR => new KavenegarSMSProvider(),
            SMSPRovidersEnum::GHASEDAK  => new GhasedakSMSProvider(),
            default                     => throw new Exception('invalid provider name'),
        };

    }
}
