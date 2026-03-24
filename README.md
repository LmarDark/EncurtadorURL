<p align="center">
  <img src="https://cdn-icons-png.flaticon.com/512/892/892692.png" alt="Logo Encurtador" width="100" />
</p>

<h1 align="center">Encurtador de URL</h1>

<p align="center">
  Encurtador de links rápido, leve e auto-hospedado. Backend em Laravel, frontend servido pelo próprio Laravel — tudo em um único container Docker.
</p>

---

**🔗 https://encurtador.rondodev.com.br**

---

## Funcionalidades

- Encurtar qualquer URL com código aleatório ou **código personalizado**
- Redirecionamento automático com contagem de cliques
- Expiração automática em 7 dias com limpeza diária agendada
- Histórico de links criados salvo localmente no navegador
- API RESTful pronta para integração

## Stack

- **Backend:** Laravel 11, PHP 8.3, SQLite
- **Frontend:** HTML5, Tailwind CSS, Axios
- **Infra:** Docker, Nginx (proxy reverso), Let's Encrypt

## Estrutura

```
EncurtadorURL/
├── backend/     # Laravel API + frontend embutido em public/
└── frontend/    # Fonte original do frontend (referência)
```

- 📖 [Documentação do Backend](./backend/README.md)
- 📖 [Documentação do Frontend](./frontend/README.md)

## Licença

MIT
