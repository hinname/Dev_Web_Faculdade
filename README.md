# Dev_Web_Faculdade
Projeto da faculdade para disciplina DESENV. WEB com HTML5, CSS, JS e PHP

## O que é o projeto?
- Este projeto é uma plataforma para inscrição de torneio de jogos eletrônicos. Além disso, desenvolvi uma parte de suporte para o projeto com um CRUD (Create, Read, Upadate, Delete)
- Foram colocados sistemas de login, cadastro de usuários e inscrição dos usuários nos torneios

## Passo a passo para testar o projeto

### 1) Passo:  Instale o Xampp
- Xampp é um pacote que possui tudo que precisamos para executar e testar o projeto. Nele encontramos o Apache (servidor web), MariaDB (banco de dados) e PHP (linguagem utilizada no projeto)
- Link para baixar o xampp - https://www.apachefriends.org/pt_br/index.html

### 2) Passo: Coloque o projeto na pasta htdocs do Xampp
- Após instalar o xampp, observe o local onde foi instalado o xampp 
- Abra a pasta xampp
- Abra a pasta htdocs
- Coloque o projeto Dev_Web_Faculdade dentro desta pasta

### 3) Passo: Acesse o painel de controle do xampp para entrar no phpMyAdmin
- Acessando o painel de controle do xampp, inicie o Apache e MySQL
- Clique no botão "Admin" na opção do MySQL

### 4) Passo: Importe o arquivo SQL no MySQL
- Assim que o proejto foi baixado, um arquivo chamado **torneio_games_web.SQL** estará na pasta
- No phpMyAdmin, Clique na aba "**Importar**"
- Selecione o arquivo **torneio_games_web.SQL** para ser importado
- Clique em executar

### 5) Passo: Acesse diretamente o projeto no navegador
- Após a importação do banco de dados, certifique que o banco de dados **tornwio_games_web** esteja na lista de banco de dados
- Com isso, Abra uma nova aba no navegador e digite **http://localhost/Dev_Web_Faculdade/** para acessar o projeto

### Em casos de problemas no passo a passo, mande mensagem no meu linkedin - https://www.linkedin.com/in/herivelton-borges-da-costa-b724361a4/

