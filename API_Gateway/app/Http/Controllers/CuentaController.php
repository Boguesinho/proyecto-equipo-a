<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Services\CuentaService;


class CuentaController extends Controller
{
    use ApiResponser;

    public $cuenta_service;

    public function __construct(CuentaService $cuenta_service)
    {
        $this->cuenta_service = $cuenta_service;
    }

    public function create(Request $request)
    {
        return $this->successResponse($this->cuenta_service->create($request->all()));
    }

    public function getCuenta($idUsuario){
        return $this->successResponse($this->cuenta_service->getCuenta($idUsuario));
    }

    public function editInfo(Request $request){
        return $this->successResponse($this->cuenta_service->editCuenta($request->all()));
    }

}
