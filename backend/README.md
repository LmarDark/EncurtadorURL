
<p align="center">
  <img src="https://cdn-icons-png.flaticon.com/512/892/892692.png" alt="Logo Encurtador" width="100" />
</p>

<h1 align="center">Encurtador de URL</h1>

<p align="center">
  Interface simples, leve e responsiva para criação e compartilhamento de URLs curtas, com backend em Laravel para gerenciamento das URLs.
</p>

---

### 🚀 Funcionalidades

- Criar URLs curtas a partir de URLs longas.
- Redirecionamento automático para a URL original.
- Listagem e gerenciamento das URLs encurtadas.
- API RESTful pronta para integração.

### 🧰 Requisitos

- PHP >= 8.1  
- Composer  
- Banco de dados (MySQL, PostgreSQL, SQLite etc.)

### 🛠️ Instalação

1. Clone o repositório:
   ```bash
   git clone https://github.com/LmarDark/EncurtadorUrl-backend.git
   cd EncurtadorUrl-backend
   ```

2. Instale as dependências:
   ```bash
   composer install
   ```

3. Copie o arquivo de ambiente e configure:
   ```bash
   cp .env.example .env
   ```

4. Gere a chave da aplicação:
   ```bash
   php artisan key:generate
   ```

5. Execute as migrations:
   ```bash
   php artisan migrate
   ```

6. Inicie o servidor de desenvolvimento:
   ```bash
   php artisan serve
   ```

### 🔗 Endpoints principais

- `POST /api/create` — Cria uma nova URL curta.  
- `GET /{code}` — Redireciona para a URL original.  

---

## 🌐 Ambiente de Produção

Você pode testar a aplicação em produção acessando:

**🔗 https://lmardark.github.io/EncurtadorURL/**

---

## 📄 Licença

Este projeto está licenciado sob a [MIT License](https://opensource.org/licenses/MIT).

---

