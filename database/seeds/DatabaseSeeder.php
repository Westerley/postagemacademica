<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('occupations')->insert(['name' => 'Estudante']);
        DB::table('occupations')->insert(['name' => 'Professor']);

        DB::table('courses')->insert(['name' => 'Algoritmo e Programação I']);
        DB::table('courses')->insert(['name' => 'Algoritmo e Programação II']);
        DB::table('courses')->insert(['name' => 'Estrutura de Dados e Programação']);
        DB::table('courses')->insert(['name' => 'Projeto de Software Orientado a Objeto']);
        DB::table('courses')->insert(['name' => 'Banco de Dados I']);
        DB::table('courses')->insert(['name' => 'Banco de Dados II']);
        DB::table('courses')->insert(['name' => 'Inteligencia Artificial']);
        DB::table('courses')->insert(['name' => 'Programação Para a Web']);
        DB::table('courses')->insert(['name' => 'Linguagem de Programação Comercial']);
    }
}
