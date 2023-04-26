<?php

namespace App\Http\Controllers;

use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        $contato = new SiteContato();
        $contato->fill($request->all());
        $contato->save();
        return view('site.contato',['titulo' => 'Contato (teste)']);
    }

    public function salvar(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required'
        ]);

        SiteContato::create($request->all());
    }
}
