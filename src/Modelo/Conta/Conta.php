<?php

namespace Projeto\Iface\Modelo\Conta; // Projeto\Iface é o "src" do namespace

use Projeto\Iface\Modelo\Autenticavel;

class Conta implements Autenticavel
{
// -----------------Atributos e construtor-----------------
    private $login;
    private $senha;
    private $nomeUsuario;

    public function __construct(string $login, string $senha, string $nomeUsuario)
    {
        $this->login = $login;
        $this->senha = $senha;
        $this->nomeUsuario = $nomeUsuario;
    }
// --------------------------------------------------------

// -----------------Getters dos atributos------------------
    public function getLogin(): string
    {
        return $this->login;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function getNomeUsuario(): string
    {
        return $this->nomeUsuario;
    }
// --------------------------------------------------------

    public function podeAutenticar(string $login, string $senha): bool
    {
        return $login === $this->login && $senha === $this->senha;
    }
}