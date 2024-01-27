## Instalação

1. Fazer uma cópia do arquivo `app/.env.example`, renomeá-lo para `app/.env` e inserir as variáveis de ambiente necessárias


2. Rode o comando `sudo docker compose build` para buildar o projeto.
3. Iniciar a aplicação através do comando `sudo docker compose up`.
4. Acesse o container através do comando `sudo run/container-bash`
5. Instale as dependencias usando o comando `composer install`
6. Rode o comando `bin/console d:m:m` para efetuar as migrações no banco.

<br/>

### Acesso ao shell do container
- Inicie a aplicação com `sudo docker compose up` e execute o comando `run/container-bash`

### Acesso 

<a href="http://localhost:8765" >http://localhost:8765</a>

### Banco de dados local

http://localhost:4123


### Acesso 

- Crie um usuário através do endpoint `/api/user/`
- Os dados JSON a serem enviados são:
  {
  	"email": "emailqualquer@gmail.com.br",
  	"roles": [
  		"ROLE_ADMIN"
  	],
  	"password": "suasenha"
  }
