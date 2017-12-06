<?php

namespace App\Dominio;

use \Wa72\HtmlPageDom\HtmlPage;
use Illuminate\Http\Response;
use App\Moeda;

class CotacaoService
{
    public function exibir()
    {
        $pagina = new HtmlPage(file_get_contents('https://coinmarketcap.com/'));
        $moedas = array();
        $moedas['bitcoin'] = self::getMoeda($pagina, '#id-bitcoin');
        $moedas['ethereum'] = self::getMoeda($pagina, '#id-ethereum');
        $moedas['iota'] = self::getMoeda($pagina, '#id-iota');
        $moedas['ripple'] = self::getMoeda($pagina, '#id-ripple');
        $moedas['monero'] = self::getMoeda($pagina, '#id-monero');
        return response()->json($moedas);
    }

    public function getMoeda($pagina, $filtro)
    {
        $moedaHtml = $pagina->filter($filtro);
        $moeda = new Moeda();
        $moeda->nome = $moedaHtml->filter('.currency-name-container')->html();
        $moeda->preco = $moedaHtml->filter('.price')->html();
        $moeda->variacaoDia = $moedaHtml->filter('.percent-24h')->html();

        return $moeda;
    }
}