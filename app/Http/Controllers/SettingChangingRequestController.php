<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateChangingRequestRequest;
use App\Services\SettingChangingAuthorizationService;

class SettingChangingRequestController
{
    public function __construct(
        public readonly SettingChangingAuthorizationService $settingChangingAuthorizationService
    ) {}

    public function confirmChanging(int $id, UpdateChangingRequestRequest $request)
    {
        $this->settingChangingAuthorizationService
            ->confirmChanging($id, $request->authCode);
    }
}
