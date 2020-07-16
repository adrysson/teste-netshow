# teste-fullstack
Repositório usado para o teste técnico da Netshow.me.

## Instruções de instalação
O projeto foi desenvolvido com docker, então basta ter o docker e o docker-compose instalado para conseguir rodar o projeto.
1. Clone o projeto:
```
git clone git@github.com:adrysson/teste-netshow.git
```
2. Copie o arquivo de exemplo das variáveis de ambiente:
```
cp .env.example .env
```
3. Personalize as seguintes variáveis de ambiente:
```
APP_URL

DB_PORT
DB_DATABASE
DB_USERNAME
DB_PASSWORD

MAIL_MAILER
MAIL_HOST
MAIL_PORT
MAIL_USERNAME
MAIL_PASSWORD
MAIL_ENCRYPTION
MAIL_TO_ADDRESS
MAIL_TO_NAME

MYSQL_PORT
PMA_PORT
NGINX_PORT
```
4. Suba os containers da aplicação:
```
docker-compose up -d
```
5. Instale as dependências:
```
docker-compose exec app composer install
```
6. Gere a chave do Laravel:
```
docker-compose exec app php artisan key:generate
```
7. Rode as migrations para criar as tabelas no banco:
```
docker-compose exec app php artisan migrate
```
8. A aplicação estará rodando no ambiente local na porta especificada na variável de ambiente "NGINX_PORT".
