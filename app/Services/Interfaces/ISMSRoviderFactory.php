<?php

namespace App\Services\Interfaces;

interface ISMSProviderFactory
{
    public function getProvider(): ISMSProvider;
}