<?php

namespace App\Dominio;

use App\Moeda;

class CotacaoService
{
    public function exibir()
    {
        $moeda = new Moeda("Dólar", "USD");
        $cotacoes = $moeda->getCotacoes();

        return response()->json($cotacoes);
    }
}