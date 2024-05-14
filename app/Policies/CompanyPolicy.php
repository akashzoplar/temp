<?php

namespace App\Policies;

class CompanyPolicy extends InventoryManagerPermissionsPolicy
{
    protected function columnName()
    {
        return 'companies';
    }
}
