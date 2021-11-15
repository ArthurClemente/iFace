<?php

namespace Projeto\Iface\Modelo\Service;

use Projeto\Iface\Modelo\Comunidade;

class ListaRegistros
{
    private static $registroContas = array();

    
    public function incrementaArrayContas(string $email, string $senha, string $nomeUsuario): void
    {
        $dadosConta = array($email, $senha, $nomeUsuario);
        array_push(self::$registroContas, $dadosConta);
    }

    public function getRegistroContas(): array
    {
        return self::$registroContas;
    }
}