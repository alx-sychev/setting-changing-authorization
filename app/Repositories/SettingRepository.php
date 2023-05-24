<?php

namespace App\Repositories;

interface SettingRepository
{
    public function updateSetting(int $settingId, string $value): int;
}
