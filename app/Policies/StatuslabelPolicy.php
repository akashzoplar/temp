<?php

namespace App\Policies;

class StatuslabelPolicy extends InventoryManagerPermissionsPolicy
{
    protected function columnName()
    {
        return 'statuslabels';
    }
}
