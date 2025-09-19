<?php

namespace App\Modules\Cobros\Policies;

use App\Models\User;
use App\Modules\Cobros\Permissions\CobrosPermissions;

class CobrosPolicy
{
    public function view(User $user)
    {
        return $user->can(CobrosPermissions::VIEW);
    }

    public function create(User $user)
    {
        return $user->can(CobrosPermissions::CREATE);
    }
}
