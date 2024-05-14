<?php

namespace App\Policies;

class SupplierPolicy extends InventoryManagerPermissionsPolicy
{
    protected function columnName()
    {
        return 'suppliers';
    }
}
