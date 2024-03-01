<?php

namespace HomedoctorEs\OpentokLaravel\Services;

use OpenTok\OpenTok as OpenTokBase;

class OpenTok extends OpenTokBase
{

    public static function make(string $apiKey, string $apiSecret, array $options = []): self
    {
        return new self($apiKey, $apiSecret, $options);
    }

}