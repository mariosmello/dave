<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::paginate(5);

        return view('categoria.index')->with(['categorias' => $categorias]);
    }

    public function store(Requests\CategoriaRequest $request)
    {
        $categoria = new Categoria();
        $categoria->nome = $request->get('nome');
        $categoria->slug = Str::slug($request->get('nome'));

        $result = $categoria->save();

        if (!$result) {
            return redirect()->back()->withInput()->withErrors('Falha ao salvar categoria');
        }

        return redirect()->back()->with('sucesso','Categoria salva com sucesso');
    }

    public function edit($id)
    {
        $cat = Categoria::find($id);
        $categorias = Categoria::paginate(5);

        return view('categoria.edit')->with(['cat' => $cat, 'categorias' => $categorias]);

    }

    public function update(Requests\CategoriaRequest $request, $id)
    {
        $categoria = Categoria::find($id);
        $categoria->nome = $request->get('nome');
        $categoria->slug = Str::slug($request->get('nome'));

        $result = $categoria->save();

        if (!$result) {
            return redirect()->back()->withInput()->withErrors('Falha ao atualizar categoria');
        }

        return redirect()->route('categoria.index')->with('sucesso','Categoria editada com sucesso');
    }

    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $result = $categoria->delete();

        if (!$result) {
            return redirect()->back()->withInput()->withErrors('Falha ao deletar a categoria');
        }

        return redirect()->back()->with('sucesso','Categoria deletada com sucesso');
    }

}
