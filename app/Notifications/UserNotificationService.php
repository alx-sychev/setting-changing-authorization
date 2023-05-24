<?php

namespace App\Notifications;

interface UserNotificationService
{
    public function sendAuthCode(string $authCode);
}
