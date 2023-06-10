<?php

use Illuminate\Support\Facades\Route;

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
use App\Models\Cliente;
use App\Models\Endereco;


Route::get('/clientes', function () {
    $clientes = CLiente::all();
    foreach ($clientes as $c ) {
        echo "<p>ID:". $c->id . "</p>";
        echo "<p>Nome:". $c->nome . "</p>";
        echo "<p>Telefone:". $c->telefone . "</p>";
       // $e = Endereco::where('cliente_id',$c->id)->first();
        echo "<p>Rua:". $c->endereco->rua    . "</p>";
        echo "<p>Numero:". $c->endereco->numero . "</p>";
        echo "<p>Bairro:". $c->endereco->bairro . "</p>";
        echo "<p>Cidade:". $c->endereco->cidade . "</p>";
        echo "<p>UF:".$c->endereco->uf     . "</p>";
        echo "<p>Cep:".  $c->endereco->cep    . "</p>";
       
        echo "<hr>";
    }
});


Route::get('/enderecos', function () {
    $ends = Endereco::all();
    foreach ($ends as $e ) {
        echo "<p>ID Cliente:". $e->cliente_id . "</p>";

        echo "<p>Nome:". $e->cliente->nome . "</p>";
        echo "<p>Telefone:". $e->cliente->telefone . "</p>";

        echo "<p>Rua:". $e->rua . "</p>";
        echo "<p>Numero:". $e->numero . "</p>";
        echo "<p>Bairro:". $e->bairro . "</p>";
        echo "<p>Cidade:". $e->cidade . "</p>";
        echo "<p>UF:". $e->uf . "</p>";
        echo "<p>Cep:". $e->cep . "</p>";

        echo "<hr>";
    }
});

Route::get('/inserir', function () {
    $c= new CLiente();
    $c->nome = "Jose almeida";
    $c->telefone = "15 123123123";
    $c->save();

    $e= new Endereco();
    $e->rua = "Av brasil";
    $e->numero = "211";
    $e->bairro = "sto andre";
    $e->cidade = "sorocaba";
    $e->uf = "sp";
    $e->cep = "18012333";

    $c->endereco()->save($e);

    $c= new CLiente();
    $c->nome = "eldias";
    $c->telefone = "15 321123234";
    $c->save();
    
    $e= new Endereco();
    $e->rua = "Av brasil 2500";
    $e->numero = "1234";
    $e->bairro = "bolivia";
    $e->cidade = "sorocaba";
    $e->uf = "sp";
    $e->cep = "18804323";

    $c->endereco()->save($e);

    });

    Route::get('/clientes/json', function() {
        //$clientes = Cliente::all();
        $clientes = Cliente::with(['endereco'])->get();
        return $clientes->toJson();

    });