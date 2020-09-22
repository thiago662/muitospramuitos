<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Projeto;
use App\Models\Desenvolvedor;
use App\Models\Alocacao;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('desenvolvedores', function(){
    $d = Desenvolvedor::with('projetos')->get();
    return $d->toJson();
});

Route::get('desenvolvedores/{id}', function($id){
    $d = Desenvolvedor::with('projetos')->find($id);
    return $d->toJson();
});

Route::get('projetos', function(){
    //$p = Projeto::all();
    $p = Projeto::with('desenvolvedores')->get();
    return $p->toJson();
});

Route::get('alocacao', function(){
    $a = Alocacao::all();
    return $a->toJson();
});

Route::get('alocacao/{p}/{d}', function($p,$d){
    $p = Projeto::find($p);

    if(isset($p)){
        $p->desenvolvedores()->attach($d,['horas_semanais'=>50]);
    }

    $a = Alocacao::all();
    return $a->toJson();
});

Route::get('desalocar/{p}/{d}', function($p,$d){
    $p = Projeto::find($p);

    if(isset($p)){
        $p->desenvolvedores()->detach($d);
    }
});
