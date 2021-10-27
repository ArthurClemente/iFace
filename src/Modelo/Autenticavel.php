<?php

namespace Projeto\Iface\Modelo;

interface Autenticavel
{
    public function podeAutenticar(string $login, string $senha): bool;
}