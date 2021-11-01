<?php

namespace Projeto\Iface\Modelo\Service;

class registrosLogin
{
    private static $registroEmail = array();
    private static $registroNomeUsuario = array();

    public function __construct(string $email, string $nomeUsuario)
    {
        self::$registroEmail[] = $email;
        self::$registroNomeUsuario[] = $nomeUsuario;
    }

    public function getRegistroEmails(): array
    {
        return self::$registroEmail;
    }

    public function getRegistroNomes(): array
    {
        return self::$registroNomeUsuario;
    }
}
