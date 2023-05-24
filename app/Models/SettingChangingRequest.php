<?php

namespace App\Models;

class SettingChangingRequest
{
    public int $id;

    public function __construct(
        public int $settingId,
        public string $value,
        public string $authCode,
    ) {}
}
