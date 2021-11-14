<?php

namespace Projeto\Iface\Modelo;

require_once "src/Modelo/Autoloader/autoload.php";

class Comunidade
{
    private $nomeComunidade;
    private $descricaoComunidade;
    private $membrosComunidade = array();
    private $membroCriador;


    public function __construct(string $nomeCriador, string $nomeComunidade, string $descricaoComunidade)
    {
        $this->nomeComunidade = $nomeComunidade;
        $this->descricaoComunidade = $descricaoComunidade;
        $this->membroCriador = $nomeCriador;
    }

    public function getNomeComunidade(): string
    {
        return $this->nomeComunidade;
    }

    public function getDescricaoComunidade(): string
    {
        return $this->descricaoComunidade;
    }

    public function getMembrosComunidade()
    {
        if(empty($this->membrosComunidade))
        {
            return "Essa comunidade não possui membros!";
        }
        
        foreach($this->membrosComunidade as $membros)
        {
            return $membros;
        }
    }

    public function getNomeCriador(): string
    {
        return $this->membroCriador;
    }
}