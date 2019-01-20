<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contato;
use App\NotificarEmail;


class ContatoController extends Controller
{
	/**
     * Exibe o formulário para enviar uma mensagem
     */
    public function index(){
    	return view('welcome');
    }

	/**
     * Insere a mensagem no banco de dados
     
    public function enviar(Request $request){
		$contato = new Contato();

		$contato->nome = $request->get('nome');
		$contato->email = $request->get('email');
		$contato->mensagem = $request->get('mensagem');

		$contato->save();

		echo "Sua mensagem foi armazenada com sucesso! Código: " . $contato->id;
    }
*/
    /**
     * Insere a mensagem no banco de dados
     */
   public function enviar(Request $request, Contato $contato, \App\NotificarEmail $notificar){

	$contato->nome = $request->get('nome');
	$contato->email = $request->get('email');
	$contato->mensagem = $request->get('mensagem');

	$contato->save();

	//Notificando..
	$notificar->notificar();

	echo "Sua mensagem foi armazenada com sucesso11111! Código: " . $contato->id;
    }
	/**
     * Exibe uma lista com as mensagens cadastradas
     */
    public function lista(){
    	return view('lista', array('contatos' => Contato::all()));
    }
}

?><!--?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}-->
