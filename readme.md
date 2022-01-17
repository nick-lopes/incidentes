## Como Instalar

Requerimentos:
- PHP 7.4 ou superior (clique <a href="https://www.php.net/">aqui</a> para baixar a versão)
- <a href="https://getcomposer.org/">Composer</a>
    - No Linux e no Mac, bastará copiar o código em "Command-line installation" e executá-lo no terminal. No Windows, basta baixar e executar o instalador Composer-Setup.exe

Habilite a extensão do PHP SQLite:
- Procure pelo arquivo "php.ini" dentro da pasta do PHP
- Procure pela linha ";extension=pdo_sqlite" e remova o ponto e vírgula da frente da linha e salve o arquivo.

Executar o projeto:
- Baixe e extraia o projeto no seu computador
- Renomeie o arquivo ".env.producao" para ".env"
- Utilizando o prompt de comando, entre na pasta do projeto
- Rode o comando "php artisan serve" para executar o projeto. 
- Para visualizar, use o link http://localhost:8000/incidentes
