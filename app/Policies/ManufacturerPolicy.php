<?php

namespace App\Policies;

class ManufacturerPolicy extends InventoryManagerPermissionsPolicy
{
    protected function columnName()
    {
        return 'manufacturers';
    }
}
