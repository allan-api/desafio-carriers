## Criar banco de dados "funcionarios"

Após a instalação do software padrao, acesse o servidor com o comando `mysql -u root -p`;



Use o comando `CREATE DATABASE funcionarios`;


## Configurando a aplicação

Configurar dados do banco no arquivo `.env` na raiz do projeto;



Utilize o artisan como servidor com `composer update` para atualizar as dependencias;


## Criando tabela e inserindo valores

No terminal, execute o comando `php artisan migrate` para criar as tabelas em seu banco;


Execute `php artisan db:seed` para que seja inserido 20 funcionários no banco ;)


Utilize o artisan como servidor com `php artisan serve`;

