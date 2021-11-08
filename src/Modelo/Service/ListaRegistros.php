<?php

namespace Projeto\Iface\Modelo\Service;

class ListaRegistros
{
    private static $registroContas = array();
    private static $registroComunidades = array();
    
    public function incrementaArrayContas(string $email, string $senha, string $nomeUsuario): void
    {
        $dadosConta = array($email, $senha, $nomeUsuario);
        array_push(self::$registroContas, $dadosConta);
    }

    public function incrementaArrayComunidades(string $nomeComunidade, string $descricao): void
    {
        $dadosComunidade = array($nomeComunidade, $descricao);
        array_push(self::$registroComunidades, $dadosComunidade);
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