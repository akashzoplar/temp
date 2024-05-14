<?php

namespace App\Policies;

class PredefinedKitPolicy extends InventoryManagerPermissionsPolicy
{
    protected function columnName()
    {
        return 'kits';
    }
}
