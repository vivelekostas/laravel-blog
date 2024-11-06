<?php

namespace App\Enums;

enum RoleType: int
{
    case ROLE_ADMIN = 0;
    case ROLE_READER = 1;

    public function label(): string
    {
        return match ($this) {
            RoleType::ROLE_ADMIN => 'Админ',
            RoleType::ROLE_READER => 'Читатель',
        };
    }
}
