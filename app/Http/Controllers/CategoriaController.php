<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index() {
        $categorias = Categoria::orderBy('id', 'ASC')->get();

        return view('categoria.index', compact('categorias'));
    }

    public function incluir() {
        return view('categoria.incluir');
    }

    public function salvar(Request $request) {
        $request->validate([
            'titulo' => 'required',
            'status' => 'required'
        ]);

        $categoria = new Categoria([
            'titulo' => $request->get('titulo'),
            'status' => $request->get('status'),
            'descricao' => $request->get('descricao')
        ]);

        $categoria->save();

        return redirect('categorias')->with('success', 'Categoria inserida com sucesso.');
    }

    public function excluir($id) {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect('categorias')->with('success', 'Categoria excluída com sucesso.');
    }

    public function alterar($id) {
        $categoria = Categoria::findOrFail($id);

        return view('categoria.alterar', compact('categoria'));
    }

    public function visualizar($id) {
        $categoria = Categoria::findOrFail($id);

        return view('categoria.visualizar', compact('categoria'));
    }

    public function atualizar(Request $request, $id) {
        $categoria = Categoria::findOrFail($id);

        $request->validate([
            'titulo' => 'required',
            'status' => 'required'
        ]);

        $categoria->titulo = $request->get('titulo');
        $categoria->status = $request->get('status');
        $categoria->descricao = $request->get('descricao');
        $categoria->save();

        return redirect('categorias')->with('success', 'Categoria alterada com sucesso.');
    }
}
