<h1 align="center">
API RESTful
</h1>

## Sobre

Uma API desenvolvida em PHP/Laravel_11 seguindo os padrões RESTful no CRUD da aplicação. Também seguindo práticas de versionamento de banco de dados utilizando migrations.

Os arquivos mais importantes são routes/api.php, Controllers/NewsController.php, Models/News.php e diretório database/migrations.

São os arquivos/diretórios que estão ligados diretamente no funcionamento base da aplicação.

## Rodando projeto
### Pré-requisitos
- Git
- Docker

### Passo a Passo
- 1- Clonar o repositório
```URL
https://github.com/nepogabriel/php-laravel-g4f.git
```

- 2- Entre no diretório 
```
cd nome-do-diretorio
```

- 3- Configure variáveis de ambiente
```
cp .env.example .env
```

- 4- Instale as dependências
```CMD
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs
```

- 5- Inicie o container
```
./vendor/bin/sail up -d
```

- 6- Acesse o container
```
docker exec -it php-laravel-g4f-laravel.test-1 bash
```

- 7- Dentro do container execute para gerar uma chave do laravel
```
php artisan key:generate
```

- 8- Dentro do container execute para criar as tabelas do banco de dados
```
php artisan migrate
```

## Endpoints
### 1. Listar todas as notícias
- Método: GET
- Rota: /api/news
- Retorna todas as notícias cadastradas.

- Exemplo de resposta:

```JSON
[
    {
        "id": 1,
        "titulo": "Twitter",
        "descricao": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book",
        "created_at": "2024-12-16T03:14:09.000000Z",
        "updated_at": "2024-12-16T03:47:51.000000Z"
    },
    {
        "id": 2,
        "titulo": "Venda do Google Chrome",
        "descricao": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book",
        "created_at": "2024-12-16T03:14:49.000000Z",
        "updated_at": "2024-12-16T03:14:49.000000Z"
    }
]
```

### 2. Criar uma nova notícia
- Método: POST
- Rota: /api/news
- Cria uma nova notícia.
- Parâmetros esperados:
    - titulo: Título da notícia (string, obrigatório).
    - descricao: Descrição da notícia (string, obrigatório).

- Exemplo de corpo da requisição (JSON):

```JSON
{
    "titulo": "Vendas",
    "descricao": "Lorem Ipsum is simply dummy text of the printing and typesetting industry."
}
```

- Exemplo de resposta:

```JSON
{
    "message": "Notícia criada com sucesso!"
}
```

### 3. Atualizar uma notícia
- Método: PUT
- Rota: /api/news/{id}
- Atualiza uma notícia existente.
- Parâmetros esperados:
    - titulo: Título da notícia (string, obrigatório).
    - descricao: Descrição da notícia (string, obrigatório).


- Exemplo de corpo da requisição (JSON):

```JSON
{
    "titulo": "Vendas de carros",
    "descricao": "Lorem Ipsum is simply dummy text of the printing and typesetting industry."
}
```

- Exemplo de resposta:

```JSON
{
    "message": "Notícia atualizada com sucesso!"
}
```

### 4. Listar uma notícia específica
- Método: GET
- Rota: /api/news/{id}
- Retorna uma notícia específica com base no ID.

- Exemplo de resposta:

```JSON
{
    "id": 2,
    "titulo": "Internet",
    "descricao": "Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
    "created_at": "2024-12-16T02:57:56.000000Z",
    "updated_at": "2024-12-16T03:36:45.000000Z"
}
```

### 5. Deletar uma notícia
- Método: DELETE
- Rota: /api/news/{id}
- Deleta uma notícia pelo ID.
- Exemplo de resposta:

```JSON
{
    "message": "Notícia deletada com sucesso."
}
```