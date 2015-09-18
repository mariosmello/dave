<?php

namespace App\Http\Controllers;

use App\Dave\Repositories\iCategoryRepository;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoriaController extends Controller
{

    protected $repository;

    public function __construct(iCategoryRepository $repository)
    {
        $this->repository = $repository;

    }

    public function index()
    {
        $busca = \Request::get('busca');

        $categorias = $this->repository->index($busca);

        return view('categoria.index')->with(['categorias' => $categorias, 'busca' => $busca]);
    }

    public function store(Requests\CategoriaRequest $request)
    {
        $result = $this->repository->store($request->all());

        if (!$result) {
            return redirect()->back()->withInput()->withErrors('Falha ao salvar categoria');
        }

        return redirect()->back()->with('sucesso','Categoria salva com sucesso');
    }

    public function edit($id)
    {
        $busca = \Request::get('busca');

        $categorias = $this->repository->index($busca);
        $cat = $this->repository->show($id);

        return view('categoria.edit')->with(['cat' => $cat, 'categorias' => $categorias, 'busca' => $busca]);

    }

    public function update(Requests\CategoriaRequest $request, $id)
    {
        $result = $this->repository->update($request->all(),$id);

        if (!$result) {
            return redirect()->back()->withInput()->withErrors('Falha ao atualizar categoria');
        }

        return redirect()->route('categoria.index')->with('sucesso','Categoria editada com sucesso');
    }

    public function destroy($id)
    {
        $result = $this->repository->destroy($id);

        if (!$result) {
            return redirect()->back()->withInput()->withErrors('Falha ao deletar a categoria');
        }

        return redirect()->route('categoria.index')->with('sucesso','Categoria deleteda com sucesso');
    }

}
