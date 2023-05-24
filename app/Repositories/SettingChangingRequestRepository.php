<?php

namespace App\Repositories;

use App\Models\SettingChangingRequest;

interface SettingChangingRequestRepository
{
    public function saveRequest(SettingChangingRequest $request): int;

    public function markAsConfirmed(int $requestId): void;

    public function findById(int $requestId): SettingChangingRequest;
}
