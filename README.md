# PHP Menu Gourmet
Aplicação em PHP para Menu de opções. A ideia principal é que a aplicação acerte o prato que a pessoa quer.

## User Story
Ao executar a aplicação, é solicitado que a pessoa pense em um prato/refeição (mas não informe), ao teclar {ENTER} 
a aplicação perguntará se o prato é algo especifico, e de acordo com as respostas da pessoa usuária (que podem ser "sim" ou "nao") a aplicação irá filtrar as opções até acertar ou esgotar as possibilidades.

- Caso a aplicação acerte o jogo reinicia.
- Caso as opções se esgotem, o jogo pede pra pessoa digitar o prato/refeição que pensou e guarda isso para usar futuramente. 

## Tecnologias utilizadas:
- PHP 8.2
- Composer 2

## Instalação
- Instale o PHP na versão 8+
- Instale o Composer na versão 2
- Clone o projeto
    - `git clone https://github.com/alessandrofeitoza/php-menu-gourmet`
- Entre no diretório da aplicação e execute o composer para atualizar o "autoload"
    - `cd php-menu-gourmet`
    - `composer dump-autoload`

## Execução
- Para executar, existe um arquivo principal `index.php`, que centraliza toda a regra de negócio e a infraestrutura da aplicação, execute:
    - `php public/index.php`

## Pŕoximas Etapas / Sugestões para melhoria
- Adicionar Docker para não precisar instalar PHP e Composer
- Adicionar testes automatizados com PHPUnit
    - Testes unitários
    - Testes funcionais
- Adicionar ValueObjects para tratar as informações de transação entre `Menu` e `Meal`
- Implementar o uso de banco de dados para ter os dados salvos em algum lugar:
    - SQLite
    - MySQL/MariaDB
    - PostGreSQL
    - MongoDB