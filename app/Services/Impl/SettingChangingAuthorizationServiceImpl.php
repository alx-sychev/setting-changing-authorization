<?php

namespace App\Services\Impl;
use App\Models\SettingChangingRequest;
use App\Notifications\UserNotificationService;
use App\Repositories\SettingChangingRequestRepository;
use App\Repositories\SettingRepository;
use App\Services\SettingChangingAuthorizationService;

class SettingChangingAuthorizationServiceImpl implements SettingChangingAuthorizationService
{
    public function __construct(
        public readonly SettingChangingRequestRepository $requestRepository,
        public readonly UserNotificationService $userNotificationService,
        public readonly SettingRepository $settingRepository
    ) {}

    public function createSettingChangingRequest(int $settingId, string $newValue): int
    {
        $this->validateSettingBelongsToCurrentUser($settingId);

        $authCode = $this->generateAuthCode();

        $settingChangingRequest = new SettingChangingRequest(
            $settingId,
            $newValue,
            $authCode
        );

        $requestId = $this->requestRepository->saveRequest($settingChangingRequest);
        $this->userNotificationService->sendAuthCode($authCode);

        return $requestId;
    }

    public function confirmChanging(int $requestId, string $authCode): void
    {
        $request = $this->requestRepository->findById($requestId);

        $this->validateAuthCode($request, $authCode);
        $this->requestRepository->markAsConfirmed($requestId);
        $this->settingRepository->updateSetting($request->settingId, $request->value);
    }

    private function generateAuthCode(): string
    {
        // TODO implement
        return '123456';
    }

    private function validateAuthCode(SettingChangingRequest $request, string $authCode): void
    {
        // TODO implement
    }

    private function validateSettingBelongsToCurrentUser(int $settingId): void
    {
        // TODO implement
    }
}
