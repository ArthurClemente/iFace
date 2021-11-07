<?php

namespace Projeto\Iface\Modelo\Conta;

require_once 'src/Modelo/Autoloader/autoload.php';

use Projeto\Iface\Modelo\Conta\Conta;

class Perfil
{
    private $email;
    private $senha;
    private $nomeUsuario;
    public $endereco = array();
    public $telefone;

    public function __construct(Conta $conta)
    {
        $this->email = $conta->getEmail();
        $this->senha = $conta->getSenha();
        $this->nomeUsuario = $conta->getNomeUsuario();
    }

    //-------------------Funções de criação/alteração de atributos do perfil-----------------------
    public function alteraDados(): void
    {
        echo "[ 1 ] Alterar nome\n[ 2 ] Adicionar endereço\n[ 3 ] Atualizar endereço\n[ 0 ] Cancelar\nEscolha uma opção: ";
        $escolha = rtrim(fgets(STDIN)); // Captura o input do terminal.
        $this->tratarEscolha($escolha);
    }

    public function tratarEscolha($escolha)
    {
        if ($escolha === "1") {
            echo "Novo nome de usuário: ";
            $novoNome = rtrim(fgets(STDIN));
            if ($this->nomeUsuario === $novoNome) {
                echo "O nome de usuário informado é igual ao já cadastrado." . PHP_EOL;
                $this->alteraDados();
            }
            $this->nomeUsuario = $novoNome;
        }

        else if ($escolha === "2") {
            echo "Cidade: ";
            $nomeCidade = rtrim(fgets(STDIN));
            echo "Bairro: ";
            $nomeBairro = rtrim(fgets(STDIN));
            echo "Rua: ";
            $nomeRua = rtrim(fgets(STDIN));
            echo "Número: ";
            $numeroCasa = rtrim(fgets(STDIN));
            array_push($this->endereco, $nomeCidade, $nomeBairro, $nomeRua, $numeroCasa);

            var_dump($this->endereco);
        }

        else if ($escolha === "0")
        {
            echo "Saindo do sistema...";
            exit();
        }
        
        else 
        {
            echo PHP_EOL . "Opção inválida, por favor escolha uma das opções disponíveis." . PHP_EOL;
            $this->alteraDados();
        }
    }
    //---------------------------------------------------------------------------------------------
}
