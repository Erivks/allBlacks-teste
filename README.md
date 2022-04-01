# AllBlacks Upload XML

> Diretório para o teste técnico para a vaga de developer na P21

[![Author](https://img.shields.io/badge/author-Erick-e0a639?style=flat-square)](https://github.com/Erivks)


---

## Sobre :page_facing_up:

De antemão, peço perdão pelo layout ou bagunça no código. Fiz da madrugada de 31/03 a 01/04.

Sistema básico para realizar upload de XML com dados de torcedores.Realizando a validação de tipo do arquivo e tamanho, bem como a conexão com o banco de dados.

Decidi realizar o sistema dessa forma, pois na minha concepção facilitaria o processo de salvar os dados, pois segundo o problema apresentado o arquivo XML já é gerado pela loja virtual. Realizar um CRUD padrão, levaria a um retrabalho por parte do usuário pois seria preciso preencher todos os dados novamente.

Gostaria te ter mais tempo para desenvolver um painel de gestão dos cadastros existem no banco, bem como adicionar testes unitários com o PHPUnit e mais logs.

Sobre os logs: Foi desenvolvido uma classe para salvar os logs de todo o processo, a classe pode ser vista aqui: [Classe Logging](https://github.com/Erivks/la-carte/blob/master/app/Config.php)

---

## Packages utilizados :books:

- PHPMailer (Para envio de email) - [Documentação](https://twig.symfony.com/doc/3.x/)

---

## Pastas e arquivos :open_file_folder:

```shell
├── src
│   ├── controller
│   │   └── Email.php
│   │   └── File.php
│   │   └── Torcedor.php
│   │   └── Upload.php
│   ├── database
│   │   └── DB.php
│   ├── docs
│   │   └── torcedores.xml
│   ├── model
│   │   └── Torcedor.php
│   ├── templates
│   │   ├── view
|   │   │   └── error.tpl.html
|   │   │   └── index.tpl.html
│   ├── Config.php (Configurações globais [banco de dados, funções, etc])
│   ├── Logger.php (Classe para adição de log)
│   ├── Router.php (Classe para roteamento)
│   └── Viewer.php (Classe para denifir o que será mostrado)
├── composer.json
├── index.php (Arquivo de rotas)
├── system.log (Arquivo para registro de log)
```

---

## Padrões

### Código :notebook:

O código a ser escrito deverá seguir sempre que possível o padrão determinado pelo PHP-FIG, as PSRs. Para melhor entendimento e compreensão de outros programadores sobre o código.

[PSRs](https://www.php-fig.org/psr/)