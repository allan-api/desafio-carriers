## 
## Configurando a aplicação

Será necessário configurar o `.env` no projeto;


Utilize o comando `composer update` para atualizar as dependências;



## 
## Criar banco de dados "funcionarios"

Utilze de preferencia o MySQL, crie um banco de dados vazio com o nome `funcionarios`;

1. Acesse o console do DOS:
windows > executar > cmd

2. Digite o caminho aonde está instalado o mysql.exe
C:\> cd xampp\mysql\bin

3. Execute `mysql.exe -u root -p`
Entre com o password:

4. Depois Execute o comando `CREATE DATABASE funcionarios`



## 
## Criando tabela e inserindo valores

No terminal, execute o comando `php artisan migrate` para criar as tabelas em seu banco;


Execute `php artisan db:seed` para que seja inserido 20 funcionários no banco ;)


## 
## Iniciando

Utilize o artisan como servidor com `php artisan serve`;

Por enquanto o sistema não tem interface, apenas retorna um Json, utilize um httpClient como Postman para uma melhor experiência.



