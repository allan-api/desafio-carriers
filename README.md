## 
## Configurando a aplicação

Configurar dados do banco no arquivo `.env` na raiz do projeto;


Utilize o comando `composer update` para atualizar as dependencias;


## 
## Criar banco de dados "funcionarios"

Acesse o servidor com o comando `mysql -u root -p`, certifique-se de que tenha o MySQL em sua maquina;


Use o comando `CREATE DATABASE funcionarios`;


## 
## Criando tabela e inserindo valores

No terminal, execute o comando `php artisan migrate` para criar as tabelas em seu banco;


Execute `php artisan db:seed` para que seja inserido 20 funcionários no banco ;)

## 
## Iniciando

Utilize o artisan como servidor com `php artisan serve`;

