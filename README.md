## 
## Configurando a aplicação

Não será necessário configurar o `.env` no projeto;


Utilize o comando `composer update` para atualizar as dependências;


## 
## Criar banco de dados "funcionarios"

O sistema está configurado para usar o sqlite, um banco de dados do próprio laravel, certifique-se de que tenha um arquivo nomeado `database.sql` dentro da pasta `database` na raiz. Se não tiver, fique a vontade para criá-lo, ou excluir o seu conteúdo.


## 
## Criando tabela e inserindo valores

No terminal, execute o comando `php artisan migrate` para criar as tabelas em seu banco;


Execute `php artisan db:seed` para que seja inserido 20 funcionários no banco ;)

## 
## Iniciando

Utilize o artisan como servidor com `php artisan serve`;

Por enquanto o sistema retorna apenas Json, utilize um httpClient como Postman para uma melhor experiência.

