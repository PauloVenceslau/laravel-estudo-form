<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Route::post('/enviar', function(Illuminate\Http\Request $request,\App\NotificacaoInterface $notificar){

Route::post('/enviar', function(Illuminate\Http\requests\ContatoEnviarRequest $request,\App\NotificacaoInterface $notificar){

	$contato = new App\Contato();
	$contato->nome = $request->get('nome');
	$contato->email = $request->get('email');
	$contato->mensagem = $request->get('mensagem');

	$contato->save();
	$notificar->notificar();

	echo "Sua mensagem foi armazenada com sucesso2222! Código: " . $contato->id;
});
Route::get('/lista', function () {
    return view('lista', array('contatos' => App\Contato::all()));
});