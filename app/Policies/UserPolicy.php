<?php

namespace App\Policies;

class UserPolicy extends InventoryManagerPermissionsPolicy
{
    protected function columnName()
    {
        return 'users';
    }
}
