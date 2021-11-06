<?php

namespace Projeto\Iface\Modelo\Service;

class RegistrosLogin
{
    private static $registroContas = array();
    private static $numeroDeContas;

    public function __construct(string $email, string $senha, string $nomeUsuario)
    {
        self::$numeroDeContas += 1;
        $this->incrementaArray($email, $senha, $nomeUsuario);
    }

    public function incrementaArray(string $email, string $senha, string $nomeUsuario): void
    {
        $dadosConta = array($email, $senha, $nomeUsuario);
        array_push(self::$registroContas, $dadosConta);
    }

    public function getRegistroContas(): array
    {
        return self::$registroContas;
    }
}