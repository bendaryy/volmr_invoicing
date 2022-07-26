<?php

namespace App\DataTables;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

/**
 * Class InvoiceDataTable
 */
class InvoiceDataTable
{
    /**
     * @return Builder
     */
    public function get($input=[]): Builder
    {
        $query = Invoice::with(['client.user', 'payments'])->select('invoices.*');

        $query->when(isset($input['status']) && $input['status'] != Invoice::STATUS_ALL,
            function (Builder $q) use ($input) {
                $q->where('invoices.status', $input['status']);
            });

        /** @var User $user */
        $user = Auth::user();
        if ($user->hasRole('client')) {
            $query->where('client_id', $user->client->id)->where('invoices.status', '!=', Invoice::DRAFT);
        }

        return $query;
    }
}
