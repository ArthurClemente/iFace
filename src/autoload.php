<?php

// O autoload serve para importar as classes que serão utilizadas no arquivo, sendo necessário fazer o require somente dele.

spl_autoload_register(function (string $nomeDaClasse) {
    $caminhoArquivo = str_replace('Projeto\\Iface', 'src', $nomeDaClasse); // "str_replace" troca elementos de uma string por outros, o php transforma "\\" em "\", assim a string Projeto\Iface vira src\.
    $caminhoArquivo = str_replace('\\', DIRECTORY_SEPARATOR, $caminhoArquivo); // "DIRECTORY_SEPARATOR" utiliza o separador padrão do sistema operacional utilizado, np Windows o padrão é "\".
    $caminhoArquivo .= '.php'; // ".=" Adiciona ".php" ao final da string.

    if(file_exists($caminhoArquivo)){
        require_once $caminhoArquivo; // Caso o arquivo exposto pelo caminho criado exista, ele é requisitado.
    }
});