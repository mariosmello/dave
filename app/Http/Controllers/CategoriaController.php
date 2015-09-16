<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::paginate(5);

        return view('categoria.index')->with(['categorias' => $categorias]);
    }
}
