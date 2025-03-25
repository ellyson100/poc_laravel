# Sistema de Gerenciamento de Tarefas

Um sistema web desenvolvido em Laravel para gerenciamento de tarefas com autenticação de usuários, dashboard interativo e gráficos estatísticos.

## 🚀 Funcionalidades

- Autenticação de usuários (registro, login, logout)
- Gerenciamento completo de tarefas (CRUD)
- Dashboard interativo com gráficos
- Estatísticas em tempo real
- Interface responsiva e moderna
- Categorização de tarefas por status e prioridade
- Sistema de datas de vencimento

## 📋 Pré-requisitos

- PHP >= 8.1
- Composer
- Node.js e NPM
- MySQL ou PostgreSQL
- Git

## 🔧 Instalação

1. Clone o repositório
```bash
git clone https://github.com/seu-usuario/nome-do-repositorio.git
cd nome-do-repositorio
```

2. Instale as dependências do PHP via Composer
```bash
composer install
```

3. Instale as dependências do Node.js
```bash
npm install
```

4. Copie o arquivo de ambiente
```bash
cp .env.example .env
```

5. Gere a chave da aplicação
```bash
php artisan key:generate
```

6. Configure o banco de dados no arquivo `.env`
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

7. Execute as migrações do banco de dados
```bash
php artisan migrate
```

8. Compile os assets
```bash
npm run dev
```

## 🚀 Executando a aplicação

1. Inicie o servidor de desenvolvimento
```bash
php artisan serve
```

2. Acesse a aplicação no navegador
```
http://localhost:8000
```

## 📦 Estrutura do Projeto

```
laravel_modelo_app/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── DashboardController.php
│   │   │   ├── ProfileController.php
│   │   │   └── TaskController.php
│   ├── Models/
│   │   ├── Task.php
│   │   └── User.php
├── resources/
│   ├── views/
│   │   ├── dashboard.blade.php
│   │   ├── layouts/
│   │   └── tasks/
├── routes/
│   └── web.php
└── database/
    └── migrations/
```

## 🔒 Segurança

- Todas as rotas de tarefas são protegidas por autenticação
- Validação de dados em todas as operações
- Proteção contra CSRF
- Senhas são hasheadas usando bcrypt

## 🛠️ Tecnologias Utilizadas

- Laravel 10.x
- PHP 8.1+
- MySQL/PostgreSQL
- TailwindCSS
- Chart.js
- Laravel Breeze (Autenticação)

## 📝 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 👥 Contribuição

1. Faça um Fork do projeto
2. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

## 📞 Suporte

Para suporte, envie um email para seu-email@exemplo.com ou abra uma issue no repositório.
