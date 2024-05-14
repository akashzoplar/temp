<?php

namespace App\Policies;

class DepartmentPolicy extends InventoryManagerPermissionsPolicy
{
    protected function columnName()
    {
        return 'departments';
    }
}
