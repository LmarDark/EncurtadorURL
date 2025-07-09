
<p align="center">
  <img src="https://cdn-icons-png.flaticon.com/512/892/892692.png" alt="Logo Encurtador" width="100" />
</p>

<h1 align="center">Encurtador de URL</h1>

<p align="center">
  Interface simples, leve e responsiva para criação e compartilhamento de URLs curtas, com backend em Laravel para gerenciamento das URLs.
</p>

---

## 📦 Front-End

### 📋 Descrição

Este é o frontend do projeto **Encurtador de URL**, uma interface estática desenvolvida com **HTML**, **Tailwind CSS** e **JavaScript (Axios)**.  
Ela se conecta à API do backend para gerar URLs curtas de forma rápida e intuitiva.

### 🚀 Funcionalidades

- Inserir e enviar URLs longas para encurtamento.
- Exibir a URL curta gerada.
- Botão de copiar para a área de transferência.
- Layout responsivo e moderno com animações visuais.
- Integração com o backend via API RESTful.

### 🧰 Tecnologias utilizadas

- Tailwind CSS  
- Axios  
- HTML5  
- JavaScript ES6+

### 📂 Estrutura

```
frontend/
├── index.html       # Página principal do frontend
```

### 🛠️ Como rodar localmente

1. Clone o repositório:
   ```bash
   git clone https://github.com/seu-usuario/EncurtadorUrl-frontend.git
   cd EncurtadorUrl-frontend/frontend
   ```

2. Abra o arquivo no navegador:
   ```bash
   xdg-open index.html  # Linux
   start index.html     # Windows
   open index.html      # macOS
   ```

3. Certifique-se de que a URL da API esteja configurada corretamente em `index.html`:
   ```js
   const api = axios.create({
       baseURL: 'https://encurtadorurl-backend.onrender.com', // Substitua se necessário
       timeout: 5000,
       headers: {
           'Content-Type': 'application/json',
       },
   });
   ```

### 📡 Fluxo resumido

1. Usuário insere a URL original  
2. O frontend envia via `POST /api/create`  
3. Backend retorna a URL curta  
4. Interface exibe e permite copiar o link  

### 🧪 Exemplo de requisição

```http
POST /api/create
Content-Type: application/json

{
  "originalUrl": "https://exemplo.com/artigo"
}
```

Resposta:
```json
{
  "shortUrl": "https://encurtadorurl-backend.onrender.com/AbC123"
}
```

---

## 🔧 Back-End

Este projeto é o backend de um encurtador de URLs, desenvolvido com o framework **Laravel**.  
Ele fornece uma API para criar, gerenciar e redirecionar URLs curtas.

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
- `GET /health` — Retorna "status ok" se a API está rodando corretamente.

---

## 🌐 Ambiente de Produção

Você pode testar a aplicação em produção acessando:

**🔗 https://lmardark.github.io/EncurtadorUrl-frontend/**

---

## 📄 Licença

Este projeto está licenciado sob a [MIT License](https://opensource.org/licenses/MIT).

---
