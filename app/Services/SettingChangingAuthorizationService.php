<?php

namespace App\Services;

interface SettingChangingAuthorizationService
{
    public function createSettingChangingRequest(int $settingId, string $newValue): int;

    public function confirmChanging(int $requestId, string $authCode): void;
}
