# Sistema de Postagem Acadêmica

O sistema consiste em um ambiente virtual para disciplinas de uma instituição. Permitindo que alunos e professores compartilhem atividades e arquivos para download com os demais membros da disciplina.

![image](https://cloud.githubusercontent.com/assets/13291433/16743422/b92652c6-4782-11e6-84fa-7c257082f61e.png)

## Requisitos

 * PHP >= 5.5.9 
 * Laravel 5.2
 * Materialize (FrontEnd)

## Passos para ser executados

 * No terminal execute: composer update
 * Copiar o arquivo (.env.example) e renomear para (.env)
 * No terminal execute: php artisan key:generate
 * Criar a base de dados no mysql, e mudar as configurações no arquivo (.env)
 * No terminal execute: php artisan migrate
 * Executar o servidor do laravel
 
## Autores
 
 * Westerley da Silva Reis
 * Bruno Allison dos Santos / https://github.com/brunoak120

## Licença

 * Leia o arquivo LICENSE
