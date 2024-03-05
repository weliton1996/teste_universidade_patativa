
## Requisitos
Certifique-se de ter os seguintes requisitos instalados antes de começar:

- PHP: ^v8.1.7
- Composer: ^v2.0
- Nodejs: ^v9.0
- Laravel: v10

# Antes de Iniciar o Projeto

## Configure o arquivo .env + config/database.php

use o arquivo .env.exemple para cria o seu .env:

- .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=(NOME DO SEU DB)
DB_USERNAME=(USUÁRIO)
DB_PASSWORD=(E SENHA, SE TIVER)


- config/database.php
```
'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ]

```

- user no terminal para verificar se a extenção pdo_mysql está instalada

```
php -r"var_dump(extension_loaded('pdo_mysql'))";
```
- ao usar o comando no terminal retorne false, então vá ao seu arquivo php.ini e ative a  extensão

## Faça a migrate da suas tabelas:
```
php artisan migrate
```

- rode também no terminal:
```
php artisan key:generate
```
Este comando irá gerar uma chave de aplicação e atualizá-la no arquivo .env do seu projeto Laravel. 
Certifique-se de que o arquivo .env exista no diretório raiz do seu projeto.

## Inicialização do Projeto

## Clone o repositório:
```
git clone https://github.com/weliton1996/teste_universidade_patativa.git
```
cd seu-projeto
## 1 - Inicialize o Composer:
```
composer init
```
## 2 - Instale as dependências do Composer:
```
composer install
```

## 3 - Instale as dependências do NPM:
```
npm install
```

## 4 - Execute o build para produção:
```
npm run build  # Para produção
```

# ou

```
npm run dev  # Para desenvolvimento
```

Inicie o servidor Laravel:

```
php artisan serve
```
Acesse o seu projeto em http://localhost:8000.

