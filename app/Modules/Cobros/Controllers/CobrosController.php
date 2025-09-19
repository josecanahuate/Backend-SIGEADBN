<?php

namespace App\Modules\Cobros\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Cobros\Services\RegistrarCobroService;
use App\Modules\Cobros\Resources\CobroResource;
use App\Modules\Cobros\Models\Cobro;

/* class CobrosController extends Controller
{
    protected $service;

    public function __construct(RegistrarCobroService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $this->authorize('view', Cobro::class);

        $cobros = Cobro::all();
        return CobroResource::collection($cobros);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Cobro::class);

        $cobro = $this->service->execute($request->all());
        return new CobroResource($cobro);
    }
}
 */