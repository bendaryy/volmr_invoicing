<?php

namespace App\DataTables;

use App\Models\Staff;
use App\Models\User;

/**
 * Class UserDataTable
 */
class UserDataTable
{
    /**
     * @return Staff
     */
    public function get()
    {
        /** @var Staff $query */
        $query = User::query()->select('users.*');

        return $query;
    }
}
