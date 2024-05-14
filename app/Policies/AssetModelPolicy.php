<?php

namespace App\Policies;

class AssetModelPolicy extends InventoryManagerPermissionsPolicy
{
    protected function columnName()
    {
        return 'models';
    }
}
