<?php

namespace App\Http\Responses;

class UpdateSettingResponse
{
    public function __construct(
        public readonly int $settingChangingRequestId
    ) {}
}
