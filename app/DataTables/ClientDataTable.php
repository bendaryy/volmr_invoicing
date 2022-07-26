<?php

namespace App\DataTables;

use App\Models\Client;

/**
 * Class ClientDataTable
 */
class ClientDataTable
{
    /**
     * @return Client
     */
    public function get()
    {
        /** @var Client $query */
        $query = Client::with(['user.media', 'country', 'state', 'city'])->withCount('invoices');
      
        return $query;
    }
}
