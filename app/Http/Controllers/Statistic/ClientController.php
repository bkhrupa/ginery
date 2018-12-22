<?php

namespace App\Http\Controllers\Statistic;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::query()
            ->with(['orders'])
            ->withCount(['orders'])
            ->sortable(['orders_count' => 'desc'])
            ->paginate();

        return view('statistic.client.index', ['clients' => $clients]);
    }
}
