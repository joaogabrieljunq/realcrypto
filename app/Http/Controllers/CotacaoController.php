<?php

namespace App\Http\Controllers;

use App\Dominio\CotacaoService;

class CotacaoController extends Controller
{
    private $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        $this->service = new CotacaoService();
        return $this->service->exibir();
    }

    //
}
