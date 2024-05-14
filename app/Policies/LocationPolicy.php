<?php

namespace App\Policies;

class LocationPolicy extends InventoryManagerPermissionsPolicy
{
    protected function columnName()
    {
        return 'locations';
    }
}
