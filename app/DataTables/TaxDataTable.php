<?php

namespace App\DataTables;

use App\Models\Tax;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class TaxDataTable
 */
class TaxDataTable
{
    /**
     * @return Builder
     */
    public function get(): Builder
    {
        return Tax::query()->select('taxes.*');
    }
}
