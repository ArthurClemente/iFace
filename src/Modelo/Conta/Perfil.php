<?php

namespace Projeto\Iface\Modelo\Conta;

require_once 'src/Modelo/Autoloader/autoload.php';

use Projeto\Iface\Modelo\Comunidade;
use Projeto\Iface\Modelo\Conta\Conta;
use Projeto\Iface\Modelo\Menu;
use Projeto\Iface\Modelo\Service\ListaRegistros;

class Perfil extends Conta
{
    private $email;
    private $senha;
    private $nomeUsuario;
    public $endereco = array();
    public $telefone;
    private $registrosComunidade;

    public function __construct(string $email, string $senha, string $nomeUsuario)
    {
        $this->email = $email;
        $this->senha = $senha;
        $this->nomeUsuario = $nomeUsuario;
        $this->registrosComunidade = new ListaRegistros();
    }

    //-------------------Funções de criação/alteração de atributos do perfil-----------------------
    public function opcoesPerfil(): void
    {
        echo "[ 1 ] Alterar nome\n[ 2 ] Adicionar endereço\n[ 3 ] Atualizar endereço\n[ 4 ] Criar Comunidade\n[ 5 ] Verificar dados do perfil\n[ 6 ] Verificar dados da comunidade\n[ 7 ] Fazer LogOff\n[ 0 ] Sair\nEscolha uma opção: ";
        $escolhaPerfil = rtrim(fgets(STDIN)); // Captura o input do terminal.

        $this->tratarEscolhaPefil($escolhaPerfil);
    }

    public function tratarEscolhaPefil($escolhaPerfil)
    {
        if ($escolhaPerfil === "1") {
            echo "Novo nome de usuário: ";
            $novoNome = rtrim(fgets(STDIN));

            if ($this->nomeUsuario === $novoNome) {
                echo PHP_EOL . "O nome de usuário informado é igual ao já cadastrado." . PHP_EOL . PHP_EOL;
                $this->opcoesPerfil();
            }
            echo PHP_EOL . "Nome alterado de $this->nomeUsuario para $novoNome" . PHP_EOL . PHP_EOL;
            $this->nomeUsuario = $novoNome;
            $this->opcoesPerfil();
        }

        else if ($escolhaPerfil === "2") {
            echo "Cidade: ";
            $nomeCidade = rtrim(fgets(STDIN));
            echo "Bairro: ";
            $nomeBairro = rtrim(fgets(STDIN));
            echo "Rua: ";
            $nomeRua = rtrim(fgets(STDIN));
            echo "Número: ";
            $numeroCasa = rtrim(fgets(STDIN));

            array_push($this->endereco, $nomeCidade, $nomeBairro, $nomeRua, $numeroCasa);
            echo PHP_EOL . "Endereço cadastrado!" . PHP_EOL . PHP_EOL;
            $this->opcoesPerfil();
        }

        else if ($escolhaPerfil === "4")
        {
            echo "Nome da comunidade: ";
            $novoNomeComunidade = rtrim(fgets(STDIN));
            echo "Descrição da Comunidade: ";
            $novaDescricao = rtrim(fgets(STDIN));

            $nomeCriador = $this->nomeUsuario;
            $novaComunidade = new Comunidade($nomeCriador, $novoNomeComunidade, $novaDescricao);
            $this->registrosComunidade->incrementaArrayComunidades($novaComunidade);

            echo PHP_EOL . "Comunidade ($novoNomeComunidade) criada" . PHP_EOL . PHP_EOL;
            $this->opcoesPerfil();
        }

        else if ($escolhaPerfil === "5")
        {
            echo PHP_EOL . "Email: $this->email\nNome de usuário: $this->nomeUsuario" . PHP_EOL . PHP_EOL;
            $this->opcoesPerfil();
        }

        else if ($escolhaPerfil === '6')
        {
            $listaComunidades = $this->registrosComunidade->getRegistroComunidades();
            if(empty($listaComunidades))
            {
                echo PHP_EOL . "Você não possui nenhuma comunidade!" . PHP_EOL . PHP_EOL;
                $this->opcoesPerfil();
            }
            foreach($listaComunidades as $comunidades)
            {
                if($comunidades->getNomeCriador() === $this->nomeUsuario)
                {
                    $nomeComunidade = $comunidades->getNomeComunidade();
                    $descricaoComunidade = $comunidades->getDescricaoComunidade();
                    $membrosComunidade = $comunidades->getMembrosComunidade();
                    echo PHP_EOL . "Nome da comunidade: $nomeComunidade\nDescrição da comunidade: $descricaoComunidade\nMembros: $membrosComunidade" . PHP_EOL . PHP_EOL;
                }
            }
            $this->opcoesPerfil();
        }

        else if ($escolhaPerfil === "7")
        {
            echo PHP_EOL . "Saindo da conta..." . PHP_EOL . PHP_EOL;
            new Menu();
        }

        else if ($escolhaPerfil === "0")
        {
            echo PHP_EOL . "Saindo do sistema..." . PHP_EOL;
            exit();
        }
        
        else 
        {
            echo PHP_EOL . "Opção inválida, por favor escolhaPerfil uma das opções disponíveis." . PHP_EOL . PHP_EOL;
            $this->opcoesPerfil();
        }
    }
    //---------------------------------------------------------------------------------------------
}
