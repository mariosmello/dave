<?php namespace App\Dave\Repositories;

use App\Categoria;
use Illuminate\Support\Str;

class CategoryRepository implements iCategoryRepository
{

    public function index($busca)
    {
        if (!is_null($busca) && !empty($busca))
        {
            $categorias = Categoria::where('nome', 'like', '%' . $busca . '%')->paginate(5);
        } else {
            $categorias = Categoria::paginate(5);
        }

        return $categorias;
    }

    public function store($input)
    {
        $categoria = new Categoria();
        $categoria->nome = $input['nome'];
        $categoria->slug = Str::slug($input['nome']);

        return $categoria->save();
    }

    public function show($id)
    {
        return Categoria::find($id);
    }

    public function update($input, $id)
    {
        $categoria = $this->show($id);

        $categoria->nome = $input['nome'];
        $categoria->slug = Str::slug($input['nome']);

        return $categoria->save();
    }

    public function destroy($id)
    {
        $categoria = $this->show($id);

        return $categoria->delete();
    }

}