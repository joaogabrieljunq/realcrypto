<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Wa72\HtmlPageDom\HtmlPage;

/**
 * Class Moeda
 * @package App
 *
 * @property string $nome
 * @property string $simbolo
 */
class Moeda extends Model
{

    public function __construct($nome, $simbolo)
    {
        parent::__construct();

        if(strtoupper($simbolo) !== "USD") {
            throw new \Exception("Apenas a moeda Dólar (USD) é aceita.");
        }

        $this->nome = $nome;
        $this->simbolo = $simbolo;
    }


    public function getCotacoes()
    {
        $fonte = new HtmlPage(file_get_contents('https://coinmarketcap.com/'));
        $cotacoes = array();
        $cotacoes['bitcoin'] = new Cotacao($fonte, 'bitcoin');
        $cotacoes['ethereum'] = new Cotacao($fonte, 'ethereum');
        $cotacoes['iota'] = new Cotacao($fonte, 'iota');
        $cotacoes['ripple'] = new Cotacao($fonte, 'ripple');
        $cotacoes['monero'] = new Cotacao($fonte, 'monero');

        return $cotacoes;
    }
}
