<p align="center">
  <img src="https://cdn-icons-png.flaticon.com/512/892/892692.png" alt="Logo Encurtador" width="100" />
</p>

<h1 align="center">Frontend — Encurtador de URL</h1>

<p align="center">
  Interface original do frontend. Em produção, o arquivo <code>index.html</code> é servido diretamente pelo Laravel em <code>backend/public/index.html</code>.
</p>

---

## Tecnologias

- HTML5
- Tailwind CSS (via CDN)
- Axios (via CDN)
- JavaScript ES6+

## Funcionalidades

- Encurtar URLs com código aleatório ou **código personalizado**
- Exibir a URL curta gerada com botão de copiar
- Sidebar "Minhas URLs" com histórico local (localStorage, 7 dias) e contagem de cliques
- Mensagens de erro detalhadas por campo (ex: código já em uso)

## Fluxo

1. Usuário cola a URL e (opcionalmente) define um código personalizado
2. Frontend envia `POST /api/create`
3. Backend retorna a URL curta com metadados
4. Interface exibe o link e salva no histórico local

## Exemplo de requisição

```http
POST /api/create
Content-Type: application/json

{
  "originalUrl": "https://exemplo.com/artigo",
  "customCode": "meulink"
}
```

**Resposta:**
```json
{
  "original_url": "https://exemplo.com/artigo",
  "short_url": "https://encurtador.rondodev.com.br/meulink",
  "clicks": 0,
  "expires_at": "2026-03-31 17:00:00"
}
```

## Nota

Este diretório existe como referência do source original. Em produção, o `index.html` compilado com `baseURL: ''` fica em `backend/public/index.html` e é servido pelo próprio Laravel.

## Licença

MIT
