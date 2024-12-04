<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Encurtador de URLs e Linktree
Este projeto é uma aplicação web que oferece duas funcionalidades principais: encurtar URLs e criar páginas personalizadas para centralizar links, similares ao Linktree. Ambas as ferramentas podem ser utilizadas de forma independente, permitindo aos usuários atender diferentes necessidades, como compartilhar links individuais ou agrupar vários em uma única página prática e acessível.

### Descrição do Projeto
O Encurtador de URLs e o Acesso Rápido (Linktree) é uma solução simples e intuitiva, projetada para facilitar o compartilhamento de links. Ele é composto por dois módulos principais: um dedicado ao encurtamento de URLs e outro para a criação de páginas personalizadas. Essas funcionalidades podem ser usadas separadamente, oferecendo flexibilidade para atender a diferentes demandas em redes sociais, e-mails ou outras plataformas.

### Funcionalidades
 - Encurtamento de URLs: Encurta URLs longas, tornando-as mais curtas e fáceis de compartilhar.
 - Acesso Rápido: Permite criar uma página personalizada onde o usuário pode listar vários links curtos (como o Linktree).
 - Armazenamento de Links: Cada usuário pode armazenar links para acessar e gerenciar posteriormente.
 - Interface amigável: O usuário pode inserir links, visualizar os links encurtados e acessar sua página personalizada de forma simples e rápida.
 - Gerenciamento de Links: Opção de editar e excluir links da página personalizada.

### Tecnologias Usadas
 - Backend: Laravel.
 - Frontend: Vue.js integrado com Laravel via Inertia.js.
 - Estilização: Tailwind CSS para design responsivo e moderno.
 - Banco de Dados: SQLite (em produção) para armazenar os links encurtados e as páginas personalizadas.
 - Autenticação: via LDAP.

### Como Usar
Clone o repositório:
```bash
git clone https://github.com/LmarDark/SkeletonEncurtadorURL
```
Entre no diretório:
```bash
cd SkeletonEncurtadorURL
```
Crie o .env copiando o conteúdo do .env.example
```bash
cp .env.example .env
```
Gere a chave da aplicação:
```bash
php artisan key:generate
```
Façao migrate do banco de dados:
```bash
php artisan migrate
```
Instale as dependências da aplicação:
```bash
composer install
npm install
```

## Rodar o projeto:
Para iniciar a aplicação localmente, execute o seguinte comando:
```bash
php artisan serve
npm run dev
```

## Contribuindo para o Projeto
Obrigado por querer contribuir! 🎉 Este projeto é open-source e sua ajuda é muito bem-vinda. Siga as orientações abaixo para contribuir com o desenvolvimento.

### Como Contribuir
1. Faça um Fork do Repositório
   - Clique no botão "Fork" no canto superior direito da página do repositório.
2. Clone o Repositório Forkado
   - ```bash
     git clone https://github.com/seu-usuario/nome-do-repositorio.git
   - ```bash
     cd nome-do-repositorio
3. Crie uma Branch
   - Crie uma branch para trabalhar em suas alterações:
    ```bash
    git checkout -b minha-branch
4. Faça Suas Alterações
   - Após finalizar, salve suas alterações:
   ```bash
   git add .
   git commit -m "Descrição clara do que você alterou"
6. Envie as Alterações
   - Suba as alterações para seu repositório forkado:
   ```bash
   git push origin minha-branch
7. Crie um Pull Request
   - Acesse o repositório original no GitHub e clique no botão "Compare & pull request".
   - Adicione uma descrição clara do que foi alterado e submeta o Pull Request para revisão.

## Formas de Contribuir Além do Código
   - Reportar bugs ou problemas.
   - Sugerir novas funcionalidades.
   - Melhorar a documentação.
   - Revisar Pull Requests de outros contribuidores.
