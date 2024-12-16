<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();

        return response()->json($news, 200);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
        ]);

        $news = News::create($validate);

        return response()->json([
            'message' => 'Notícia criada com sucesso!'
        ], 201);
    }

    public function show(string $id)
    {
        $news = News::find($id);

        if (!$news) {
            return response()->json(['message' => 'Notícia não encontrada.'], 404);
        }

        return response()->json($news, 200);
    }

    public function update(Request $request, string $id)
    {
        $news = News::find($id);

        if (!$news) {
            return response()->json(['message' => 'Notícia não encontrada.'], 404);
        }

        $news->update($request->all());

        return response()->json(['message' => 'Notícia atualizada com sucesso!'], 200);
    }

    public function destroy(string $id)
    {
        $news = News::find($id);

        if (!$news) {
            return response()->json(['message' => 'Notícia não encontrada.'], 404);
        }

        $news->delete();

        return response()->json(['message' => 'Notícia deletada com sucesso.'], 200);
    }
}
