<?php

namespace App\DataTables;

use App\Models\AdminPayment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

/**
 * Class AdminPaymentDataTable
 */
class AdminPaymentDataTable
{
    /**
     * @return Builder
     */
    public function get(): Builder
    {
        $query = AdminPayment::with(['invoice.client.user']);

        return $query;
    }
}
