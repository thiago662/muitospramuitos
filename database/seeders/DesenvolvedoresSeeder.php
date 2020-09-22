<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesenvolvedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('desenvolvedores')->insert([
            'nome'=>'Thiago Gonçalves Santos',
            'cargo'=>'Programador FullStack'
        ]);
        DB::table('desenvolvedores')->insert([
            'nome'=>'Lucas Anselmo',
            'cargo'=>'Programador Front-End'
        ]);
        DB::table('desenvolvedores')->insert([
            'nome'=>'Guilherme Aparecido',
            'cargo'=>'Programador Front-End'
        ]);
    }
}
