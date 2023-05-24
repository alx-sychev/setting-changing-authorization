<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSettingRequest;
use App\Http\Responses\UpdateSettingResponse;
use App\Services\SettingChangingAuthorizationService;

class SettingController
{
    public function __construct(
        public readonly SettingChangingAuthorizationService $settingChangingAuthorizationService
    ) {}

    public function update(int $id, UpdateSettingRequest $request): UpdateSettingResponse
    {
        $settingChangingRequestId = $this->settingChangingAuthorizationService
            ->createSettingChangingRequest($id, $request->value);
        
        return new UpdateSettingResponse($settingChangingRequestId);
    }
}
