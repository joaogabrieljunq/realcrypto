<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Wa72\HtmlPageDom\HtmlPage;

/**
 * Class Cotacao
 * @package App
 *
 * @property string $nome
 * @porperty string $preco
 * @property string $variacaoDia
 */
class Cotacao extends Model
{

    /**
     * Cotacao constructor.
     * @param HtmlPage $pagina
     * @param string $filtro
     */
    public function __construct($pagina, $filtro)
    {
        parent::__construct();

        $filtro = "#id-" . $filtro;

        $moedaHtml = $pagina->filter($filtro);
        $this->nome = $moedaHtml->filter('.currency-name-container')->html();
        $this->preco = $moedaHtml->filter('.price')->html();
        $this->variacaoDia = $moedaHtml->filter('.percent-24h')->html();

        return $this;
    }
}
