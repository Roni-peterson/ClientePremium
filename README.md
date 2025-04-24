<p align="center"><img src="./public/images/logo_form_mobile.png" width="400" alt="Logo do Projeto"></p>

<p align="center">
  <a href="https://www.github.com/usuario/projeto"><img src="https://img.shields.io/github/repo-size/usuario/projeto" alt="Tamanho do Repositório"></a>
  <a href="https://www.github.com/usuario/projeto"><img src="https://img.shields.io/github/issues/usuario/projeto" alt="Issues"></a>
  <a href="https://www.github.com/usuario/projeto"><img src="https://img.shields.io/github/license/usuario/projeto" alt="Licença"></a>
</p>

## Sobre o Projeto

Este projeto foi desenvolvido utilizando o framework **Laravel**, e tem como objetivo [ "gerenciar um sistema de campanhas para a Farmácia Indiana"].

### Funcionalidades:

- **Cadastro de clientes** com validação de CPF.
- **Painel de administração** para visualização de dados dos clientes.
- **Criação de campanhas personalizadas**, com base em dados específicos como idade e estado de gestação.
- **Validação de campos de formulários** com tecnologia Laravel Livewire.
- **Integração com APIs externas** para preenchimento automático de dados de endereço com base no CEP.
- **Autenticação de usuários** utilizando Laravel Breeze.
- **Interface responsiva** utilizando Tailwind CSS, para uma navegação amigável em dispositivos móveis.

## Como rodar o projeto

### Pré-requisitos

- PHP 8.x ou superior
- Composer
- Laravel 10.x
- Banco de dados MySQL (ou o banco de dados de sua escolha)
  
### Instalação

1. Clone o repositório:
    ```bash
    git clone https://github.com/Roni-peterson/MamaePremiada.git
    ```
2. Instale as dependências:
    ```bash
    cd projeto
    composer install
    ```
3. Crie o arquivo `.env` a partir do `.env.example`:
    ```bash
    cp .env.example .env
    ```
4. Gere a chave de aplicativo:
    ```bash
    php artisan key:generate
    ```
5. Configure o banco de dados no arquivo `.env`.

6. Rode as migrações:
    ```bash
    php artisan migrate
    ```

7. Inicie o servidor:
    ```bash
    php artisan serve
    ```

Acesse a aplicação via `http://localhost:8000`.

## Contribuindo

Se você deseja contribuir para o projeto, por favor, siga as etapas abaixo:

1. Faça um fork deste repositório.
2. Crie uma branch com a sua feature (`git checkout -b feature/nome-da-feature`).
3. Faça um commit das suas mudanças (`git commit -am 'Adicionando nova feature'`).
4. Envie para o seu repositório forkado (`git push origin feature/nome-da-feature`).
5. Crie um Pull Request.

## Licença

Este projeto é licenciado sob a licença MIT - veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## Agradecimentos

- **Laravel** - Framework utilizado para o desenvolvimento da aplicação.
- **Tailwind CSS** - Framework CSS utilizado para estilização responsiva.
- **Composer** - Gerenciador de dependências PHP.

