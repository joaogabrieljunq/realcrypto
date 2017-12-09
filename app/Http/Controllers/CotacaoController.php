<?php

namespace App\Http\Controllers;

use App\Dominio\CotacaoService;

class CotacaoController extends Controller
{
    private $service;

    public function __construct(){
        $this->service = new CotacaoService();
    }

    public function index()
    {
        return $this->service->exibir();
    }
}
