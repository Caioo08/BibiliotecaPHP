# Sistema de Biblioteca PHP

Este repositório contém um sistema de gerenciamento de biblioteca desenvolvido em PHP, utilizando o padrão de arquitetura MVC (Model-View-Controller).

## Tecnologias Utilizadas

- **PHP**: Linguagem de programação principal do projeto
- **MySQL**: Sistema de gerenciamento de banco de dados
- **HTML/CSS**: Para a interface do usuário
- **JavaScript**: Para interações do lado do cliente
- **Bootstrap**: Framework para design responsivo

## Estrutura do Projeto

O projeto segue o padrão de arquitetura MVC, organizando o código em três camadas principais:

```
BibiliotecaPHP/
├── controllers/       # Controladores da aplicação
├── models/           # Modelos para interação com o banco de dados
├── views/            # Interfaces de usuário
├── config/           # Configurações do sistema
├── assets/           # Recursos estáticos (CSS, JS, imagens)
└── index.php         # Ponto de entrada da aplicação
```

## Funcionamento do Sistema

Este sistema permite o gerenciamento completo de uma biblioteca, incluindo:

- Cadastro, edição e exclusão de livros
- Cadastro e gerenciamento de usuários
- Empréstimos e devoluções de livros
- Controle de disponibilidade do acervo
- Pesquisa e filtros para localização de obras

## Padrão MVC Explicado

O padrão de arquitetura MVC (Model-View-Controller) é um paradigma de desenvolvimento de software que separa a aplicação em três componentes principais:

### Model (Modelo)

O componente Model representa os dados e a lógica de negócios da aplicação:

- Gerencia o acesso aos dados no banco de dados
- Implementa as regras de negócio
- Notifica as views sobre mudanças nos dados
- Responsável pela validação dos dados

No nosso sistema, os modelos estão na pasta `models/` e tratam das operações CRUD (Create, Read, Update, Delete) para livros, usuários e empréstimos.

### View (Visão)

O componente View é responsável pela interface de usuário:

- Exibe os dados ao usuário
- Recebe entradas e interações do usuário
- Cria a representação visual dos dados
- Não contém lógica de negócios complexa

Neste projeto, as views estão na pasta `views/` e são compostas por arquivos PHP com HTML, CSS e JavaScript que criam a interface visual do sistema.

### Controller (Controlador)

O componente Controller atua como intermediário entre o Model e a View:

- Recebe entradas do usuário através da View
- Processa pedidos do usuário com auxílio do Model
- Seleciona qual View exibir em resposta
- Coordena o fluxo de dados entre Model e View

Os controladores do sistema estão na pasta `controllers/` e são responsáveis por receber as solicitações HTTP, solicitar dados aos modelos e selecionar as views apropriadas.

## Vantagens do MVC

- **Separação de responsabilidades**: Cada componente tem um papel específico
- **Facilidade de manutenção**: Mudanças em uma camada não afetam necessariamente as outras
- **Desenvolvimento paralelo**: Diferentes equipes podem trabalhar em diferentes componentes simultaneamente
- **Testabilidade**: Facilita a criação de testes unitários para cada componente
- **Reutilização de código**: Componentes podem ser reutilizados em diferentes partes da aplicação

## Como Executar o Projeto

1. Clone o repositório:
   ```
   git clone https://github.com/Caioo08/BibiliotecaPHP.git
   ```

2. Configure um servidor web local (Apache, Nginx) com PHP instalado

3. Importe o banco de dados utilizando o script SQL fornecido

4. Configure as credenciais de banco de dados no arquivo de configuração

5. Acesse o sistema pelo navegador através do servidor local

## Requisitos

- PHP 7.4 ou superior
- MySQL 5.7 ou superior
- Servidor web Apache/Nginx

## Contribuições

Contribuições são bem-vindas! Sinta-se à vontade para abrir issues ou enviar pull requests para melhorar o sistema.

## Licença

Este projeto está licenciado sob a licença MIT.
