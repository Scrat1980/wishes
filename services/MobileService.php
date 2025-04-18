<?php

namespace app\services;

class MobileService
{
    public function isMobile(): bool
    {
        return str_contains($_SERVER["HTTP_USER_AGENT"], 'iPhone');
    }
}