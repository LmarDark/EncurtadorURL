
<p align="center">
  <img src="https://cdn-icons-png.flaticon.com/512/892/892692.png" alt="Logo Encurtador" width="100" />
</p>

<h1 align="center">Documentação do Front-End</h1>

<p align="center">
  Interface simples, leve e responsiva para criação e compartilhamento de URLs curtas, com backend em Laravel para gerenciamento das URLs.
</p>

---

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
   git clone https://github.com/LmarDark/EncurtadorURL
   cd EncurtadorURL/
   ```

2. Certifique-se de que a URL da API esteja configurada corretamente em `index.html`:
   ```js
   const api = axios.create({
       baseURL: 'http://localhost:5500', // Substitua se necessário
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

## 🌐 Ambiente de Produção

Você pode testar a aplicação em produção acessando:

**🔗 https://lmardark.github.io/EncurtadorURL-frontend/**

---

## 📄 Documentação do Backend
### - ▶ [Repositório Backend no GitHub](https://github.com/LmarDark/EncurtadorUrl-backend) ◀


---

## 📄 Licença

Este projeto está licenciado sob a [MIT License](https://opensource.org/licenses/MIT).

---
