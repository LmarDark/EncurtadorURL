<p align="center">
  <img src="https://cdn-icons-png.flaticon.com/512/892/892692.png" alt="Logo Encurtador" width="100" />
</p>

<h1 align="center">Backend — Encurtador de URL</h1>

<p align="center">
  API Laravel que gerencia URLs encurtadas e serve o frontend embutido.
</p>

---

## Funcionalidades

- `POST /api/create` — Cria URL curta (código aleatório ou personalizado)
- `GET /{code}` — Redireciona para a URL original e incrementa cliques
- `GET /health` — Health check (throttle: 1 req/4min)
- Limpeza diária automática de URLs expiradas via Laravel Scheduler
- Frontend servido em `GET /` direto pelo Laravel

## Endpoints

### `POST /api/create`

```json
{
  "originalUrl": "https://exemplo.com/artigo-muito-longo",
  "customCode": "meulink"
}
```

`customCode` é opcional. Deve ser alfanumérico, entre 3 e 30 caracteres.

**Resposta `201`:**
```json
{
  "original_url": "https://exemplo.com/artigo-muito-longo",
  "short_url": "https://encurtador.rondodev.com.br/meulink",
  "clicks": 0,
  "created_at": "2026-03-24 17:00:00",
  "expires_at": "2026-03-31 17:00:00"
}
```

### `GET /{code}`

Redireciona (302) para a URL original. Retorna 404 se não encontrada ou expirada.

---

## Instalação local

**Pré-requisitos:** PHP >= 8.3, Composer, extensão `pdo_sqlite`

```bash
cd backend
composer install
cp .env.example .env
# Edite APP_URL e APP_KEY em .env
php artisan key:generate
php artisan migrate
php artisan serve
```

## Deploy com Docker

```bash
docker build -t encurtadorurl ./backend
docker run -d \
  --name encurtadorurl_app \
  --network host \
  --env-file ./backend/.env \
  -v $(pwd)/backend/database:/app/database \
  -v $(pwd)/backend/storage:/app/storage \
  encurtadorurl
```

## Variáveis de ambiente

| Variável | Descrição |
|----------|-----------|
| `APP_KEY` | Chave da aplicação (gerada com `php artisan key:generate`) |
| `APP_URL` | URL pública da aplicação (ex: `https://encurtador.rondodev.com.br`) |
| `APP_ENV` | `production` ou `local` |
| `APP_DEBUG` | `false` em produção |
| `DB_CONNECTION` | `sqlite` (padrão) |

## Licença

MIT
