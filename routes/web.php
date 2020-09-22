<?php

use Illuminate\Support\Facades\Route;

use App\Models\Projeto;
use App\Models\Desenvolvedor;
use App\Models\Alocacao;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('desenvolvedores', function(){
    $dev = Desenvolvedor::with('projetos')->get();

    foreach ($dev as $d) {
        echo "<p>Nome: ".$d->nome.";</p>";
        echo "<p>Cargo: ".$d->cargo.";</p>";

        if( count($d->projetos) > 0 ){

            echo "<p>Projetos:</p>";
            echo "<ul>";

            foreach($d->projetos as $p){

                echo "<li>";
                echo "Nome: ".$p->nome.";</br>";
                echo "Horas estimadas: ".$p->estimativa_horas.";</br>";
                echo "Horas trabalhdas: ".$p->pivot->horas_semanais.";";
                echo "</li>";

            }

            echo "</ul>";

        }
    }

});

Route::get('desenvolvedores/{id}', function($id){
    $d = Desenvolvedor::find($id);

    echo "<p>Nome: ".$d->nome.";</p>";
    echo "<p>Cargo: ".$d->cargo.";</p>";

    if( count($d->projetos) > 0 ){

        echo "<p>Projetos:</p>";
        echo "<ul>";

        foreach($d->projetos as $p){

            echo "<li>";
            echo "Nome: ".$p->nome.";</br>";
            echo "Horas estimadas: ".$p->estimativa_horas.";</br>";
            echo "Horas trabalhdas: ".$p->pivot->horas_semanais.";";
            echo "</li>";

        }

        echo "</ul>";

    }

});
