<?php

namespace Projeto\Iface\Modelo;

use Projeto\Iface\Modelo\Service\ListaRegistros;

require_once "src/Modelo/Autoloader/autoload.php";

class Comunidade
{
    private $registroComunidade;

    public function __construct(string $nomeComunidade, string $descricaoComunidade)
    {
        $this->registroComunidade = new ListaRegistros();
        $this->registroComunidade->incrementaArrayComunidades($nomeComunidade, $descricaoComunidade);
    }

    public function adicionaDadosComunidade(string $nomeComunidade, string $descricaoComunidade): void
    {
        $this->registroComunidade->incrementaArrayComunidades($nomeComunidade, $descricaoComunidade);
    }

    public function recuperaRegistroComunidades(): array
    {
        return $this->registroComunidade->getRegistroComunidades();
    }
}