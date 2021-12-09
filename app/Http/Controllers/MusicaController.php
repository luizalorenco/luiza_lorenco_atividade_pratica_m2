<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Musica;

class MusicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $musicas = musica::all();    
         return view('musicas.index', compact('musicas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('musicas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nome'      =>      'required|max:35',
            'ano'    =>      'required|max:35',
            'artista'    =>      'required|max:35'
        ]);
        $musica = musica::create($validateData);
        return redirect('/musicas')->with('success','Dados adicionados com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $musica = musica::findOrFail($id);
        return view('musicas.show',compact('musica'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $musica = Musica::findOrFail($id);
        return view('musicas.edit', compact('musica'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nome'      =>      'required|max:35',
            'ano'    =>      'required|max:35',
            'artista'    =>      'required|max:35'
        ]); 
        Musica::whereId($id)->update($validateData);
        return redirect('/musicas')->with('success', 
        'Dados atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // localizando o objeto que será excluído
        $musica = Musica::findOrFail($id);
        // realizando a exclusão
        $musica->delete();
        // redirecionando para o diretório raiz (index)
        return redirect('/musicas')->with('success', 
        'Dados removidos com sucesso!');
    }
}