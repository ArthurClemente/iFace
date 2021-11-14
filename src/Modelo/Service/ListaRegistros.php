<?php

namespace Projeto\Iface\Modelo\Service;

use Projeto\Iface\Modelo\Comunidade;

class ListaRegistros
{
    private static $registroContas = array();
    private static $registroComunidades = array();
    
    public function incrementaArrayContas(string $email, string $senha, string $nomeUsuario): void
    {
        $dadosConta = array($email, $senha, $nomeUsuario);
        array_push(self::$registroContas, $dadosConta);
    }

    public function incrementaArrayComunidades(Comunidade $novaComunidade): void
    {
        array_push(self::$registroComunidades, $novaComunidade);
    }

    public function getRegistroContas(): array
    {
        return self::$registroContas;
    }

    public function getRegistroComunidades(): array
    {
        return self::$registroComunidades;
    }
}