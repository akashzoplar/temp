<?php

namespace App\Policies;

class DepreciationPolicy extends InventoryManagerPermissionsPolicy
{
    protected function columnName()
    {
        return 'depreciations';
    }
}
