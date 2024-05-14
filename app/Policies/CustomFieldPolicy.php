<?php

namespace App\Policies;

class CustomFieldPolicy extends InventoryManagerPermissionsPolicy
{
    protected function columnName()
    {
        return 'customfields';
    }
}
