<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class ProductDataTable
 */
class ProductDataTable
{
    
    public function get(): Builder
    {
        return Product::with('category')->select('products.*');
    }
}
