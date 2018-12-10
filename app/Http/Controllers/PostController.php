<?php

namespace App\Http\Controllers;

use App\Post;
use App\Categoria;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::orderBy('id', 'ASC')->get();
        $titulo = null;

        return view('post.index', compact('posts', 'titulo'));
    }

    public function pesquisar(Request $request) {
        $titulo = $request->get('titulo');
        $posts = Post::orWhere('titulo', 'ilike', '%' . $request->get('titulo') . '%')->get();

        return view('post.index', compact('posts', 'titulo'));
    }

    public function incluir() {
        $categorias = Categoria::orderBy('titulo', 'ASC')->get();

        return view('post.incluir', compact('categorias'));
    }

    public function alterar($id) {
        $post = Post::findOrFail($id);

        $categorias = Categoria::orderBy('titulo', 'ASC')->get();

        return view('post.alterar', compact('post', 'categorias'));
    }

    public function salvar(Request $request) {
        $request->validate([
            'titulo' => 'required',
            'status' => 'required',
        ]);

        $nomeImagem = null;

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $extensao = $request->file('imagem')->extension();

            $uniqueId = uniqid(date('HisYmd'));
            $nomeImagem = "{$uniqueId}.{$extensao}";

            $upload = $request->file('imagem')->storeAs('posts', $nomeImagem);

            if (!$upload) {
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();
            }
        }

        $post = new Post([
            'titulo' => $request->get('titulo'),
            'status' => $request->get('status'),
            'descricao' => $request->get('descricao'),
            'imagem_capa' => $nomeImagem
        ]);

        $post->save();

        $idCategorias = $request->get('categoria');
        $post->categorias()->sync($idCategorias);

        return redirect('posts')->with('success', 'Post inserido com sucesso.');
    }

    public function atualizar(Request $request, $id) {
        $request->validate([
            'titulo' => 'required',
            'status' => 'required'
        ]);

        $post = Post::findOrFail($id);
        $post->titulo = $request->get('titulo');
        $post->status = $request->get('status');
        $post->descricao = $request->get('descricao');

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $extensao = $request->file('imagem')->extension();
            $uniqueId = uniqid(date('HisYmd'));
            $nomeImagem = "{$uniqueId}.{$extensao}";

            $upload = $request->file('imagem')->storeAs('posts', $nomeImagem);

            if (!$upload) {
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();
            } else {
                Storage::delete('posts/'.$post->imagem_capa);
                $post->imagem_capa = $nomeImagem;
            }
        }

        $post->save();

        $idCategorias = $request->get('categoria');
        $post->categorias()->sync($idCategorias);

        return redirect('posts')->with('success', 'Post alterado com sucesso.');
    }

    public function excluir($id) {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('posts')->with('success', 'Post excluído com sucesso.');
    }

    public function visualizar($id) {
        $post = Post::findOrFail($id);

        return view('post.visualizar', compact('post'));
    }
}
