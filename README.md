# To-Do List API com Laravel

Esta é uma API RESTful de gerenciamento de lista de tarefas (To-Do List) desenvolvida com Laravel. A API permite criar, listar, atualizar e deletar tarefas, além de filtrar tarefas pelo status de conclusão.

## Funcionalidades

- **Criar Tarefa**: Crie uma nova tarefa com título e descrição.
- **Listar Tarefas**: Liste todas as tarefas com a opção de filtrar por status (completa/não completa).
- **Atualizar Tarefa**: Atualize o status de uma tarefa específica.
- **Deletar Tarefa**: Remova uma tarefa específica.

## Tecnologias Utilizadas

- **PHP**: Linguagem de programação.
- **Laravel 11**: Framework para criação de aplicações web.
- **MySQL**: Banco de dados relacional utilizado para armazenamento das tarefas.
- **PHPUnit/Pest**: Ferramentas para criação e execução de testes.

## Requisitos

- **PHP >= 8.1**
- **Composer**
- **MySQL**
- **Laravel 11**

## Instalação

1. Clone o repositório para sua máquina local:
   ```bash
   git clone https://github.com/rdkthiago/to-do-api.git
   cd seu-repositorio

2. Instale as dependências do projeto:
composer install

3. Copie o arquivo de ambiente e configure as variáveis:
cp .env.example .env

4. Configure as variáveis de ambiente no arquivo .env para o seu banco de dados MySQL:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco_de_dados
DB_USERNAME=usuario
DB_PASSWORD=senha

5. Gere a chave da aplicação:
php artisan key:generate

6. Execute as migrações para criar as tabelas no banco de dados:
php artisan migrate

# Executando a Aplicação
Inicie o servidor de desenvolvimento: php artisan serve

# Endpoints da API

- Criar Tarefa
    POST /api/tasks
    Parâmetros:
    titulo: (string) Título da tarefa
    descricao: (string) Descrição da tarefa
- Listar Tarefas
    GET /api/tasks
    Parâmetros Opcionais:
    esta_completa: (boolean) Filtra as tarefas pelo status de conclusão
- Atualizar Status de uma Tarefa
    PUT /api/tasks/{id}
    Parâmetros:
    esta_completa: (boolean) Define se a tarefa está completa (true ou false)
- Deletar Tarefa
    DELETE /api/tasks/{id}

# Testes - Executando Testes com PHPUnit

Para rodar os testes de unidade e integração usando o PHPUnit, execute o seguinte comando:  
php vendor/bin/phpunit

# Estrutura do Projeto
app/Models/Task.php: Modelo da tarefa.
app/Http/Controllers/TaskController.php: Controlador com a lógica da API.
database/migrations/: Contém as migrações para criar a tabela de tarefas.
routes/api.php: Define as rotas da API.
