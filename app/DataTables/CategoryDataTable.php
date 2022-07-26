<?php

namespace App\DataTables;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class CategoryDataTable
 */
class CategoryDataTable
{
    /**
     * @return Builder
     */
    public function get(): Builder
    {
        return Category::withCount('products');
    }
}
