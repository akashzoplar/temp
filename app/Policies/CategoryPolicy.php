<?php

namespace App\Policies;

class CategoryPolicy extends InventoryManagerPermissionsPolicy
{
    protected function columnName()
    {
        return 'categories';
    }
}
