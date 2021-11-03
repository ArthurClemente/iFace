<?php

namespace Projeto\Iface\Modelo\Service;

class RegistrosLogin
{
    private static $registroContas = array();
    private static $numeroDeContas;

    public function __construct(string $email, string $nomeUsuario)
    {
        self::$numeroDeContas += 1;
        $this->incrementaArray($email, $nomeUsuario);
    }

    public function incrementaArray(string $email, string $nomeUsuario): void
    {
        $listaContas = array($email, $nomeUsuario);
        array_push(self::$registroContas, $listaContas);
    }

    public function getRegistroContas(): array
    {
        return self::$registroContas;
    }
}